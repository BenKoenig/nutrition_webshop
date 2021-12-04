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

    /**
     * Wir können die AuthMiddleware auch im Konstruktor aufrufen, wenn alle Actions dieselbe Methode der AuthMiddleware
     * aufgerufen hätten.
     *
     * @throws \Exception
     */
    public function __construct()
    {
        AuthMiddleware::isLoggedInOrFail();
    }

    /**
     * Zusammenfassung anzeigen, bevor die Buchung abgeschlossen wird.
     *
     * @throws \Exception
     */
    public function summary()
    {
        /**
         * Einträge aus dem Cart und eingeloggte*n User*in holen.
         */
        $cartContent = CartService::get();
        $user = User::getLoggedIn();

        /**
         * View laden und Daten übergeben.
         */
        View::render('summary', [
            'cartContent' => $cartContent,
            'user' => $user
        ]);
    }

    /**
     * Buchung wirklich durchführen.
     *
     * @throws \Exception
     */
    public function finish()
    {
        /**
         * + Booking Einträge anlegen
         * + Units reduzieren
         */

        /**
         * Einträge aus dem Cart und eingeloggte*n User*in holen.
         */
        $cartContent = CartService::get();
        $user = User::getLoggedIn();

        /**
         * Alle Einträge aus dem Cart durchgehen.
         */
        foreach ($cartContent as $itemFromCart) {
            /**
             * Nachdem ein Equipment mehrmals im Cart sein kann, legen wir hier für jedes einzelne Equipment einen
             * Booking-Eintrag an. Eleganter wäre es, in der bookings Tabelle eine quantity Spalte hinzuzufügen und
             * nicht für dasselbe Equipment mehrere Einträge anzulegen, aber der Einfachheit halber machen wir es
             * jetzt mal so.
             */
            for ($i = 1; $i <= $itemFromCart->count; $i++) {
                /**
                 * Booking Objekt erstellen und befüllen.
                 */
                $order = new Order();
                $order->fill([
                    'user_id' => $user->id,
                    'product_id' => $itemFromCart->id
                ]);
                /**
                 * Booking Objekt in die Datenbank speichern.
                 */
                if (!$order->save()) {
                    /**
                     * Konnte nicht gespeichert werden, schreiben wir einen Fehler und leiten zurück zur Zusammenfassung.
                     */
                    Session::set('errors', ['Bookings konnten nicht gespeichert werden.']);
                    Redirector::redirect('/checkoutsummary');
                }
            }

            /**
             * Hat das Objekt aus dem Cart, das wir grade bearbeiten, eine units-Property, dann entfernen wir die
             * Anzahl der gerade gebuchten Elemente und reduzieren somit den "Lagerbestand."
             */
            if (property_exists($itemFromCart, 'units')) {
                $itemFromCart->units = $itemFromCart->units - $itemFromCart->count;
                $itemFromCart->save();
            }
        }

        /**
         * Nun löschen wir den Inhalt des Carts, der soeben erfolgreich gebucht wurde ...
         */
        CartService::destroy();
        /**
         * ... schreiben eine Erfolgsmeldung und leiten weiter.
         */
        Session::set('success', ['Equipment erfolgreich gebucht!']);
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



        /**
         * Neue*n User*in in die Datenbank speichern.
         *
         * Die User::save() Methode gibt true zurück, wenn die Speicherung in die Datenbank funktioniert hat.
         */
        if ($user->save()) {
            /**
             * Hat alles funktioniert und sind keine Fehler aufgetreten, leiten wir zum Login Formular.
             *
             * Um eine Erfolgsmeldung ausgeben zu können, verwenden wir dieselbe Mechanik wie für die errors.
             */
            Session::set('success', ['Profil erfolgreich aktualisiert.']);
        } else {
            /**
             * Fehlermeldung erstellen und in die Session speichern.
             */
            $errors[] = 'Leider ist ein Fehler aufgetreten. Bitte probieren Sie es erneut! :(';
            Session::set('errors', $errors);
        }

        /**
         * Redirect zurück zum Profile.
         */
        Redirector::redirect('/checkout/summary');
    }

}
