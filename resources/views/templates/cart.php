<div class="cart">
    <?php if (count($products) === 0): ?>
    
    
    <h2>Your cart is empty.</h2>
    
    

    <?php else: ?>
        <div class="cart__container">
        <div class="cart__container__item">
            <h2>Cart</h2>
            <?php foreach ($products as $product) : ?>
                <div class="cart__container__item__product">
                    <img class="cart__container__item__product__img" src="<?php echo BASE_URL . $product->getImages()[0]; ?>" alt="">
                    <div class="cart__container__item__product__desc">
                        <h4><?php echo $product->name; ?></h4>
                        <div class="cart__container__item__product__desc__flex">
                            <p>1 Item</p>
                            <p>€ <?php echo $product->price; ?></p>
                        </div>
                        <a class="btn btn--red" href="<?php echo BASE_URL . "/products/$product->id/remove-from-cart"; ?>">Remove</a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <div class="cart__container__item">
            <h2>Total</h2>
            <div class="cart__container__item__costs">

                <?php foreach ($products as $product) : ?>
                    <div class="cart__container__item__costs__flex">
                        <p><?php echo $product->name; ?></p>
                        <p>€ <?php echo $product->price; ?></p>
                    </div>
                <?php endforeach; ?>
                <div class="cart__container__item__costs__divider"></div>
                <div class="cart__container__item__costs__flex">
                    <p>Subtotal</p>
                    <p>
                        <?php $subTotal = 0; ?>
                        <?php foreach ($products as $product)
                            $subTotal += $product->price;
                        ?>
                        € <?php echo $subTotal; ?>
                    </p>
                </div>
                <div class="cart__container__item__costs__flex">
                    <p>Delivery</p>
                    <p>
                        <?php
                        $deliveryCost = 0;
                        if ($subTotal < 100) {
                            $deliveryCost = 5;
                        }; ?>
                        € <?php echo $deliveryCost; ?>
                    </p>

                </div>
                <div class="cart__container__item__costs__divider"></div>
                <div class="cart__container__item__costs__flex">
                    <p>Total Cost</p>
                    <p>
                        €
                        <?php
                        $totalCost = $subTotal + $deliveryCost;
                        echo $totalCost;
                        ?>
                    </p>
                </div>
                <a class="btn btn--lime"href="<?php echo BASE_URL . '/checkout/summary'; ?>">Checkout</a>
            </div>
        </div>
    </div>
    <?php endif; ?> 



</div>