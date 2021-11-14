<?php

namespace App\Controllers\Categories;

use App\Models\Categorie;
use Core\Middlewares\AuthMiddleware;
use Core\View;
use Core\Validator;
use Core\Session;
use Core\Helpers\Redirector;


class CategoryPanelController
{
    public function index()
    {
        AuthMiddleware::isAdminOrFail();
        $categories = Categorie::all('id', 'ASC');
        View::render('categories/panel/index',[
            'categories' => $categories
        ]);
    }

    public function create() {
        AuthMiddleware::isAdminOrFail();

        View::render('categories/panel/create');
    }



    private function validateFormData(int $id = 0): array {
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
        $validator->textnum($_POST['name'], label: 'name', required: true, max: 255);
        $validator->textnum($_POST['img_url'], label: 'path', required: false, max: 255);
        
        /**
         * @todo: implement Validate Array + Contents
         */
    }

    /**
     * Fehler aus dem Validator zurückgeben.
     */
    return $validator->getErrors();
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

        // if (!$_POST['is_popular']) {
        //     $_POST['is_popular'] = '';
        // } 
        


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
            Redirector::redirect("/admin/categories/create");
        }

        /**
         * Neuen Room erstellen und mit den Daten aus dem Formular befüllen.
         */
        $categorie = new Categorie();


        $categorie->fill($_POST);

        /**
         * Schlägt die Speicherung aus irgendeinem Grund fehl ...
         */
        if (!$categorie->save()) {
            /**
             * ... so speichern wir einen Fehler in die Session und leiten wieder zurück zum Bearbeitungsformular.
             */
            var_dump($_POST['is_popular']);
            Session::set('errors', ['Speichern fehlgeschlagen.']);
            Redirector::redirect("/admin/categories/create");

            echo $_POST['is_popular'];
            Redirector::redirect('/admin/categories');
        }

        /**
         * Wenn alles funktioniert hat, leiten wir zurück zur /home-Route.
         */
        Redirector::redirect('/admin/categories');
        // var_dump($_POST['is_popular']);
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
        $categorie = Categorie::findOrFail($id);

        /**
         * View laden und relativ viele Daten übergeben. Die große Anzahl an Daten entsteht dadurch, dass der
         * helpers/confirmation-View so dynamisch wie möglich sein soll, damit wir ihn für jede Delete Confirmation
         * Seite verwenden können, unabhängig vom Objekt, das gelöscht werden soll. Wir übergeben daher einen Typ und
         * einen Titel, die für den Text der Confirmation verwendet werden, und zwei URLs, eine für den
         * Bestätigungsbutton und eine für den Abbrechen-Button.
         */
        View::render('helpers/confirmation', [
            'objectType' => 'Raum',
            'objectTitle' => $categorie->name,
            'confirmUrl' => BASE_URL . '/admin/categories/' . $categorie->id . '/delete/confirm',
            'abortUrl' => BASE_URL . '/admin/categories'
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
        $categorie = Categorie::findOrFail($id);
        /**
         * Raum löschen.
         */
        $categorie->delete();

        /**
         * Erfolgsmeldung für später in die Session speichern.
         */
        Session::set('success', ['The room has been sucessfully deleted.']);
        /**
         * Weiterleiten zur Home Seite.
         */
        Redirector::redirect('/admin/categories');
    }


}


