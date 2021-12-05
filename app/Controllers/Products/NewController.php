<?php

namespace App\Controllers\Products;

use App\Models\Product;
use Core\View;

class NewController {
    public function index()
    {
        //Loads 10 products sorted  by their creation date
        $products = Product::all('created_at', 'ASC', '10');


        //Renders view and products
        View::render('products/new', [
            'products' => $products,
        ]);
    }
}