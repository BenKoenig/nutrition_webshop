<?php

namespace App\Controllers\Products;

use App\Models\Product;
use App\Models\Merchant;
use Core\View;

class ProductDetailController
{

    public function index(int $id)
    {
        //loads the product and merchant
        $product = Product::findOrFail($id);
        $merchant = Merchant::all(null, null, $id);

        //Renders view and a product and merchant that have the $id given in the parameter
        View::render('products/productDetail', [
            'product' => $product,
            'merchant' => $merchant
        ]);
    }
}
