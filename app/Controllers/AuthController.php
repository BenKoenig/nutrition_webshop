<?php

namespace App\Controllers;

use Core\Helpers\Redirector;
use Core\Session;
use Core\View;
use App\Models\User;
use Core\Validator;

class AuthController
{
    public function loginForm()
    {
        //Checks if user is logged in and sends them to homepage
        if (User::isLoggedIn()) {
            Redirector::redirect('/home');
        }

        //Sends user to login page if they aren't logged in
        View::render('auth/login');
    }

    public function loginDo()
    {

        $user = User::findByEmailOrUsername($_POST['username-or-email']);

        //Array for upcoming errrs
        $errors = [];

        //Checks if password is correct
        if (empty($user) || !$user->checkPassword($_POST['password'])) {
            $errors[] = 'Username/E-Mail oder Passwort sind falsch.';
        } else {
            $user->login('/home');
        }

        //Error if password is incorrect
        Session::set('errors', $errors);
        Redirector::redirect('/login');
    }



    public function registerForm()
    {
        //Sends user back to homepage if they are logged in
        if (User::isLoggedIn()) {
            Redirector::redirect('/home');
        }

        //Renders register form
        View::render('auth/register');
    }


    public function registerDo()
    {
        //Form Validation
        $validator = new Validator();
        $validator->email($_POST['email'], 'E-Mail', required: true);
        $validator->unique($_POST['email'], 'E-Mail', 'users', 'email');
        $validator->letters($_POST['firstname'], 'First Name', required: true);
        $validator->letters($_POST['lastname'], 'Last Name', required: true);
        $validator->textnum($_POST['adress_1'], 'Adress 1', required: true);
        $validator->textnum($_POST['adress_2'], 'Adress 2', required: false);
        $validator->numeric($_POST['postal_code'], 'Postal Code', required: true);
        $validator->letters($_POST['city'], 'City', required: true);
        $validator->letters($_POST['country'], 'country', required: true);
        $validator->password($_POST['password'], 'Passwort', min: 8, required: true);


        //Checks if both passwords are the same
        $validator->compare([
            $_POST['password'],
            'Passwort'
        ], [
            $_POST['password_repeat'],
            'Passwort wiederholen'
        ]);


        $errors = $validator->getErrors();

        //Errors
        if (!empty($errors)) {
            Session::set('errors', $errors);
            Redirector::redirect('/register');
        }


        //Once everything is validated
        $user = new User();
        $user->fill($_POST);
        $user->setPassword($_POST['password']);


        //Saves new users to the databse
        if ($user->save()) {
            //Sends user back to homepage
            Session::set('success', ['Herzlich wilkommen!']);
            $user->login('/home');
        } else {
            //Error message
            $errors[] = 'Leider ist ein Fehler aufgetreten. Bitte probieren Sie es erneut! :(';
            Session::set('errors', $errors);

            //Sends user back to register form
            Redirector::redirect('/register');
        }
    }

    //Logs user out
    public function logout()
    {
        User::logout('/');
    }
}
