<?php

namespace App\Controllers;

use App\Models\Categorie;
use Core\View;

/**
 * Beispiel Controller
 */
class CategoryController
{

    /**
     * Beispielmethode
     */
    public function index()
    {
        View::render('categories', ['foo' => 'bar']);
    }


    /**
     * Alle Räume und Equipment auflisten
     */
    public function categories()
    {
        /**
         * Alle Räume aus der Datenbank laden und von der Datenbank sortieren lassen.
         */
        $categories = Categorie::all('id', 'ASC');

        /**
         * View laden und Daten übergeben.
         */
        View::render('categories', [
            'categories' => $categories
        ]);
    }

}
