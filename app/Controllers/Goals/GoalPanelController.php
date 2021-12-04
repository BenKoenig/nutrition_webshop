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
        AuthMiddleware::isAdminOrFail();
        $goals = Goal::all('id', 'ASC');
        View::render('goals/panel/index', [
            'goals' => $goals
        ]);
    }




    public function edit(int $id)
    {
        AuthMiddleware::isAdminOrFail(); //checks if user is admin
        $goal = Goal::findOrFail($id); //searches specific id

        //renders content
        View::render('goals/panel/edit', [
            'goal' => $goal
        ]);
    }



    public function update(int $id)
    {
        AuthMiddleware::isAdminOrFail();

        $validationErrors = $this->validateFormData($id);

        if (!empty($validationErrors)) {
            Session::set('errors', $validationErrors); //notifies user about errors
            Redirector::redirect("/admin/goals/${id}/edit"); //refreshes page
        }

        $goal = Goal::findOrFail($id); //Searches for specific id

   

        $goal->fill($_POST); 

        $goal = $this->handleUploadedFiles($goal);


        $goal = $this->handleDeleteFiles($goal);


        //Checks if goal was saved
        if (!$goal->save()) {
            Session::set('errors', ['Speichern fehlgeschlagen.']); //notifies user about error
            Redirector::redirect("/goals/${id}/edit"); //refreshes page
        }
        Redirector::redirect('/admin/goals'); //sends user back to goal panel
    }




    public function create()
    {
        AuthMiddleware::isAdminOrFail();

        View::render('goals/panel/create');
    }



    public function store()
    {
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
            Session::set('errors', ['Speichern fehlgeschlagen.']);
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
        AuthMiddleware::isAdminOrFail();

        $goal = Goal::findOrFail($id); //Searches for specific id
        $goal->delete(); //Softdeletes goal

        Session::set('success', ['The goal has been deleted.']); //Sucess message
        Redirector::redirect('/admin/goals'); //Sends user back to goals panel once completed
    }


    private function validateFormData(int $id = 0): array
    {
        $validator = new Validator();
        if (!empty($_POST)) {
            /**
             * Daten validieren. Für genauere Informationen zu den Funktionen s. Core\Validator.
             *
             * Hier verwenden wir "named params", damit wir einzelne Funktionsparameter überspringen können.
             */
            $validator->letters($_POST['name'], label: 'Goal', required: true, max: 255);
            $validator->file($_FILES['imgs'], label: 'imgs', type: 'image');
            /**
             * @todo: implement Validate Array + Contents
             */
        }

        return $validator->getErrors();
    }


    public function handleUploadedFiles(Goal $goal): ?Goal
    {
        /**
         * Wir erstellen zunächst einen Array an Objekten, damit wir Logik, die zu einer Datei gehört, in diesen
         * Objekten kapseln können.
         */
        $files = AbstractFile::createFromUploadedFiles('imgs');

        /**
         * Nun gehen wir alle Dateien durch ...
         */
        foreach ($files as $file) {
            /**
             * ... speichern sie in den Uploads Ordner ...
             */
            $storagePath = $file->putToUploadsFolder();
            /**
             * ... und verknüpfen sie mit dem Raum.
             */
            $goal->addImages([$storagePath]);
        }
        /**
         * Nun geben wir den aktualisierten Raum wieder zurück.
         */
        return $goal;
    }


    /**
     * Löschen-Checkboxen der Bilder eines Raumes verarbeiten.
     *
     * @param Room $room
     *
     * @return Room
     */
    private function handleDeleteFiles(Goal $goal): Goal
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
                $goal->removeImages([$deleteImage]);
                /**
                 * ... und löschen die Datei aus dem Uploads-Ordner.
                 */
                AbstractFile::delete($deleteImage);
            }
        }

        return $goal;
    }


}
