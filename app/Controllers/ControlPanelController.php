<?php

namespace App\Controllers;
use Core\View;

/**
 * ControlPanelController
 */
class ControlPanelController
{

    /**
     * Render the Control Panel
     */
    public function render()
    {
        View::render('control_panel/control_panel');
    }
}
