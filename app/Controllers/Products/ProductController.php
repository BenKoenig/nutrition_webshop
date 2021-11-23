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

        View::render('products/productList', [
            'products' => $products,
            'category' => $category
        ]);
    }

    public function detail(int $id) {
        $product = Product::find($id);
        View::render('products/productDetails', [
            'product' => $product,
        ]);
    }

}