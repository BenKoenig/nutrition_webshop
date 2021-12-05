<?php

namespace App\Controllers\Goals;

use App\Models\Goal;
use App\Models\Product;
use Core\View;


class GoalController
{
    public function index(int $id)
    {
        //loads goal with the id from the parameter
        $goal = Goal::findOrFail($id);

        //loads all products
        $products = Product::all(null, null, null,'goal_id', $id);

        //renders view
        View::render('goals/productList', [
            'goal' => $goal,
            'products' => $products
        ]);
    }
}