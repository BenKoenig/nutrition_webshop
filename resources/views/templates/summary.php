<div class="summary">
    <h1>Summary</h1>
    <div class="summary__container">
        <form method="post" action="<?php url_e("checkout/summary/update"); ?>" class="summary__container__item">
            <div class="summary__container__item__field">
                <label for="firstname">First Name</label>
                <input type="text" class="summary__container__item__field__input" name="firstname" id="firstname" value="<?php echo $user->firstname; ?>">
            </div>
            <div class="summary__container__item__field">
                <label for="lastname">Last Name</label>
                <input type="text" class="summary__container__item__field__input" name="lastname" id="lastname" value="<?php echo $user->lastname; ?>">
            </div>
            <div class="summary__container__item__field">
                <label for="adress_1">Adress 1</label>
                <input type="text" class="summary__container__item__field__input" name="adress_1" id="adress_1" value="<?php echo $user->adress_1; ?>">
            </div>

            <div class="summary__container__item__field">
                <label for="adress_2">Adress 2</label>
                <input type="text" class="summary__container__item__field__input" name="adress_2" id="adress_2" value="<?php echo $user->adress_2; ?>">
            </div>

            <div class="summary__container__item__field">
                <label for="postal_code">Postal Code</label>
                <input type="text" class="summary__container__item__field__input" name="postal_code" id="postal_code" value="<?php echo $user->postal_code; ?>">
            </div>
            <div class="summary__container__item__field">
                <label for="city">City</label>
                <input type="text" class="summary__container__item__field__input" name="city" id="city" value="<?php echo $user->city; ?>">
            </div>
            <div class="summary__container__item__field">
                <label for="country">Country</label>
                <input type="text" class="summary__container__item__field__input" name="country" id="country" value="<?php echo $user->city; ?>">
            </div>

            
            <button class="btn btn--aqua" type="submit">Update Profile</button>
        </form>


        <div class="summary__container__item summary__container__item--orders">
            <?php foreach ($cartContent as $product) : ?>
                <div class="summary__container__item__wrapper">
                    <h5> <?php echo $product->name; ?> (<?php echo $product->count; ?>x)</h5>
                    <p>
                        <?php echo $product->description; ?>
                    </p>


                </div>
            <?php endforeach; ?>

            <?php if (\App\Models\User::isLoggedIn()) : ?>
                <div class="summary__container__btns">
                    <a href="<?php echo BASE_URL; ?>/checkout/finish" class="btn btn--lime">Complete</a>
                    <a href="<?php echo BASE_URL; ?>/cart" class="btn btn--red">Cancel</a>
                </div>

            <?php endif; ?>

        </div>
    </div>



</div>