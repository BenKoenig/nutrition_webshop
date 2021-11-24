<?php

namespace App\Controllers\Products;

use App\Models\Category;
use App\Models\Flavor;
use App\Models\Merchant;
use App\Models\Goal;
use App\Models\Product;
use Core\Middlewares\AuthMiddleware;
use Core\View;
use Core\Session;
use Core\Helpers\Redirector;
use Core\Validator;

/**
 * ====================================================
 * ProductPanelController
 * 
 * This is the admin panel controller for all product
 * related details (such as product name, price,
 * image etc.)
 * ====================================================
 */
class ProductPanelController
{

    public function index(int $id)
    {
        /**
         * Check if user is logged in
         * If user is not logged        in, thex will receive an error
         */
        AuthMiddleware::isAdminOrFail();
        /**
         * Elements that need to be loaded
         */
        $products = Product::findWhere('category_id', $id);
        $categories = Category::findWhereOrFail('id', $id);
        $categorie = Category::find($id);
    


        /**
         * Renders the View
         */
        View::render('products/panel/index', [
            'products' => $products,
            'categories' => $categories,
            'categorie' => $categorie,

        ]);
    }

    public function delete(int $id)
    {
        /**
         * Check if user is logged in
         * If user is not logged in, thex will receive an error
         */
        AuthMiddleware::isAdminOrFail();

        /**
         * Loads the product
         */
        $product = Product::findOrFail($id);

        /**
         * Sends user to confirmation page
         */
        View::render('helpers/confirmation', [
            'objectType' => 'Category',
            'objectTitle' => $product->name,
            'confirmUrl' => BASE_URL . '/admin/categories/' . $product->category_id . '/' . $product->id . '/delete/confirm',
            'abortUrl' => BASE_URL . '/admin/categories/' . $product->category_id
        ]);
    }



    /**
     * Delete Confirmation Function
     */
    public function deleteConfirm(int $id)
    {
        /**
         * Check if user is logged in
         * => If user is not logged in, thex will receive an error
         */
        AuthMiddleware::isAdminOrFail();

        /**
         * Load the product
         */
        $product = Product::findOrFail($id);
        /**
         * Deletes the product
         */
        $product->delete();

        /**
         * Success Message
         */
        Session::set('success', ['The product has been sucessfully deleted.']);
        /**
         * User gets redirected to Category page
         */
        Redirector::redirect('/admin/categories/' . $product->category_id);
    }




    public function create()
    {
        AuthMiddleware::isAdminOrFail();


        /**
         * Alle Room Features aus der Datenbank laden, damit wir im View Checkboxen generieren können.
         */
        $categories = Category::all();
        $goals = Goal::all();
        $merchants = Merchant::all();

        /**
         * View laden und Daten übergeben.
         */
        View::render('products/panel/create', [
            'categories' => $categories,
            'goals' => $goals,
            'merchants' => $merchants,
        ]);

    }



    public function store()
    {
        /**
         * Prüfen, ob ein*e User*in eingeloggt ist und ob diese*r eingeloggte User*in Admin ist. Wenn nicht, geben wir
         * einen Fehler 403 Forbidden zurück. Dazu haben wir eine Art Middleware geschrieben, damit wir nicht immer
         * dasselbe if-Statement kopieren müssen, sondern einfach diese Funktion aufrufen können.
         */
        AuthMiddleware::isAdminOrFail();

        /**
         * 1) Daten validieren
         * 2) Model aus der DB abfragen, das aktualisiert werden soll
         * 3) Model in PHP überschreiben
         * 4) Model in DB zurückspeichern
         * 5) Redirect irgendwohin
         */


        /**
         * Nachdem wir exakt dieselben Validierungen durchführen für update und create, können wir sie in eine eigene
         * Methode auslagern und überall dort verwenden, wo wir sie brauchen.
         */
        $validationErrors = $this->validateFormData();

        /**
         * Sind Validierungsfehler aufgetreten ...
         */
        if (!empty($validationErrors)) {
            /**
             * ... dann speichern wir sie in die Session um sie in den Views dann ausgeben zu können ...
             */
            Session::set('errors', $validationErrors);
            /**
             * ... und leiten zurück zum Bearbeitungsformular. Der Code weiter unten in dieser Funktion wird dadurch
             * nicht mehr ausgeführt.
             */
            Redirector::redirect("/admin/products/create");
        }

        /**
         * Neuen Room erstellen und mit den Daten aus dem Formular befüllen.
         */
        $product = new Product();


        $product->fill($_POST);

        /**
         * Hochgeladene Dateien verarbeiten.
         */
        // $categorie = $this->handleUploadedFiles($categorie);
        // /**
        //  * Checkboxen verarbeiten, ob eine Datei gelöscht werden soll oder nicht.
        //  */
        // $categorie = $this->handleDeleteFiles($categorie);

        /**
         * Schlägt die Speicherung aus irgendeinem Grund fehl ...
         */
        if (!$product->save()) {
            /**
             * ... so speichern wir einen Fehler in die Session und leiten wieder zurück zum Bearbeitungsformular.
             */

            Session::set('errors', ['Speichern fehlgeschlagen.']);
            Redirector::redirect("/admin/products/create");
        }

        /**
         * Wenn alles funktioniert hat, leiten wir zurück zur /home-Route.
         */
        Redirector::redirect('/admin/products');
    }



    private function validateFormData(int $id = 0): array
    {
        /**
         * Neues Validator Objekt erstellen.
         */
        $validator = new Validator();

        /**
         * Gibt es überhaupt Daten, die validiert werden können?
         */
        if (!empty($_POST)) {
            /**
             * Daten validieren. Für genauere Informationen zu den Funktionen s. Core\Validator.
             *
             * Hier verwenden wir "named params", damit wir einzelne Funktionsparameter überspringen können.
             */
            // $validator->textnum($_POST['name'], label: 'Name', required: true, max: 255);
            // $validator->file($_FILES['imgs'], label: 'imgs', type: 'image');
            /**
             * @todo: implement Validate Array + Contents
             */
        }

        /**
         * Fehler aus dem Validator zurückgeben.
         */
        return $validator->getErrors();
    }

}

