<div class="adminForm">
    <h1>Create Goal</h1>
    <div class="adminForm__path">
        <a class="adminForm__path__a" href="<?php echo BASE_URL . "/admin" ?>">Admin/</a>
        <a class="adminForm__path__a" href="<?php echo BASE_URL . "/admin/goals" ?>">Goals/</a>
        <p>Create</p>
    </div>
    <form class="adminForm__form" action="<?php echo BASE_URL . "/admin/goals/create/store" ?>" method="post" enctype="multipart/form-data">
        <div class="adminForm__form__field">
            <label class="adminForm__form__field__label" for="name">Goal</label>
            <input class="adminForm__form__field__input" type="text" name="name" id="name" placeholder="Dunder Mifflin">
        </div>
        <div class="adminForm__form__field">
            <label class="adminForm__form__field__label" for="imgs">Upload Images</label>
            <input class="adminForm__form__field__file" type="file" class="form-control" id="imgs" name="imgs[]" multiple>
        </div>
        <div class="adminForm__form__btns">
            <button class="adminForm__form__btns--create" type="submit">Create Goal</button>
            <a class="adminForm__form__btns--cancel" href="<?php echo BASE_URL . '/admin/goals'; ?>">Cancel</a>
        </div>

    </form>
</div>