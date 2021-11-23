<?php

namespace App\Controllers\Ratings;

use App\Models\Rating;
use App\Models\Category;
use App\Models\Product;
use Core\Middlewares\AuthMiddleware;
use Core\View;
use Core\Validator;
use Core\Session;
use Core\Helpers\Redirector;


class RatingPanelController
{
    public function index(int $id)
    {
        AuthMiddleware::isAdminOrFail();
        $ratings = Rating::findWhereOrFail('product_id', $id);
        $product = Product::find($id);
        View::render('ratings/panel/index', [
            'ratings' => $ratings,
            'product' => $product
        ]);
    }



    public function delete(int $id)
    {
        /**
         * Prüfen, ob ein*e User*in eingeloggt ist und ob diese*r eingeloggte User*in Admin ist. Wenn nicht, geben wir
         * einen Fehler 403 Forbidden zurück. Dazu haben wir eine Art Middleware geschrieben, damit wir nicht immer
         * dasselbe if-Statement kopieren müssen, sondern einfach diese Funktion aufrufen können.
         */
        AuthMiddleware::isAdminOrFail();

        /**
         * Raum, der gelöscht werden soll, aus der DB laden.
         */
        $rating = Rating::find($id);

        /**
         * View laden und relativ viele Daten übergeben. Die große Anzahl an Daten entsteht dadurch, dass der
         * helpers/confirmation-View so dynamisch wie möglich sein soll, damit wir ihn für jede Delete Confirmation
         * Seite verwenden können, unabhängig vom Objekt, das gelöscht werden soll. Wir übergeben daher einen Typ und
         * einen Titel, die für den Text der Confirmation verwendet werden, und zwei URLs, eine für den
         * Bestätigungsbutton und eine für den Abbrechen-Button.
         */
        View::render('helpers/confirmation', [
            'objectType' => 'Rating',
            'objectTitle' => $rating->title,
            'confirmUrl' => BASE_URL . '/admin/ratings/' . $rating->id . '/delete/confirm',
            'abortUrl' => BASE_URL . '/admin/categories/' . $rating->product_id
        ]);
    }


    /**
     * Raum löschen.
     *
     * @param int $id
     *
     * @throws \Exception
     */
    public function deleteConfirm(int $id)
    {
        /**
         * Prüfen, ob ein*e User*in eingeloggt ist und ob diese*r eingeloggte User*in Admin ist. Wenn nicht, geben wir
         * einen Fehler 403 Forbidden zurück. Dazu haben wir eine Art Middleware geschrieben, damit wir nicht immer
         * dasselbe if-Statement kopieren müssen, sondern einfach diese Funktion aufrufen können.
         */
        AuthMiddleware::isAdminOrFail();

        /**
         * Raum, der gelöscht werden soll, aus DB laden.
         */
        $rating = Rating::findOrFail($id);
        /**
         * Raum löschen.
         */
        $rating->delete();

        /**
         * Erfolgsmeldung für später in die Session speichern.
         */
        Session::set('success', ['The category has been sucessfully deleted.']);
        /**
         * Weiterleiten zur Home Seite.
         */
        Redirector::redirect('/admin/categories/');
    }
}
