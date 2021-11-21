<div class="adminForm">
    <h1>Create Flavor</h1>
    <div class="adminForm__path">
        <a class="adminForm__path__a" href="<?php echo BASE_URL . "/admin" ?>">Admin/</a>
        <a class="adminForm__path__a" href="<?php echo BASE_URL . "/admin/flavors" ?>">Flavors/</a>
        <p>Create</p>
    </div>
    <form class="adminForm__form" action="<?php echo BASE_URL . "/admin/flavors/create/store" ?>" method="post" enctype="multipart/form-data">
        <div class="adminForm__form__field">
            <label class="adminForm__form__field__label" for="flavor">Flavor</label>
            <input class="adminForm__form__field__input" type="text" name="flavor" id="flavor" placeholder="Strawberry Cheesecake">
        </div>
        <div class="adminForm__form__btns">
            <button class="adminForm__form__btns--create" type="submit">Create</button>
            <a class="adminForm__form__btns--cancel" href="<?php echo BASE_URL . '/admin/flavors'; ?>">Cancel</a>
        </div>

    </form>
</div>