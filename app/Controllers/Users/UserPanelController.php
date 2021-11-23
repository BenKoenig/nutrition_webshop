<?php

namespace App\Controllers\Users;

use App\Models\User;
use Core\Middlewares\AuthMiddleware;
use Core\View;
use Core\Validator;
use Core\Session;
use Core\Helpers\Redirector;
use Core\Models\AbstractFile;


class UserPanelController
{
    public function index()
    {
        AuthMiddleware::isAdminOrFail();
        $users = User::all('id', 'ASC');
        View::render('users/panel/index', [
            'users' => $users
        ]);
    }
}
