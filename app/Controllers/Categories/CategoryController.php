<?php

namespace App\Controllers\Categories;

use App\Models\Category;
use Core\View;

class CategoryController
{

    public function index()
    {
        $categories = Category::all('id', 'ASC');

 
        View::render('categories/categories', [
            'categories' => $categories
        ]);
    }

}
