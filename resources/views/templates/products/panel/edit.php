<div class="adminForm">
    <h1>Edit Product</h1>
    <div class="adminForm__path">
        <a class="adminForm__path__a" href="<?php echo BASE_URL . "/admin" ?>">Admin/</a>
        <a class="adminForm__path__a" href="<?php echo BASE_URL . "/admin/products" ?>">Products/</a>
        <p>Edit</p>
    </div>
    <form class="adminForm__form" action="<?php echo BASE_URL . "/admin/products/" . $product->id . "/edit/update" ?>" method="post" enctype="multipart/form-data">
        <div class="adminForm__form__wrapper"></div>
        <div class="adminForm__form__field">
            <label class="adminForm__form__field__label" for="name">Name</label>
            <input class="adminForm__form__field__input" type="text" name="name" id="name" value="<?php echo $product->name; ?>">
        </div>

        <div class="adminForm__form__field">
            <label class="adminForm__form__field__label" for="price">Price (€)</label>
            <input class="adminForm__form__field__input" type="text" name="price" id="price" value="<?php echo $product->price; ?>">
        </div>

        <div class="adminForm__form__field">
            <label class="adminForm__form__field__label" for="description">Description</label>
            <textarea class="adminForm__form__field__textarea" name="description" id="description" cols="30" rows="5"><?php echo $product->description; ?></textarea>
        </div>

        <div class="adminForm__form__field">
            <label class="adminForm__form__field__label" for="serving">Serving (grams)</label>
            <input class="adminForm__form__field__input" type="text" name="serving" id="serving" value="<?php echo $product->serving; ?>">
        </div>

        <div class="adminForm__form__field">
            <label class="adminForm__form__field__label" for="ingredients">Ingredients</label>
            <textarea class="adminForm__form__field__textarea" name="ingredients" id="ingredients" cols="30" rows="5"><?php echo $product->ingredients; ?></textarea>
        </div>

        <div class="adminForm__form__field">
            <label class="adminForm__form__field__label" for="weight">Weight (kg)</label>
            <input class="adminForm__form__field__input" type="text" name="weight" id="weight" value="<?php echo $product->weight; ?>">
        </div>



        <div class="adminForm__form__field adminForm__form__field--checkfield">
            <label class="adminForm__form__field__label--checklabel" for="is_featured">Add to featured section</label>
            <input type="checkbox" name="is_featured" id="is_featured" <?php echo $product->is_featured === 1 ? "checked" : ""; ?>>
        </div>

        <div class="adminForm__form__field adminForm__form__field--checkfield">
            <label class="adminForm__form__field__label--checklabel" for="is_bestseller">Is this item a bestseller?</label>

            <input type="checkbox" name="is_bestseller" id="is_bestseller" <?php echo $product->is_bestseller === 1 ? "checked" : ""; ?>>
        </div>

        <div class="adminForm__form__field adminForm__form__field--checkfield">
            <label class="adminForm__form__field__label--checklabel" for="is_sale">Is this item on sale?</label>
            <input type="checkbox" name="is_sale" id="is_sale" <?php echo $product->is_sale === 1 ? "checked" : ""; ?>>
        </div>

        <div class="adminForm__form__field">
            <label for="category_id">Select Category</label>
            <select class="adminForm__form__field__select" name="category_id" id="category_id">

                <?php foreach ($categories as $category) : ?>
                    <option <?php echo $category->id === $product->category_id ? "selected" : ""; ?> value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="adminForm__form__field">
            <label for="goal_id">Select a Goal</label>
            <select class="adminForm__form__field__select" name="goal_id" id="goal_id">


                <?php foreach ($goals as $goal) : ?>
                    <option <?php echo $goal->id === $product->goal_id ? "selected" : ""; ?> value="<?php echo $goal->id; ?>"><?php echo $goal->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="adminForm__form__field">
            <label for="merchant_id">Select a Merchant</label>
            <select class="adminForm__form__field__select" name="merchant_id" id="merchant_id">

                <?php foreach ($merchants as $merchant) : ?>
                    <option <?php echo $merchant->id === $product->merchant_id ? "selected" : ""; ?> value="<?php echo $merchant->id; ?>"><?php echo $merchant->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="adminForm__form__field">
            <label class="adminForm__form__field__label" for="units">Units</label>
            <input class="adminForm__form__field__input" type="text" name="units" id="units" value="<?php echo $product->units; ?>">
        </div>


        <div class="adminForm__form__field">
            <label class="adminForm__form__field__label" for="imgs">Upload Images</label>
            <input class="adminForm__form__field__file" type="file" class="form-control" id="imgs" name="imgs[]" multiple>
        </div>

        <div class="adminForm__form__imgs">
            <?php
            foreach ($product->getImages() as $image) : ?>
                <div class="adminForm__form__imgs__item">
                    <img src="<?php echo BASE_URL . $image; ?>" alt="<?php echo $product->name; ?>" class="adminForm__form__imgs__item__tn">

                    <div class="form-check">
                        <input type="checkbox" value="<?php echo $image; ?>" name="delete-images[]" id="delete-images[<?php echo $image; ?>]" class="form-check-input">
                        <label class="form-check-label" for="delete-images[<?php echo $image; ?>]">Delete?</label>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>




        <div class="adminForm__form__btns">
            <button class="btn btn--lime" type="submit">Update</button>
            <a class="btn btn--red" href="<?php echo BASE_URL . '/admin/products'; ?>">Cancel</a>
        </div>

    </form>
</div>