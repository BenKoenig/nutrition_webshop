<?php

namespace App\Controllers;

use App\Models\Product;
use Core\View;

class NewController {
    public function index()
    {
        /**
         * Alle Räume aus der Datenbank laden und von der Datenbank sortieren lassen.
         */;
        $products = Product::all('created_at', 'ASC', '10');

        /**
         * View laden und Daten übergeben.
         */
        View::render('new', [
            'products' => $products,
        ]);
    }
}