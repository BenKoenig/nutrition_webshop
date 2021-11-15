<div class="create">
    <h2>Create Category</h2>
    <form class="create__form" action="<?php echo BASE_URL . "/admin/categories/create/store" ?>" method="post">
        <div class="create__form__field">
            <label for="name">Category Name</label>
            <input class="create__form__field__input" type="text" name="name" id="name" placeholder="Protein Shakes">
        </div>
        <div class="create__form__field">
            <label for="img_url">Image Path</label>
            <input class="create__form__field__input"type="text" name="img_url" id="img_url" placeholder="https://link/example/image.png">
        </div>
        <div class="create__form__field create__form__field--checkfield">
            <label for="is_popular">Add to popular section</label>
            <input type="checkbox" name="is_popular" id="is_popular">
        </div>
        <div class="create__form__btns">
            <button class="create__form__btns--create" type="submit">Create Category</button>
            <a class="create__form__btns--cancel" href="<?php echo BASE_URL . '/admin/categories'; ?>">Cancel</a>
        </div>

    </form>
</div>