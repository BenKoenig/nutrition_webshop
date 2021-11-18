<div class="create">
    <h1>Edit Category</h1>
    <div class="create__path">
        <a class="create__path__a" href="<?php echo BASE_URL . "/admin" ?>">Admin/</a>
        <a class="create__path__a" href="<?php echo BASE_URL . "/admin/categories" ?>">Categoies/</a>
        <p>Edit</p>
    </div>
    <form class="create__form" action="<?php echo BASE_URL . "/admin/categories/" . $categorie->id . "/edit/update" ?>" method="post" enctype="multipart/form-data" <div class="create__form__field">
        <div>
            <label class="create__form__field__label" for="name">Category Name</label>
            <input class="create__form__field__input" type="text" name="name" id="name" value="<?php echo $categorie->name; ?>">
        </div>


        <div class="row">
            <div class="col">
                <label for="imgs">Images</label>
                <input type="file" class="form-control" id="imgs" name="imgs[]" multiple>
            </div>
        </div>
        <div class="create__form__field create__form__field--checkfield">
            <label class="create__form__field__label" for="is_popular">Add to popular section</label>
            <input type="checkbox" name="is_popular" id="is_popular" <?php echo $categorie->is_popular ? "checked" : ""; ?>>
        </div>

        <div class="create__form__btns">
            <button class="create__form__btns--create" type="submit">Update Category</button>
            <a class="create__form__btns--cancel" href="<?php echo BASE_URL . '/admin/categories'; ?>">Cancel</a>
        </div>

    </form>
</div>