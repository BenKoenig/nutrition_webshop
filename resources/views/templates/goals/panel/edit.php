<div class="adminForm">
    <h1>Edit Goal</h1>
    <div class="adminForm__path">
        <a class="adminForm__path__a" href="<?php echo BASE_URL . "/admin" ?>">Admin/</a>
        <a class="adminForm__path__a" href="<?php echo BASE_URL . "/admin/goals" ?>">Goals/</a>
        <p>Edit</p>
    </div>
    <form class="adminForm__form" action="<?php echo BASE_URL . "/admin/goals/" . $goal->id . "/edit/update" ?>" method="post" enctype="multipart/form-data">
        
        
        <div class="adminForm__form__field">
            <label class="adminForm__form__field__label" for="name">Goal Name</label>
            <input class="adminForm__form__field__input" type="text" name="name" id="name" value="<?php echo $goal->name; ?>">
        </div>


        <div class="adminForm__form__field">
            <label class="adminForm__form__field__label" for="imgs">Upload Images</label>
            <input class="adminForm__form__field__file" type="file" class="form-control" id="imgs" name="imgs[]" multiple>
        </div>





        <div class="row">
            <?php
            /**
             * Hier gehen wir alle Bilder aus dem Raum durch und rendern ein Thumbnail und eine Checkbox zum Löschen der
             * Bilder.
             */
            foreach ($goal->getImages() as $image) : ?>
                <div class="col col-2">
                    <img src="<?php echo BASE_URL . $image; ?>" alt="<?php echo $goal->name; ?>" class="thumbnail">

                    <div class="form-check">
                        <input type="checkbox" value="<?php echo $image; ?>" name="delete-images[]" id="delete-images[<?php echo $image; ?>]" class="form-check-input">
                        <label class="form-check-label" for="delete-images[<?php echo $image; ?>]">Löschen?</label>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="adminForm__form__btns">
            <button class="adminForm__form__btns--create" type="submit">Update</button>
            <a class="adminForm__form__btns--cancel" href="<?php echo BASE_URL . '/admin/goals'; ?>">Cancel</a>
        </div>

    </form>
</div>