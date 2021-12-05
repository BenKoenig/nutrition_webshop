<div class="adminForm">
    <h1>Create Product</h1>
    <div class="adminForm__path">
        <a class="adminForm__path__a" href="<?php echo BASE_URL . "/admin" ?>">Admin/</a>
        <a class="adminForm__path__a" href="<?php echo BASE_URL . "/admin/products" ?>">Products/</a>
        <p>Create</p>
    </div>
    <form class="adminForm__form" action="<?php echo BASE_URL . "/admin/products/create/store" ?>" method="post" enctype="multipart/form-data">
        <div class="adminForm__form__field">
            <label class="adminForm__form__field__label" for="name">Name</label>
            <input class="adminForm__form__field__input" type="text" name="name" id="name" placeholder="Protein Bar">
        </div>

        <div class="adminForm__form__field">
            <label class="adminForm__form__field__label" for="price">Price (€)</label>
            <input class="adminForm__form__field__input" type="text" name="price" id="price" placeholder="9.99">
        </div>

        <div class="adminForm__form__field">
            <label class="adminForm__form__field__label" for="description">Description</label>
            <textarea class="adminForm__form__field__textarea" name="description" id="description" cols="30" rows="5" placeholder="Lorem Ipsum Dolar"></textarea>
        </div>

        <div class="adminForm__form__field">
            <label class="adminForm__form__field__label" for="serving">Serving (grams)</label>
            <input class="adminForm__form__field__input" type="text" name="serving" id="serving" placeholder="30">
        </div>

        <div class="adminForm__form__field">
            <label class="adminForm__form__field__label" for="ingredients">Ingredients</label>
            <textarea class="adminForm__form__field__textarea" name="description" id="description" cols="30" rows="5" placeholder="Rice protein concentrate, soy protein, pumpkin seed protein..."></textarea>
        </div>

        <div class="adminForm__form__field">
            <label class="adminForm__form__field__label" for="weight">Weight (kg)</label>
            <input class="adminForm__form__field__input" type="text" name="weight" id="weight" placeholder="2.2">
        </div>

        <div class="adminForm__form__field adminForm__form__field--checkfield">
            <input type="checkbox" name="is_featured" id="is_featured" >
            <label class="adminForm__form__field__label adminForm__form__field__label--checklabel" for="is_featured">Add to featured section</label>

        </div>

        <div class="adminForm__form__field adminForm__form__field--checkfield">
            <input type="checkbox" name="is_bestseller" id="is_bestseller" >
            <label class="adminForm__form__field__label adminForm__form__field__label--checklabel"for="is_bestseller">Is this item a bestseller?</label>

        </div>


        <div class="adminForm__form__field adminForm__form__field--checkfield">
            <input type="checkbox" name="is_sale" id="is_sale">
            <label class="adminForm__form__field__label adminForm__form__field__label--checklabel" for="is_sale">Is this item on sale?</label>
        </div>

        <div class="adminForm__form__field">
            <label class="adminForm__form__field__label" for="units">Units</label>
            <input class="adminForm__form__field__input" type="text" name="units" id="units" placeholder="50">
        </div>


        <div class="adminForm__form__field">
            <label for="category_id">Select Category</label>
            <select class="adminForm__form__field__select" name="category_id" id="category_id">
                <option value="_default" disabled selected>Categories</option>

                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="adminForm__form__field">
            <label for="goal_id">Select a Goal</label>
            <select class="adminForm__form__field__select" name="goal_id" id="goal_id">
                <option value="_default" disabled selected>Goals</option>

                <?php foreach ($goals as $goal) : ?>
                    <option value="<?php echo $goal->id; ?>"><?php echo $goal->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="adminForm__form__field">
            <label for="merchant_id">Select a Merchant</label>
            <select class="adminForm__form__field__select" name="merchant_id" id="merchant_id">
                <option value="_default" disabled selected>Merchant</option>

                <?php foreach ($merchants as $merchant) : ?>
                    <option value="<?php echo $merchant->id; ?>"><?php echo $merchant->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>




        <div class="adminForm__form__field">
            <label class="adminForm__form__field__label" for="imgs">Upload Images</label>
            <input class="adminForm__form__field__file" type="file" class="form-control" id="imgs" name="imgs[]" multiple>
        </div>
        <div class="adminForm__form__btns">
            <button class="btn btn--lime" type="submit">Create Product</button>
            <a class="btn btn--red" href="<?php echo BASE_URL . '/admin/categories'; ?>">Cancel</a>
        </div>

    </form>
</div>