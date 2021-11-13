<?php

namespace App\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Core\View;

/**
 * ControlPanelController
 */
class ControlPanelController
{

    /**
     * Render the Control Panel
     */
    public function index()
    {
        View::render('control_panel/index');
    }
    /**
     * 
    public function products()
    {
        $products = Product::all('id', 'ASC');
        View::render('control_panel/panels/products_panel',[
            'products' => $products
        ]);
    }
     */

    public function products(int $id)
    {
        /**
         * Prüfen, ob ein*e User*in eingeloggt ist und ob diese*r eingeloggte User*in Admin ist. Wenn nicht, geben wir
         * einen Fehler 403 Forbidden zurück. Dazu haben wir eine Art Middleware geschrieben, damit wir nicht immer
         * dasselbe if-Statement kopieren müssen, sondern einfach diese Funktion aufrufen können.
         */

        /**
         * Gewünschtes Element über das zugehörige Model aus der Datenbank laden.
         */
        $products = Product::findWhere('category_id', $id);
        $categories = Categorie::findWhere('id', $id);

        /**
         * View laden und Daten übergeben.
         */
        View::render('control_panel/panels/products_panel', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function categories()
    {
        $categories = Categorie::all('id', 'ASC');
        View::render('control_panel/panels/categories_panel',[
            'categories' => $categories
        ]);
    }
}
