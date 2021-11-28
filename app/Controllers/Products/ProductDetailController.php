<?php

namespace App\Controllers\Products;

use App\Models\Product;
use App\Models\Merchant;
use Core\View;

class ProductDetailController {
    
    public function index(int $id)
    {
        /**
         * Alle Räume aus der Datenbank laden und von der Datenbank sortieren lassen.
         */;
         $product = Product::findOrFail($id);

         $merchant = Merchant::all(null, null, $id);

        /**
         * View laden und Daten übergeben.
         */
        View::render('products/productDetail', [
            'product' => $product,
            'merchant' => $merchant
        ]);
    }
}