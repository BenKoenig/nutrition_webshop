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
        AuthMiddleware::isAdminOrFail();

        $products = Product::all();
        /**
         * Renders the View
         */
        View::render('products/panel/index', [
            'products' => $products
        ]);
    }



    public function update(int $id)
    {

        AuthMiddleware::isAdminOrFail();

        $validationErrors = $this->validateFormData($id);


        $_POST['is_featured'] = $_POST['is_featured'] === 0 ? 0 : 1;
        $_POST['is_bestseller'] = $_POST['is_bestseller'] === 0 ? 0 : 1;
        $_POST['is_sale'] = $_POST['is_sale'] === 0 ? 0 : 1;
  
        if (!empty($validationErrors)) {
    
            Session::set('errors', $validationErrors);
   
            Redirector::redirect("/admin/products/${id}/edit");
        }

  
        $product = Product::findOrFail($id);



        $product->fill($_POST);

        $product = $this->handleUploadedFiles($product);


        $product = $this->handleDeleteFiles($product);



 
        if (!$product->save()) {
            Session::set('errors', ['Speichern fehlgeschlagen.']);
            Redirector::redirect("/admin/products/${id}/edit");
        }
        Redirector::redirect('/admin/products');
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
            'confirmUrl' => BASE_URL . '/admin/products/' . $product->id . '/delete/confirm',
            'abortUrl' => BASE_URL . '/admin/products/'
        ]);
    }



    public function deleteConfirm(int $id)
    {
        AuthMiddleware::isAdminOrFail();

        $product = Product::findOrFail($id);
        $product->delete();
        Session::set('success', ['The product has been sucessfully deleted.']);
  
        Redirector::redirect('/admin/products/');
    }




    public function create()
    {
        AuthMiddleware::isAdminOrFail();

        $categories = Category::all();
        $goals = Goal::all();
        $merchants = Merchant::all();

        View::render('products/panel/create', [
            'categories' => $categories,
            'goals' => $goals,
            'merchants' => $merchants,
        ]);
    }



    public function store()
    {
        AuthMiddleware::isAdminOrFail();

        $_POST['is_featured'] = empty($_POST['is_featured']) ? 0 : 1;
        $_POST['is_bestseller'] = empty($_POST['is_bestseller']) ? 0 : 1;
        $_POST['is_sale'] = empty($_POST['is_sale']) ? 0 : 1;


     
        $validationErrors = $this->validateFormData();

 
        if (!empty($validationErrors)) {
            Session::set('errors', $validationErrors);
            Redirector::redirect("/admin/products/create");
        }
        $product = new Product();
        $product->fill($_POST);
        $product = $this->handleUploadedFiles($product);
        $product = $this->handleDeleteFiles($product);

        if (!$product->save()) {
            Session::set('errors', ['Speichern fehlgeschlagen.']);
            Redirector::redirect("/admin/products/create");
        }

        Redirector::redirect('/admin/products');
    }



    private function validateFormData(int $id = 0): array
    {
        $validator = new Validator();

        if (!empty($_POST)) {
            //Validations
            $validator->letters($_POST['name'], label: 'Name', required: true, max: 255);
            $validator->numeric($_POST['price'], label: 'Price', required: true);
            $validator->textnum($_POST['description'], label: 'Description', required: true, max: 1000);
            $validator->numeric($_POST['serving'], label: 'Serving', required: true);
            $validator->textnum($_POST['ingredients'], label: 'Ingredients', required: true, max:1000);
            $validator->numeric($_POST['weight'], label: 'Weight', required: true);
            $validator->file($_FILES['imgs'], label: 'imgs', type: 'image');
        }

        return $validator->getErrors();
    }






    public function edit(int $id)
    {
        AuthMiddleware::isAdminOrFail();

        $product = Product::findOrFail($id);
        $categories = Category::all();
        $merchants = Merchant::all();
        $goals = Goal::all();


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


        foreach ($files as $file) {
            $storagePath = $file->putToUploadsFolder();
            $product->addImages([$storagePath]);
        }
        return $product;
    }



    private function handleDeleteFiles(Product $product): Product
    {
        /**
         * Wir prüfen, ob eine der Checkboxen angehakerlt wurde.
         */
        if (isset($_POST['delete-images'])) {
            /**
             * Wenn ja, gehen wir alle Checkboxen durch ...
             */
            foreach ($_POST['delete-images'] as $deleteImage) {
                /**
                 * Lösen die Verknüpfung zum Room ...
                 */
                $product->removeImages([$deleteImage]);
                /**
                 * ... und löschen die Datei aus dem Uploads-Ordner.
                 */
                AbstractFile::delete($deleteImage);
            }
        }

        return $product;
    }
}
