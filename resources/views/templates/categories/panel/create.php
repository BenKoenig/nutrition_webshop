<div class="adminForm">
    <h1>Create Category</h1>
    <div class="adminForm__path">
        <a class="adminForm__path__a" href="<?php echo BASE_URL . "/admin" ?>">Admin/</a>
        <a class="adminForm__path__a" href="<?php echo BASE_URL . "/admin/categories" ?>">Categoies/</a>
        <p>Create</p>
    </div>
    <form class="adminForm__form" action="<?php echo BASE_URL . "/admin/categories/create/store" ?>" method="post">
        <div class="adminForm__form__field">
            <label class="adminForm__form__field__label" for="name">Category Name</label>
            <input class="adminForm__form__field__input" type="text" name="name" id="name" placeholder="Protein Shakes">
        </div>

        <div class="adminForm__form__field adminForm__form__field--checkfield">
            <label class="adminForm__form__field__label" for="is_popular">Add to popular section</label>
            <input type="checkbox" name="is_popular" id="is_popular">
        </div>
        <div class="adminForm__form__btns">
            <button class="adminForm__form__btns--create" type="submit">Create Category</button>
            <a class="adminForm__form__btns--cancel" href="<?php echo BASE_URL . '/admin/categories'; ?>">Cancel</a>
        </div>

    </form>
</div>