<div class="productDetail">

    <div class="productDetail__container">

        <div class="productDetail__container__item">
            <img class="productDetail__container__item__img" src="<?php echo BASE_URL . $product->getFirstImage(); ?>" alt="<?php echo $product->name; ?>"><!-- Displays image of product-->
        </div>
        <div class="productDetail__container__item">
            <!-- Displays name of product-->
            <h1><?php echo $product->name; ?></h1>

            <!-- Displays price of product-->
            <p class="productDetail__container__item--price">€ <?php echo $product->price; ?></p>

            <!-- Warns user about low stock -->
            <p class="productDetail__container__item--stock"><?php e($product->notifyStock()); ?></p>

            <!-- Displays the description of the product-->
            <p class="productDetail__container__item--description"><?php echo $product->description; ?></p>

            <!-- Displays weight of product-->
            <p>Weight: <?php echo $product->weight; ?> kg</p>

            <!-- Displays serving per drink/meal-->
            <p>Serving: <?php echo $product->serving; ?> g</p>

            <!-- Link to view the ingredients of the product-->
            <a href="#" class="productDetail__container__item--a">View Ingredients</a>

            <!-- ...when user clicks on link, it displays ingredients-->
            <p class="productDetail__container__item--moreInfo"><?php echo $product->ingredients; ?></p>

            <!-- Option for user to add the product to the cart-->
            <a class="btn btn--lime" href="<?php echo BASE_URL . "/products/$product->id/add-to-cart"; ?>">Add to Cart</a>

        </div>
    </div>
</div>