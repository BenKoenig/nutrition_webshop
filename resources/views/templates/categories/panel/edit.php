<div class="adminForm">
    <h1>Edit Category</h1>
    <div class="adminForm__path">
        <a class="adminForm__path__a" href="<?php echo BASE_URL . "/admin" ?>">Admin/</a>
        <a class="adminForm__path__a" href="<?php echo BASE_URL . "/admin/categories" ?>">Categories/</a>
        <p>Edit</p>
    </div>
    <form class="adminForm__form" action="<?php echo BASE_URL . "/admin/categories/" . $categorie->id . "/edit/update" ?>" method="post" enctype="multipart/form-data">
        
        
        <div class="adminForm__form__field">
            <label class="adminForm__form__field__label" for="name">Category Name</label>
            <input class="adminForm__form__field__input" type="text" name="name" id="name" value="<?php echo $categorie->name; ?>">
        </div>

        <div class="adminForm__form__field adminForm__form__field--checkfield"> 
            <label class="adminForm__form__field__label--checklabel" for="is_popular">Add to popular section</label>
            <input type="checkbox" name="is_popular" id="is_popular" <?php e($categorie->is_popular == 0  || $categorie->is_popular == -1   ? "" : "checked") ?>>
        </div>
        <div class="adminForm__form__field">
            <label class="adminForm__form__field__label" for="imgs">Upload Images</label>
            <input class="adminForm__form__field__file" type="file" class="form-control" id="imgs" name="imgs[]" multiple>
        </div>





        <div class="adminForm__form__imgs">
            <?php
            /**
             * Hier gehen wir alle Bilder aus dem Raum durch und rendern ein Thumbnail und eine Checkbox zum Löschen der
             * Bilder.
             */
            foreach ($categorie->getImages() as $image) : ?>
                <div class="adminForm__form__imgs__item">
                    <img src="<?php echo BASE_URL . $image; ?>" alt="<?php echo $categorie->name; ?>" class="adminForm__form__imgs__item__tn">

                    <div class="form-check">
                        <input type="checkbox" value="<?php echo $image; ?>" name="delete-images[]" id="delete-images[<?php echo $image; ?>]" class="form-check-input">
                        <label class="form-check-label" for="delete-images[<?php echo $image; ?>]">Delete?</label>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="adminForm__form__btns">
            <button class="btn btn--lime" type="submit">Update</button>
            <a class="btn btn--red" href="<?php echo BASE_URL . '/admin/categories'; ?>">Cancel</a>
        </div>

    </form>
</div>