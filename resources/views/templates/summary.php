<div class="summary">
    <h1>Summary</h1>
    <div class="summary__container">
        <div class="summary__container__item">
            <h4>First Name</h4>
            <p><?php echo $user->firstname; ?></p>
            <h4>Last Name</h4>
            <p><?php echo $user->lastname; ?></p>
            <h4>Adress 1</h4>
            <p><?php echo $user->adress_1; ?></p>
            <h4>Adress 2</h4>
            <p><?php echo $user->adress_2; ?></p>
            <h4>Postal Code</h4>
            <p><?php echo $user->postal_code; ?></p>
            <h4>City</h4>
            <p><?php echo $user->city; ?></p>
            <h4>Country</h4>
            <p><?php echo $user->country; ?></p>
        </div>
        <div class="summary__container__item">
            <h4>Username</h4>
            <p><?php echo $user->username; ?></p>
            <h4>Email</h4>
            <p><?php echo $user->email; ?></p>
        </div>

        <div class="summary__container__item">
            <h4>Order</h4>
            <?php foreach ($cartContent as $product) : ?>
                <div class="summary__container__item__wrapper">
                    <h5>Product</h5>
                    <p>
                        <?php echo $product->name; ?>
                    </p>

                    <h5 class="summary__container__item__wrapper--max">Description</h5>
                    <p>
                        <?php echo $product->description; ?>
                    </p>


                    <h5>Amount</h5>


                    <p>
                        <?php echo $product->count; ?>
                    </p>

                </div>
            <?php endforeach; ?>

        </div>
    </div>

    <?php if (\App\Models\User::isLoggedIn()) : ?>
        <a href="<?php echo BASE_URL; ?>/checkout/finish" class="btn btn--lime">Complete</a>
        <a href="<?php echo BASE_URL; ?>/cart" class="btn btn--red">Cancel</a>
    <?php endif; ?>


</div>