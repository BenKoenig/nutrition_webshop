<div class="adminForm">
    <h1>Edit Merchant</h1>
    <div class="adminForm__path">
        <a class="adminForm__path__a" href="<?php echo BASE_URL . "/admin" ?>">Admin/</a>
        <a class="adminForm__path__a" href="<?php echo BASE_URL . "/admin/merchants" ?>">Merchants/</a>
        <p>Edit</p>
    </div>
    <form class="adminForm__form" action="<?php echo BASE_URL . "/admin/merchants/" . $merchant->id . "/edit/update" ?>" method="post">
        
        
        <div class="adminForm__form__field">    
            <label class="adminForm__form__field__label" for="name">Merchant Name</label>
            <input class="adminForm__form__field__input" type="text" name="name" id="name" value="<?php echo $merchant->name; ?>">
        </div>

        <div class="adminForm__form__field">
            <label class="adminForm__form__field__label" for="website">Website</label>
            <input class="adminForm__form__field__input" type="text" name="website" id="website" value="<?php echo $merchant->website; ?>">
        </div>

        <div class="adminForm__form__btns">
            <button class="btn btn--lime" type="submit">Update</button>
            <a class="btn btn--red" href="<?php echo BASE_URL . '/admin/merchants'; ?>">Cancel</a>
        </div>

    </form>
</div>