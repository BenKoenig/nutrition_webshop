<div class="cart">


    <!-- 
        Checks if the cart is empty and displays a message, 
        otherwise shows all of the items in the cart
    -->
    <?php if (count($products) === 0) : ?>

        <h1>Your cart is empty.</h1>

    <?php else : ?>
        <div class="cart__container">
            <div class="cart__container__item">
                <h2>Cart</h2>
                <!-- Goes through all of the products in the cart -->
                <?php foreach ($products as $product) : ?>
                    <div class="cart__container__item__product">
                        <img class="cart__container__item__product__img" src="<?php echo BASE_URL . $product->getImages()[0]; ?>" alt="">
                        <div class="cart__container__item__product__desc">
                            <!-- Product Name -->
                            <h4><?php echo $product->name; ?></h4>
                            <div class="cart__container__item__product__desc__flex">

                                <!-- Amount of that product in the cart -->
                                <p><?php echo $product->count; ?> Item<?php echo $product->count > 1 ? 's' : ''; ?></p>

                                <!-- Price of the item(s) -->
                                <p>€ <?php echo $product->price * $product->count; ?></p>
                            </div>

                            <!-- Link to remove the product from the cart -->
                            <a class="btn btn--red" href="<?php echo BASE_URL . "/products/$product->id/remove-all-from-cart"; ?>">Remove</a>

                            <div class="cart__container__item__product__desc__count">
                                <!-- Link to add another item to the cart -->
                                <a href="<?php echo BASE_URL . "/products/$product->id/add-to-cart"; ?>">+</a>

                                <!-- Link to remove an item from the cart -->

                                <a href="<?php echo BASE_URL . "/products/$product->id/remove-from-cart"; ?>">-</a>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <div class="cart__container__item">
                <h2>Total</h2>
                <div class="cart__container__item__costs">

                    <!-- Goes through all of the products -->
                    <?php foreach ($products as $product) : ?>
                        <div class="cart__container__item__costs__flex">
                            <!-- Product name -->
                            <p><?php echo $product->name; ?></p>
                            <!-- Product price -->
                            <p>€ <?php echo $product->price * $product->count; ?></p>
                        </div>
                    <?php endforeach; ?>
                    <div class="cart__container__item__costs__divider"></div>
                    <div class="cart__container__item__costs__flex">
                        <!-- calculates subtotal -->
                        <p>Subtotal</p>
                        <p>
                            <?php $subTotal = 0; ?>
                            <?php foreach ($products as $product)
                                $subTotal += $product->price * $product->count;
                            ?>
                            € <?php echo $subTotal; ?>
                        </p>
                    </div>
                    <!---
                    Calculates delivery costs
                    If the total costs are under 100€,
                    a delivery fee of 5 € gets added
                    -->
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
                        <!-- Calculates total cost -->
                        <p>Total Cost</p>
                        <p>
                            €
                            <?php
                            $totalCost = $subTotal + $deliveryCost;
                            echo $totalCost;
                            ?>
                        </p>
                    </div>
                    <!-- Checkout link -->
                    <a class="btn btn--lime" href="<?php echo BASE_URL . '/checkout/summary'; ?>">Checkout</a>
                </div>
            </div>
        </div>
    <?php endif; ?>



</div>