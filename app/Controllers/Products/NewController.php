<?php

namespace App\Controllers\Products;

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
        View::render('products/new', [
            'products' => $products,
        ]);
    }
}