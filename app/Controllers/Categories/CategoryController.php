<?php

namespace App\Controllers\Categories;

use App\Models\Categorie;
use Core\View;

class CategoryController
{

    public function index()
    {
        $categories = Categorie::all('id', 'ASC');

 
        View::render('categories/categories', [
            'categories' => $categories
        ]);
    }

}
