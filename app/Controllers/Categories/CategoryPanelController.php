<?php

namespace App\Controllers\Categories;

use App\Models\Category;
use Core\Middlewares\AuthMiddleware;
use Core\View;
use Core\Validator;
use Core\Session;
use Core\Helpers\Redirector;
use Core\Models\AbstractFile;


class CategoryPanelController
{
    public function index()
    {
        //Checks if user is permited to view this page
        AuthMiddleware::isAdminOrFail();

        //goes through all categories
        $categories = Category::all('id', 'ASC');

        //renders view
        View::render('categories/panel/index', [
            'categories' => $categories
        ]);
    }




    public function edit(int $id)
    {
        //Checks if user is permited to view this page
        AuthMiddleware::isAdminOrFail();

        /**
         * Gewünschtes Element über das zugehörige Model aus der Datenbank laden.
         */
        $categorie = Category::findOrFail($id);

        /**
         * Alle Room Features aus der Datenbank laden, damit wir im View Checkboxen generieren können.
         */


        /**
         * View laden und Daten übergeben.
         */
        View::render('categories/panel/edit', [
            'categorie' => $categorie
        ]);
    }


    public function update(int $id)
    {
        //Checks if user is permited to view this page
        AuthMiddleware::isAdminOrFail();


        $_POST['is_popular'] = empty($_POST['is_popular']) ? -1 : 1;


        //creates validation
        $validationErrors = $this->validateFormData($id);




        //checks for validation errors
        if (!empty($validationErrors)) {

            //sends error
            Session::set('errors', $validationErrors);

            //redirects user back to edit page
            Redirector::redirect("/admin/categories/${id}/edit");
        }

        //searches for product with the id given in the parameter
        $category = Category::findOrFail($id);

        //fills product
        $category->fill($_POST);

        //updates image(s)
        $category = $this->handleUploadedFiles($category);

        //deletes image(s)
        $category = $this->handleDeleteFiles($category);

        //checks if product was saved
        if (!$category->save()) {
            //sends user error
            Session::set('errors', ['Failed to save']);

            //redirects user back to page
            Redirector::redirect("/admin/categories/${id}/edit");
        }

        //after success, redirects user back to products admin page
        Redirector::redirect('/admin/categories');
    }


    public function create()
    {
        //Checks if user is permited to view this page
        AuthMiddleware::isAdminOrFail();

        //renders view
        View::render('categories/panel/create');
    }


    public function store()
    {
        //Checks if user is permited to view this page
        AuthMiddleware::isAdminOrFail();

        //if is_popular is left empty it returns 0
        //if is_popular is checked it returns 1 
        $_POST['is_popular'] = empty($_POST['is_popular']) ? 0 : 1;
        // var_dump($_POST['is_popular']);

     
        //creates new validator
        $validationErrors = $this->validateFormData();

        //checks if there were validation errors
        if (!empty($validationErrors)) {
            //sends user error message
            Session::set('errors', $validationErrors);

            //redirects user back to category admin panel
            Redirector::redirect("/admin/categories/create");
        }

        //creates new category
        $category = new Category();

        //fills category
        $category->fill($_POST);

        //uploads image(s) to category
        $category = $this->handleUploadedFiles($category);

        //deletes image(s) from category
        $category = $this->handleDeleteFiles($category);

        //checks if category was saved
        if (!$category->save()) {
            //sends error message
            Session::set('errors', ['Speichern fehlgeschlagen.']);

            //redirects user back to create page
            Redirector::redirect("/admin/categories/create");
        }

        //Redirects user back to category admin panel - once category was created successfully
        Redirector::redirect('/admin/categories');
    }

    public function delete(int $id)
    {
        //Checks if user is permited to view this page
        AuthMiddleware::isAdminOrFail();

        //loads category with id given in the parameter
        $categorie = Category::findOrFail($id);

        //Renders view and provides information for the delete confirmation page
        View::render('helpers/confirmation', [
            'objectType' => 'Category',
            'objectTitle' => $categorie->name,
            'confirmUrl' => BASE_URL . '/admin/categories/' . $categorie->id . '/delete/confirm',
            'abortUrl' => BASE_URL . '/admin/categories'
        ]);
    }


    public function deleteConfirm(int $id)
    {
        //Checks if user is permited to view this page
        AuthMiddleware::isAdminOrFail();

        //lodas category with id given in the parameter
        $categorie = Category::findOrFail($id);

        //deletes category
        $categorie->delete();

        //Sends sucess message
        Session::set('success', ['The category has been sucessfully deleted.']);

        //redirects to category admin panel
        Redirector::redirect('/admin/categories');
    }


    private function validateFormData(int $id = 0): array
    {
        //creates new validator
        $validator = new Validator();

        //checks if form was filled out
        if (!empty($_POST)) {
            //validates fields
            $validator->textnum($_POST['name'], label: 'Category Name', required: true, max: 255);
            $validator->file($_FILES['imgs'], label: 'imgs', type: 'image');
        }

        //returns errors
        return $validator->getErrors();
    }



    public function handleUploadedFiles(Category $categorie): ?Category
    {
        //creates array
        $files = AbstractFile::createFromUploadedFiles('imgs');


        //goes through all files
        foreach ($files as $file) {
            //saves inside upload folder
            $storagePath = $file->putToUploadsFolder();

            //connects image to category
            $categorie->addImages([$storagePath]);
        }

        //returns updated category
        return $categorie;
    }


    private function handleDeleteFiles(Category $categorie): Category
    {
        //checks if checkboxes are checked
        if (isset($_POST['delete-images'])) {
            //goes through all selected checkboxes
            foreach ($_POST['delete-images'] as $deleteImage) {
                //removes image(s)
                $categorie->removeImages([$deleteImage]);

                //deletes image(s) from folder
                AbstractFile::delete($deleteImage);
            }
        }

        return $categorie;
    }
}
