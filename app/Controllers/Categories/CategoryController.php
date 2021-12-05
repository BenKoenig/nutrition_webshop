<?php

namespace App\Controllers\Categories;

use App\Models\Category;
use Core\View;

class CategoryController
{

    public function index()
    {
        //lodas all categories
        $categories = Category::all('id', 'ASC');

        //renders view
        View::render('categories/categories', [
            'categories' => $categories
        ]);
    }

}
