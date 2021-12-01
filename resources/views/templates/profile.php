<div class="profile">
    <div class="profile__header">
        <h1>Hello, <?php echo $user->username; ?></h1>
    </div>

    <div class="profile__wrapper">
        <div class="profile__wrapper__orders">
            <h3>Orders</h3>
            <p class="p--translate">All of your recent orders.</p>
            <div class="profile__wrapper__orders__container">
                <?php foreach ($user->orders(true) as $order) : ?>
                    <div class="profile__wrapper__orders__container__item">

                        <img class="profile__wrapper__orders__container__item--img" src="<?php echo BASE_URL . $order->item()->getImages()[0]; ?>" alt="<?php echo $order->item()->name; ?>">
                        <a href="<?php echo BASE_URL . '/product/' . $order->item()->id; ?> " class="profile__wrapper__orders__container__item--a"><?php echo $order->item()->name; ?> (<?php echo $order->units; ?>)</a>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <form class="profile__wrapper__form" action="">
            <h3>Edit Profile</h3>
            <p class="p--translate">Your profile information.</p>
            <div class="profile__wrapper__form__container">
                <div class="profile__wrapper__form__container__field">
                    <label for="email" class="sr-only">Email</label>
                    <input class="profile__wrapper__form__container__field__input"type="email" name="email" id="email" placeholder="Your Email">
                </div>
                <div class="profile__wrapper__form__container__field">
                    <label for="password" class="sr-only">>Password</label>
                    <input class="profile__wrapper__form__container__field__input" type="password" name="password" id="password" placeholder="New Password">

                    <label for="password-repeat" class="sr-only">>Repeat Password</label>
                    <input class="profile__wrapper__form__container__field__input" type="password" name="password-repeat" id="password-repeat" placeholder="Repeat Password">
                </div>
    
                <button type="submit" class="btn btn--lime">Submit</button>
            </div>

        </form>
    </div>






</div>