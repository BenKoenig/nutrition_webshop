<?php

namespace App\Controllers\Goals;

use App\Models\Goal;
use Core\Middlewares\AuthMiddleware;
use Core\View;
use Core\Validator;
use Core\Session;
use Core\Helpers\Redirector;
use Core\Models\AbstractFile;



class GoalPanelController
{
    public function index()
    {
        //Checks if user is permited to view this page
        AuthMiddleware::isAdminOrFail();
        $goals = Goal::all('id', 'ASC');
        View::render('goals/panel/index', [
            'goals' => $goals
        ]);
    }




    public function edit(int $id)
    {
        //Checks if user is permited to view this page
        AuthMiddleware::isAdminOrFail();

        //searches for goal with the id given in the parameter
        $goal = Goal::findOrFail($id);

        //renders view
        View::render('goals/panel/edit', [
            'goal' => $goal
        ]);
    }



    public function update(int $id)
    {
        //Checks if user is permited to view this page
        AuthMiddleware::isAdminOrFail();

        $validationErrors = $this->validateFormData($id);

        //checks if there were validation errors
        if (!empty($validationErrors)) {
            Session::set('errors', $validationErrors); //notifies user about errors
            Redirector::redirect("/admin/goals/${id}/edit"); //refreshes page
        }

        //Searches for specific id
        $goal = Goal::findOrFail($id);

        //updates goal 
        $goal->fill($_POST);

        //updates images
        $goal = $this->handleUploadedFiles($goal);
        $goal = $this->handleDeleteFiles($goal);


        //Checks if goal was saved
        if (!$goal->save()) {
            Session::set('errors', ['Failed to save']); //notifies user about error
            Redirector::redirect("/goals/${id}/edit"); //refreshes page
        }
        Redirector::redirect('/admin/goals'); //sends user back to goal panel
    }




    public function create()
    {
        //Checks if user is permited to view this page
        AuthMiddleware::isAdminOrFail();

        //renders view
        View::render('goals/panel/create');
    }



    public function store()
    {
        //Checks if user is permited to view this page
        AuthMiddleware::isAdminOrFail();
        $validationErrors = $this->validateFormData();

        //If there is a validation error
        if (!empty($validationErrors)) {
            //Sends user an error and refreshes page
            Session::set('errors', $validationErrors);
            Redirector::redirect("/admin/goals/create");
        }

        $goal = new Goal();
        $goal->fill($_POST);
        $goal = $this->handleUploadedFiles($goal);
        $goal = $this->handleDeleteFiles($goal);


        if (!$goal->save()) {
            Session::set('errors', ['Failed to save']);
            Redirector::redirect("/admin/goals/create");
        }

        Redirector::redirect('/admin/goals'); //Sends user back to goals panel once goal has been added
    }
    public function delete(int $id)
    {
        AuthMiddleware::isAdminOrFail();
        $goal = Goal::findOrFail($id);


        View::render('helpers/confirmation', [
            'objectType' => 'Goal',
            'objectTitle' => $goal->name,
            'confirmUrl' => BASE_URL . '/admin/goals/' . $goal->id . '/delete/confirm',
            'abortUrl' => BASE_URL . '/admin/goals'
        ]);
    }


    public function deleteConfirm(int $id)
    {
        //Checks if user is permited to view this page
        AuthMiddleware::isAdminOrFail();

        $goal = Goal::findOrFail($id); //Searches for specific id
        $goal->delete(); //Softdeletes goal

        Session::set('success', ['The goal has been deleted.']); //Sucess message
        Redirector::redirect('/admin/goals'); //Sends user back to goals panel once completed
    }


    private function validateFormData(int $id = 0): array
    {
        //creates new validator
        $validator = new Validator();
        if (!empty($_POST)) {
            //validates fields
            $validator->letters($_POST['name'], label: 'Goal', required: true, max: 255);
            $validator->file($_FILES['imgs'], label: 'imgs', type: 'image');
        }

        return $validator->getErrors();
    }


    public function handleUploadedFiles(Goal $goal): ?Goal
    {
        //cretes array
        $files = AbstractFile::createFromUploadedFiles('imgs');


        //goes through all files
        foreach ($files as $file) {
            //saves images in a selected file
            $storagePath = $file->putToUploadsFolder();
            $goal->addImages([$storagePath]);
        }

        return $goal;
    }



    private function handleDeleteFiles(Goal $goal): Goal
    {
        //checks if the checkbox is checked
        if (isset($_POST['delete-images'])) {
            //... goes through all selected checkboxes
            foreach ($_POST['delete-images'] as $deleteImage) {

                //deletes selected images
                $goal->removeImages([$deleteImage]);
                AbstractFile::delete($deleteImage);
            }
        }

        return $goal;
    }
}
