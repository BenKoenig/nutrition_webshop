<?php

namespace App\Controllers\Products;

use App\Models\Category;
use App\Models\Merchant;
use App\Models\Goal;
use App\Models\Product;
use Core\Middlewares\AuthMiddleware;
use Core\View;
use Core\Session;
use Core\Helpers\Redirector;
use Core\Validator;
use Core\Models\AbstractFile;

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
    public function index()
    {
        //Checks if user is permited to view this page
        AuthMiddleware::isAdminOrFail();

        //loads all products
        $products = Product::all();

        //renders view
        View::render('products/panel/index', [
            'products' => $products
        ]);
    }



    public function update(int $id)
    {
        //Checks if user is permited to view this page
        AuthMiddleware::isAdminOrFail();


        $_POST['is_featured'] = empty($_POST['is_featured']) ? -1 : 1;
        $_POST['is_bestseller'] = empty($_POST['is_bestseller']) ? -1 : 1;
        $_POST['is_sale'] = empty($_POST['is_sale']) ? -1 : 1;

        //creates validation
        $validationErrors = $this->validateFormData($id);




        //checks for validation errors
        if (!empty($validationErrors)) {

            //sends error
            Session::set('errors', $validationErrors);

            //redirects user back to edit page
            Redirector::redirect("/admin/products/${id}/edit");
        }

        //searches for product with the id given in the parameter
        $product = Product::findOrFail($id);

        //fills product
        $product->fill($_POST);

        //updates image(s)
        $product = $this->handleUploadedFiles($product);

        //deletes image(s)
        $product = $this->handleDeleteFiles($product);

        //checks if product was saved
        if (!$product->save()) {
            //sends user error
            Session::set('errors', ['Failed to save']);

            //redirects user back to page
            Redirector::redirect("/admin/products/${id}/edit");
        }

        //after success, redirects user back to products admin page
        Redirector::redirect('/admin/products');
    }


    public function delete(int $id)
    {
        //Checks if user is permited to view this page
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
            'confirmUrl' => BASE_URL . '/admin/products/' . $product->id . '/delete/confirm',
            'abortUrl' => BASE_URL . '/admin/products/'
        ]);
    }



    public function deleteConfirm(int $id)
    {
        //Checks if user is permited to view this page
        AuthMiddleware::isAdminOrFail();

        //loads product with id given in the parameter
        $product = Product::findOrFail($id);

        //deletes product
        $product->delete();

        //updates session
        Session::set('success', ['The product has been sucessfully deleted']);

        //redirects user back to products admin page
        Redirector::redirect('/admin/products/');
    }




    public function create()
    {
        //Checks if user is permited to view this page
        AuthMiddleware::isAdminOrFail();

        //goes through all categories
        $categories = Category::all();

        //goes through all goals
        $goals = Goal::all();

        //goes through all merchants
        $merchants = Merchant::all();

        //renders view
        View::render('products/panel/create', [
            'categories' => $categories,
            'goals' => $goals,
            'merchants' => $merchants,
        ]);
    }



    public function store()
    {
        //Checks if user is permited to view this page
        AuthMiddleware::isAdminOrFail();

        //if checkbox is left empty, it will return 0
        //if checkbox is checked, it will return 1
        $_POST['is_featured'] = empty($_POST['is_featured']) ? 0 : 1;
        $_POST['is_bestseller'] = empty($_POST['is_bestseller']) ? 0 : 1;
        $_POST['is_sale'] = empty($_POST['is_sale']) ? 0 : 1;


        //creates array
        $validationErrors = $this->validateFormData();

        //checks if there were validation errors
        if (!empty($validationErrors)) { #
            //updates session
            Session::set('errors', $validationErrors);

            //redirects user back to edit create page
            Redirector::redirect("/admin/products/create");
        }

        //creates new product
        $product = new Product();

        //fills product
        $product->fill($_POST);

        //uploads image(s)
        $product = $this->handleUploadedFiles($product);

        //deletes image(s)
        $product = $this->handleDeleteFiles($product);

        //checks if product was saved
        if (!$product->save()) {
            //updates session
            Session::set('errors', ['Failed to save']);

            //redirectws user back to admin create page
            Redirector::redirect("/admin/products/create");
        }

        //redirects user back to products admin page
        Redirector::redirect('/admin/products');
    }



    private function validateFormData(int $id = 0): array
    {
        //creates new Validatior
        $validator = new Validator();

        if (!empty($_POST)) {
            //Validations
            $validator->textnum($_POST['name'], label: 'Name', required: true, max: 255);
            $validator->numeric($_POST['price'], label: 'Price', required: true);
            $validator->numeric($_POST['serving'], label: 'Serving', required: true);
            $validator->numeric($_POST['weight'], label: 'Weight', required: true);
            $validator->file($_FILES['imgs'], label: 'imgs', type: 'image');
        }

        return $validator->getErrors();
    }




    public function edit(int $id)
    {
        //Checks if user is permited to view this page
        AuthMiddleware::isAdminOrFail();

        //loads product with given id in the parameter
        $product = Product::findOrFail($id);

        //loads all categories
        $categories = Category::all();

        //loads all merchants
        $merchants = Merchant::all();

        //loads all goals
        $goals = Goal::all();

        //renders view
        View::render('products/panel/edit', [
            'product' => $product,
            'categories' => $categories,
            'merchants' => $merchants,
            'goals' => $goals
        ]);
    }




    public function handleUploadedFiles(Product $product): ?Product
    {
        $files = AbstractFile::createFromUploadedFiles('imgs');

        //goes through files
        foreach ($files as $file) {
            //uploads image to folder
            $storagePath = $file->putToUploadsFolder();
            $product->addImages([$storagePath]);
        }
        return $product;
    }



    private function handleDeleteFiles(Product $product): Product
    {
        //checks if a checkbox was selected
        if (isset($_POST['delete-images'])) {
            //goes through all selected checkboxes
            foreach ($_POST['delete-images'] as $deleteImage) {

                //removes selected image(s)
                $product->removeImages([$deleteImage]);

                //deletes image(s) from folder
                AbstractFile::delete($deleteImage);
            }
        }

        return $product;
    }
}
