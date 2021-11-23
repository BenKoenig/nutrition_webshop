<?php

namespace App\Controllers\Products;

use App\Models\Product;
use Core\View;

class SaleController {
    public function index()
    {
        /**
         * Alle Räume aus der Datenbank laden und von der Datenbank sortieren lassen.
         */;
         $products = Product::all('updated_at', 'ASC', null, 'is_sale', 1);

        /**
         * View laden und Daten übergeben.
         */
        View::render('products/sales', [
            'products' => $products,
        ]);
    }
}