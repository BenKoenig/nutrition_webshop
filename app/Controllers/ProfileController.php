<?php

namespace App\Controllers;

use App\Models\User;
use Core\Middlewares\AuthMiddleware;
use Core\View;

/**
 * Profile Controller
 */
class ProfileController
{
    public function __construct()
    {
        AuthMiddleware::isLoggedInOrFail();
    }

    public function index()
    {
        $user = User::getLoggedIn();

        /**
         * View laden und Daten übergeben.
         */
        View::render('profile', [
            'user' => $user
        ]);
    }
}
