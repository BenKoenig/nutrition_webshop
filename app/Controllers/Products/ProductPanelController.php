<?php

namespace App\Controllers\Products;

use App\Models\Categorie;
use App\Models\Product;
use Core\Middlewares\AuthMiddleware;
use Core\View;
use Core\Session;
use Core\Helpers\Redirector;

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

    public function index(int $id, int $di)
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
        $categories = Categorie::findWhereOrFail('id', $id);
        $categorie = Categorie::find($id);
    
        $test = $di;

        /**
         * Renders the View
         */
        View::render('products/panel/index', [
            'products' => $products,
            'categories' => $categories,
            'categorie' => $categorie,
            'test' => $test
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

}
