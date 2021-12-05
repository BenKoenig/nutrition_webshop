<div class="productDetail">
    <div class="productDetail__container">
        <div class="productDetail__container__imgs">

            <!-- list of all images next to each other -->
            <div class="productDetail__container__imgs__list">

                <!-- goes through all of the imnages and displays them -->
                <?php foreach ($product->getImages() as $image) : ?>

                    <img class="productDetail__container__imgs__list__img" src="<?php echo BASE_URL . $image ?>" alt="<?php echo $product->name; ?>">

                <?php endforeach; ?>
            </div>
            <?php if (count($product->getImages()) > 1) : ?>
                <!-- Button to view next image -->
                <a class="productDetail__container__imgs--next btn btn--gray" href="#next-image">Next</a>

                <!-- Button to view previous image -->
                <a class="productDetail__container__imgs--back btn btn--gray" href="#previous-image">Back</a>
            <?php endif; ?>
            <div class="productDetail__container__imgs--bgColor"></div>
        </div>
        <div class="productDetail__container__item">
            <!-- Displays name of product-->
            <h1><?php echo $product->name; ?></h1>

            <!-- Displays price of product-->
            <p class="productDetail__container__item--price">€ <?php echo $product->price; ?></p>

            <!-- Warns user about low stock -->
            <p class="productDetail__container__item--stock"><?php e($product->notifyStock()); ?></p>
            
            <div class="line"></div>
            <!-- Displays the description of the product-->
            <p class="productDetail__container__item--description"><?php echo $product->description; ?></p>
            <div class="line"></div>

            <!-- Displays weight of product & serving per drink/meal-->
            <p>Weight: <?php echo $product->weight; ?> kg | Serving: <?php echo $product->serving; ?> g</p>

            <!-- Link to view the ingredients of the product-->
            <a href="#" class="productDetail__container__item--a">View Ingredients</a>

            <!-- ...when user clicks on link, it displays ingredients-->
            <p class="productDetail__container__item--moreInfo"><?php echo $product->ingredients; ?></p>

            <!-- Option for user to add the product to the cart-->
            <a class="btn btn--lime" href="<?php echo BASE_URL . "/products/$product->id/add-to-cart"; ?>">Add to Cart</a>

        </div>
    </div>
</div>

<script src="<?php echo BASE_URL; ?>/js/slider-min.js"></script>
<script src="<?php echo BASE_URL; ?>/js/ingredients-min.js"></script>