<?php

namespace App\Controllers\Merchants;

use App\Models\Merchant;
use Core\Middlewares\AuthMiddleware;
use Core\View;
use Core\Validator;
use Core\Session;
use Core\Helpers\Redirector;


class MerchantPanelController
{
    public function index()
    {
        //Checks if user is permited to view this page
        AuthMiddleware::isAdminOrFail();

        //loads all merchants and sorts by id
        $merchants = Merchant::all('id', 'ASC');

        //renders view
        View::render('merchants/panel/index', [
            'merchants' => $merchants
        ]);
    }


    public function edit(int $id)
    {
        //Checks if user is permited to view this page
        AuthMiddleware::isAdminOrFail();

        //loads merchant with given $id in the parameter 
        $merchant = Merchant::findOrFail($id);

        //renders view
        View::render('merchants/panel/edit', [
            'merchant' => $merchant
        ]);
    }



    public function update(int $id)
    {
        //Checks if user is permited to view this page
        AuthMiddleware::isAdminOrFail();

        $validationErrors = $this->validateFormData($id);


        if (!empty($validationErrors)) {

            Session::set('errors', $validationErrors);

            Redirector::redirect("/admin/merchants/${id}/edit");
        }


        $merchant = Merchant::findOrFail($id);
        $merchant->fill($_POST);

        if (!$merchant->save()) {
            Session::set('errors', ['Speichern fehlgeschlagen.']);
            Redirector::redirect("/merchants/${id}/edit");
        }


        Redirector::redirect('/admin/merchants');
    }





    public function create()
    {
        //Checks if user is permited to view this page
        AuthMiddleware::isAdminOrFail();

        View::render('merchants/panel/create');
    }


    public function store()
    {
        //Checks if user is permited to view this page
        AuthMiddleware::isAdminOrFail();

        $validationErrors = $this->validateFormData();

        //checks if there were validation errors
        if (!empty($validationErrors)) {
            //sends user error message
            Session::set('errors', $validationErrors);
            Redirector::redirect("/admin/categories/create");
        }

        //creates new merchant
        $merchant = new Merchant();
        //fills merchant table
        $merchant->fill($_POST);

        //checks if merchant was saved correctly
        if (!$merchant->save()) {
            //Sends error message
            Session::set('errors', ['Speichern fehlgeschlagen.']);
            Redirector::redirect("/admin/merchants/create");
        }

        //... sends user back to admin panel once merchant was saved successfully
        Redirector::redirect('/admin/merchants');
    }
    public function delete(int $id)
    {
        //Checks if user is permited to view this page
        AuthMiddleware::isAdminOrFail();

        //selected merchant that is supposed to be deleted
        $merchant = Merchant::findOrFail($id);

        //provides details for the delete confirmation page
        View::render('helpers/confirmation', [
            'objectType' => 'Merchant',
            'objectTitle' => $merchant->name,
            'confirmUrl' => BASE_URL . '/admin/merchants/' . $merchant->id . '/delete/confirm',
            'abortUrl' => BASE_URL . '/admin/merchants'
        ]);
    }


    public function deleteConfirm(int $id)
    {
        //Checks if user is permited to view this page
        AuthMiddleware::isAdminOrFail();

        /**
         * Raum, der gelöscht werden soll, aus DB laden.
         */
        $merchant = Merchant::findOrFail($id);
        /**
         * Raum löschen.
         */
        $merchant->delete();

        /**
         * Erfolgsmeldung für später in die Session speichern.
         */
        Session::set('success', ['The category has been sucessfully deleted.']);
        /**
         * Weiterleiten zur Home Seite.
         */
        Redirector::redirect('/admin/merchants');
    }


    private function validateFormData(int $id = 0): array
    {
        //creates new validator
        $validator = new Validator();

        //makes sure the form is filled out
        if (!empty($_POST)) {
            //validates inputs
            $validator->letters($_POST['name'], label: 'Goal', required: true, max: 255);
            $validator->textnum($_POST['website'], label: 'Website', required: true, max: 255);
        }

        //returns errors
        return $validator->getErrors();
    }
}
