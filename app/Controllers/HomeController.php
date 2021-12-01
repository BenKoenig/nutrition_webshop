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
        /**
         * Alle Räume aus der Datenbank laden und von der Datenbank sortieren lassen.
         */
        $categories = Category::ALL('updated_at', 'ASC', null, 'is_popular', 1);
        $goals = Goal::all('id', 'ASC');
        $products = Product::ALL('updated_at', 'ASC', null, 'is_featured', 1);

        /**
         * View laden und Daten übergeben.
         */
        View::render('home', [
            'categories' => $categories,
            'goals' => $goals,
            'products' => $products
        ]);
    }
}
