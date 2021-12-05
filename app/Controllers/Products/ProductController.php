<?php

namespace App\Controllers\Products;

use App\Models\Category;
use App\Models\Product;
use Core\Middlewares\AuthMiddleware;
use Core\View;
use Core\Session;
use Core\Helpers\Redirector;



class ProductController {
    public function index(int $id) {
        $products = Product::all('name', 'asc', null, 'category_id', $id);
        $category = Category::findOrFail($id);

        //Renders view and displays products and the category with the $id given in the parameter
        View::render('products/productList', [
            'products' => $products,
            'category' => $category
        ]);
    }

    public function detail(int $id) {
        $product = Product::find($id);

        //Renders a specific product with the $id given in the parameter
        View::render('products/productDetails', [
            'product' => $product,
        ]);
    }

}