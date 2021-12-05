<?php

namespace App\Controllers\Products;

use App\Models\Product;
use Core\View;

class SaleController
{
    public function index()
    {
        //loads all products
        $products = Product::all('updated_at', 'ASC', null, 'is_sale', 1);

        //Renders view
        View::render('products/sales', [
            'products' => $products,
        ]);
    }
}
