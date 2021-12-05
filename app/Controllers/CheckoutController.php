<?php

namespace App\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Services\CartService;
use Core\Helpers\Redirector;
use Core\Middlewares\AuthMiddleware;
use Core\Session;
use Core\View;
use Core\Validator;

/**
 * Checkout Controller
 */
class CheckoutController
{

    //checks if user is admin
    public function __construct()
    {
        AuthMiddleware::isLoggedInOrFail();
    }

    
    public function summary()
    {

        //loads all items in cart
        $cartContent = CartService::get();

        //checks if user is logged in
        $user = User::getLoggedIn();

        //renders view
        View::render('summary', [
            'cartContent' => $cartContent,
            'user' => $user
        ]);
    }


    public function finish()
    {
        //gets information from user
        $cartContent = CartService::get();
        $user = User::getLoggedIn();


        //goes through all items
        foreach ($cartContent as $itemFromCart) {
            for ($i = 1; $i <= $itemFromCart->count; $i++) {
                //fills order
                $order = new Order();
                $order->fill([
                    'user_id' => $user->id,
                    'product_id' => $itemFromCart->id
                ]);

                //saves order to databse
                if (!$order->save()) {
                    /**
                     * Konnte nicht gespeichert werden, schreiben wir einen Fehler und leiten zurück zur Zusammenfassung.
                     */
                    Session::set('errors', ['Bookings konnten nicht gespeichert werden.']);
                    Redirector::redirect('/checkoutsummary');
                }
            }

            //removes item from stock
            if (property_exists($itemFromCart, 'units')) {
                $itemFromCart->units = $itemFromCart->units - $itemFromCart->count;
                $itemFromCart->save();
            }
        }

        //resets cart
        CartService::destroy();

        //sets session and redirects user back to home
        Session::set('success', ['Order is complete']);
        Redirector::redirect('/home');
    }

    public function update()
    {

        $user = User::getLoggedIn();

  
        $validator = new Validator();
        $validator->letters($_POST['firstname'], label: 'First Name', required: true);
        $validator->letters($_POST['lastname'], label: 'Last Name', required: true);
        $validator->textnum($_POST['adress_1'], label: 'Adress 1', required: true);
        $validator->textnum($_POST['adress_2'], label: 'Adress 2', required: false);
        $validator->numeric($_POST['postal_code'], label: 'Postal Code', required: true);
        $validator->letters($_POST['city'], label: 'City', required: true);
        $validator->letters($_POST['country'], label: 'country', required: true);
   
        $errors = $validator->getErrors();

    
        if (!empty($errors)) {
 
            Session::set('errors', $errors);
            Redirector::redirect('/checkout/summary');
        }


        $fields = ['firstname', 'lastname', 'adress_1', 'adress_2', 'postal_code', 'city', 'country'];
        foreach($fields as $field) {
            $user->$field = trim($_POST[$field]);
        }


        //checks if profile was saved
        if ($user->save()) {
            //updates session to success
            Session::set('success', ['Profile has been successfully updated']);
        } else {
            //error message
            $errors[] = 'There was an error, please try again';
            Session::set('errors', $errors);
        }

        //Redirects user back to summary page
        Redirector::redirect('/checkout/summary');
    }

}
