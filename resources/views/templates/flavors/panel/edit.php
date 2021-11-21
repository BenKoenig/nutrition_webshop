<div class="adminForm">
    <h1>Edit Flavor</h1>
    <div class="adminForm__path">
        <a class="adminForm__path__a" href="<?php echo BASE_URL . "/admin" ?>">Admin/</a>
        <a class="adminForm__path__a" href="<?php echo BASE_URL . "/admin/flavors" ?>">Flavors/</a>
        <p>Edit</p>
    </div>
    <form class="adminForm__form" action="<?php echo BASE_URL . "/admin/flavors/" . $flavor->id . "/edit/update" ?>" method="post">

        <div class="adminForm__form__field">
            <label class="adminForm__form__field__label" for="flavor">Flavor</label>
            <input class="adminForm__form__field__input" type="text" name="flavor" id="flavor" value="<?php echo $flavor->flavor; ?>">
        </div>




        <div class="adminForm__form__btns">
            <button class="adminForm__form__btns--create" type="submit">Update</button>
            <a class="adminForm__form__btns--cancel" href="<?php echo BASE_URL . '/admin/flavors'; ?>">Cancel</a>
        </div>

    </form>
</div>