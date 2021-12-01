<div class="profile">
    <div class="profile__header">
        <h1>Hello, <?php echo $user->username; ?></h1>
    </div>

    <div class="profile__orders">
        <h3>Orders</h3>
        <div class="profile__orders__container">
            <?php foreach ($user->orders(true) as $order) : ?>
                <div class="profile__orders__container__item">

                    <img class="profile__orders__container__item--img" src="<?php echo BASE_URL . $order->item()->getImages()[0]; ?>" alt="<?php echo $order->item()->name; ?>">
                    <p class="profile__orders__container__item--p"><?php echo $order->item()->name; ?> (<?php echo $order->units; ?>)</p>

                </div>
            <?php endforeach; ?>

        </div>
    </div>





</div>