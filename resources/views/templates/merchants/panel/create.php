<div class="adminForm">
    <h1>Add Merchant</h1>
    <div class="adminForm__path">
        <a class="adminForm__path__a" href="<?php echo BASE_URL . "/admin" ?>">Admin/</a>
        <a class="adminForm__path__a" href="<?php echo BASE_URL . "/admin/merchants" ?>">Merchants/</a>
        <p>Create</p>
    </div>
    <form class="adminForm__form" action="<?php echo BASE_URL . "/admin/merchants/create/store" ?>" method="post" enctype="multipart/form-data">
        <div class="adminForm__form__field">
            <label class="adminForm__form__field__label" for="name">Merchant Name</label>
            <input class="adminForm__form__field__input" type="text" name="name" id="name" placeholder="Dunder Mifflin">
        </div>
        <div class="adminForm__form__field">
            <label class="adminForm__form__field__label" for="website">Website</label>
            <input class="adminForm__form__field__input" type="text" name="website" id="website" placeholder="www.dundermifflin.com">
        </div>
        <div class="adminForm__form__btns">
            <button class="adminForm__form__btns--create" type="submit">Create Merchant</button>
            <a class="adminForm__form__btns--cancel" href="<?php echo BASE_URL . '/admin/categories'; ?>">Cancel</a>
        </div>

    </form>
</div>