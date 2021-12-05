<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Goal;
use App\Models\Product;
use Core\View;

/**
 * Home Controller Controller
 */
class HomeController
{
    public function index()
    {
        //lodas categories, goals and products
        $categories = Category::ALL('updated_at', 'ASC', null, 'is_popular', 1);
        $goals = Goal::all('id', 'ASC');
        $products = Product::ALL('updated_at', 'ASC', null, 'is_featured', 1);

        //renders view
        View::render('home', [
            'categories' => $categories,
            'goals' => $goals,
            'products' => $products
        ]);
    }
}
