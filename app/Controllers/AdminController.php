<?php

namespace App\Controllers;

use Core\Middlewares\AuthMiddleware;
use Core\View;

class AdminController
{

    public function index()
    {
        //checks if user is admin
        AuthMiddleware::isAdminOrFail();

        //renders admin panel view
        View::render('admin');
    }
    
    
}
