<?php

namespace App\Controllers\Products;

use App\Models\Categorie;
use App\Models\Product;
use Core\Middlewares\AuthMiddleware;
use Core\View;

/**
 * ControlPanelController
 */
class ProductPanelController
{

    public function index(int $id)
    {
        /**
         * Prüfen, ob ein*e User*in eingeloggt ist und ob diese*r eingeloggte User*in Admin ist. Wenn nicht, geben wir
         * einen Fehler 403 Forbidden zurück. Dazu haben wir eine Art Middleware geschrieben, damit wir nicht immer
         * dasselbe if-Statement kopieren müssen, sondern einfach diese Funktion aufrufen können.
         */
        AuthMiddleware::isAdminOrFail();
        /**
         * Gewünschtes Element über das zugehörige Model aus der Datenbank laden.
         */
        $products = Product::findWhere('category_id', $id);
        $categories = Categorie::findWhereOrFail('id', $id);

        /**
         * View laden und Daten übergeben.
         */
        View::render('products/panel/index', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

}
