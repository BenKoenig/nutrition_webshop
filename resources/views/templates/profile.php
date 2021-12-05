<div class="profile">
    <div class="profile__header">
        <!-- Greets user by name -->
        <h1>Hello, <?php e(upperLowerCase($user->firstname)); ?></h1>
    </div>

    <div class="profile__wrapper">
        <div class="profile__wrapper__orders">
            <h3>Orders</h3>
            <p class="p--translate">All of your recent orders.</p>
            <div class="profile__wrapper__orders__container">
                <!-- Goes through all orders -->
                <?php foreach ($user->orders(true) as $order) : ?>
                    <div class="profile__wrapper__orders__container__item">
                        <!-- displays order image -->
                        <img class="profile__wrapper__orders__container__item--img" src="<?php url_e($order->item()->getFirstImage()); ?>" alt="<?php echo $order->item()->name; ?>">
                        
                        <!-- link to get to product page -->
                        <a href="<?php echo BASE_URL . '/product/' . $order->item()->id; ?> " class="profile__wrapper__orders__container__item--a"><?php echo $order->item()->name; ?> (<?php echo $order->units; ?>)</a>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- update profile -->
        <form class="profile__wrapper__form" action="<?php url_e("profile/update"); ?>" method="post">
            <h3>Edit Profile</h3>
            <p class="p--translate">Your profile information.</p>
            <div class="profile__wrapper__form__container">
                <div class="profile__wrapper__form__container__flex">
                    <div class="profile__wrapper__form__container__flex__field">
                        <label for="email" class="profile__wrapper__form__container__flex__field--label">Email</label>
                        <input class=" profile__wrapper__form__container__flex__field__input" type="email" name="email" id="email" value="<?php e($user->email); ?>">
                    </div>
                    <div class="profile__wrapper__form__container__flex__field">
                        <label for="username" class="profile__wrapper__form__container__flex__field--label">Username</label>
                        <input class=" profile__wrapper__form__container__flex__field__input" type="text" name="username" id="username" value="<?php e($user->username); ?>">
                    </div>
                </div>

                <div class="profile__wrapper__form__container__flex">
                    <div class="profile__wrapper__form__container__flex__field">
                        <label for="password" class="profile__wrapper__form__container__flex__field--label">Password</label>
                        <input class="profile__wrapper__form__container__flex__field__input" type="password" name="password" id="password" value="">
                    </div>
                    <div class="profile__wrapper__form__container__flex__field">
                        <label for="password_repeat" class="profile__wrapper__form__container__flex__field--label">Repeat Password</label>
                        <input class="profile__wrapper__form__container__flex__field__input" type="password" name="password_repeat" id="password-repeat" value="">
                    </div>
                </div>
                <div class="profile__wrapper__form__container__flex">
                    <div class="profile__wrapper__form__container__flex__field">
                        <label for="firstname" class="profile__wrapper__form__container__flex__field--label">First Name</label>
                        <input class="profile__wrapper__form__container__flex__field__input" type="text" name="firstname" id="firstname" value="<?php e($user->firstname); ?>">
                    </div>
                    <div class="profile__wrapper__form__container__field">
                        <label for="lastname" class="profile__wrapper__form__container__flex__field--label">Last Name</label>
                        <input class="profile__wrapper__form__container__flex__field__input" type="text" name="lastname" id="lastname" value="<?php e($user->lastname); ?>">
                    </div>
                </div>
                <div class="profile__wrapper__form__container__flex">
                    <div class="profile__wrapper__form__container__flex__field">
                        <label for="adress_1" class="profile__wrapper__form__container__flex__field--label">Adress 1</label>
                        <input class="profile__wrapper__form__container__flex__field__input" type="text" name="adress_1" id="adress_1" value="<?php e($user->adress_1); ?>">
                    </div>
                    <div class="profile__wrapper__form__container__field">
                        <label for="adress_2" class="profile__wrapper__form__container__flex__field--label">Adress 2</label>
                        <input class="profile__wrapper__form__container__flex__field__input" type="text" name="adress_2" id="adress_2" value="<?php e($user->adress_2); ?>">
                    </div>
                </div>
                <div class="profile__wrapper__form__container__flex">
                    <div class="profile__wrapper__form__container__flex__field">
                        <label for="postal_code" class="profile__wrapper__form__container__flex__field--label">Postal Code</label>
                        <input class="profile__wrapper__form__container__flex__field__input" type="text" name="postal_code" id="postal_code" value="<?php e($user->postal_code); ?>">
                    </div>

                </div>
                <div class="profile__wrapper__form__container__flex">
                    <div class="profile__wrapper__form__container__field">
                        <label for="city" class="profile__wrapper__form__container__flex__field--label">City</label>
                        <input class="profile__wrapper__form__container__flex__field__input" type="text" name="city" id="city" value="<?php e($user->city); ?>">
                    </div>
                </div>
                <div class="profile__wrapper__form__container__flex">
                    <div class="profile__wrapper__form__container__flex__field">
                        <label for="country" class="profile__wrapper__form__container__flex__field--label">Country</label>
                        <input class="profile__wrapper__form__container__flex__field__input" type="text" name="country" id="country" value="<?php e($user->country); ?>">
                    </div>
                </div>

                <!-- Updates profile information -->
                <button type="submit" class="btn btn--lime">Submit</button>
            </div>

        </form>
    </div>






</div>