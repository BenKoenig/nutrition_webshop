<?php

namespace App\Controllers;

use Core\Middlewares\AuthMiddleware;
use Core\View;

/**
 * ControlPanelController
 */
class CartController
{

    /**
     * Render the Control Panel
     */
    public function index()
    {
        View::render('cart');
    }
    
    
}
