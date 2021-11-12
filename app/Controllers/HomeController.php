<?php

namespace App\Controllers;

use App\Models\Room;
use App\Models\Categorie;
use App\Models\Goal;
use App\Models\Product;
use Core\View;

/**
 * Beispiel Controller
 */
class HomeController
{

    /**
     * Beispielmethode
     */
    public function index()
    {
        View::render('index', ['foo' => 'bar']);
    }


    /**
     * Alle Räume und Equipment auflisten
     */
    public function home()
    {
        /**
         * Alle Räume aus der Datenbank laden und von der Datenbank sortieren lassen.
         */
        $rooms = Room::all('room_nr', 'ASC');

        /**
         * View laden und Daten übergeben.
         */
        View::render('home', [
            'rooms' => $rooms
        ]);
    }

    public function display()
    {
        /**
         * Alle Räume aus der Datenbank laden und von der Datenbank sortieren lassen.
         */
        $categories = Categorie::findWhere('is_popular', 1);
        $goals = Goal::all('id', 'ASC');
        $products = Product::findWhere('is_featured', 1);

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
