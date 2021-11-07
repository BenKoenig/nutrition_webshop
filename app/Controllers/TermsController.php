<?php

namespace App\Controllers;

use Core\Helpers\Redirector;
use Core\Session;
use Core\View;
use App\Models\User;

/**
 * Class AuthController
 *
 * @package App\Controllers
 */
class TermsController
{

    /**
     * Loin Formular anzeigen
     */
    public function render()
    {
        
        View::render('terms');
    }

  

}
