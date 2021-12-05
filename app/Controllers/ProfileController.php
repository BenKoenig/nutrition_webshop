<?php

namespace App\Controllers;

use App\Models\User;
use Core\Middlewares\AuthMiddleware;
use Core\View;
use Core\Validator;
use Core\Session;
use Core\Helpers\Redirector;

/**
 * Profile Controller
 */
class ProfileController
{
    public function __construct()
    {
        //Checks if user is permited to view this page
        AuthMiddleware::isLoggedInOrFail();
    }

    public function index()
    {
        //checks if user is logged  in
        $user = User::getLoggedIn();

        //renders view
        View::render('profile', [
            'user' => $user
        ]);
    }


    public function update()
    {
        //Checks if user is permited to view this page
        $user = User::getLoggedIn();

        //Validates data
        $validator = new Validator();
        $validator->email($_POST['email'], label: 'E-Mail', required: true);
        $validator->letters($_POST['firstname'], label: 'First Name', required: true);
        $validator->letters($_POST['lastname'], label: 'Last Name', required: true);
        $validator->textnum($_POST['adress_1'], label: 'Adress 1', required: true);
        $validator->textnum($_POST['adress_2'], label: 'Adress 2', required: false);
        $validator->numeric($_POST['postal_code'], label: 'Postal Code', required: true);
        $validator->unique($_POST['email'], 'E-Mail', 'users', 'email', ignoreThisId: $user->id);
        $validator->letters($_POST['city'], label: 'City', required: true);
        $validator->letters($_POST['country'], label: 'country', required: true);
        $validator->password($_POST['password'], label: 'Passwort', min: 8, required: false);

        //compares passwords
        $validator->compare([
            $_POST['password'],
            'Passwort'
        ], [
            $_POST['password_repeat'],
            'Passwort wiederholen'
        ]);

        //error array list
        $errors = $validator->getErrors();

        //checks if there was an error
        if (!empty($errors)) {
            Session::set('errors', $errors);
            Redirector::redirect('/profile');
        }


        //fields that need to  be updated
        $fields = ['email', 'username', 'firstname', 'lastname', 'adress_1', 'adress_2', 'postal_code', 'city', 'country'];
        foreach ($fields as $field) {
            $user->$field = trim($_POST[$field]);
        }

        if (!empty($_POST['password'])) {
            $user->setPassword($_POST['password']);
        }

        //checks if it saved successfully
        if ($user->save()) {
            Session::set('success', ['Profil erfolgreich aktualisiert.']);
        } else {
    
            $errors[] = 'Leider ist ein Fehler aufgetreten. Bitte probieren Sie es erneut! :(';
            Session::set('errors', $errors);
        }

        //redirects to profile
        Redirector::redirect('/profile');
    }

}
