<div class="productDetail">
    <h1><?php echo $product->name; ?></h1>
    <div class="productDetail__container">
        <div class="productDetail__container__item">
            <img class="productDetail__container__item__img" src="<?php echo BASE_URL . $product->getImages()[0]; ?>" alt="<?php echo $product->name; ?>">
        </div>
        <div class="productDetail__container__item">

            <p class="productDetail__container__item--price">
                € <?php echo $product->price; ?>
            </p>
            <p class="productDetail__container__item--description">
                <?php echo $product->description; ?>
            </p>
            <!-- <p>
                Brand: <?php echo $merchant[0]->name; ?>
            </p> -->
            <p>
                Weight: <?php echo $product->weight; ?> g
            </p>
            <p>
                Serving: <?php echo $product->serving; ?> g
            </p>

            <a href="#" class="productDetail__container__item--a">View Ingredients</a>
            <p class="productDetail__container__item--moreInfo">
                <?php echo $product->ingredients; ?>
            </p>
            <a class="btn btn--lime" href="<?php echo BASE_URL . "/products/$product->id/add-to-cart"; ?>">Add to Cart</a>

        </div>
    </div>
</div>