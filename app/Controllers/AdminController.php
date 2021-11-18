<?php

namespace App\Controllers;

use Core\Middlewares\AuthMiddleware;
use Core\View;

/**
 * ControlPanelController
 */
class AdminController
{

    /**
     * Render the Control Panel
     */
    public function index()
    {
        AuthMiddleware::isAdminOrFail();
        View::render('admin');
    }
    
    
}
