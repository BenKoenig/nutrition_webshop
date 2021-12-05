<section class="cards">
    <!-- Headline (h3)-->
    <h2 class="text-dark text-center">New Products</h2>
    <div class="cards__container cards__container--md">

        <!-- Loop for every featured product -->
        <?php foreach ($products as $product) : ?>
            <!-- Product Item -->
            <div class="cards__container__item">
                <div>
                    <!-- 
                    Image 
                    src: PHP code that contains the image path from the database
                    alt: PHP code that contains the name of the image from the database
                    -->
                    <div class="cards__container__item__bgColor"></div>
                    <img class="cards__container__item__bg" src="<?php echo BASE_URL . $product->getFirstImage(); ?>" alt="<?php echo $product->name; ?>">
                </div>
                <div class="cards__container__item__box">
                    <div class="cards__container__item__box__desc">
                        <div class="cards__container__item__box__desc__info">
                            <!-- 
                            The headline (h4) contains the goal name from the database
                            -->
                            <h4><?php echo $product->name; ?></h4>

                            <!-- 
                            This text contains the price amount from the database
                            -->
                            <p><?php echo $product->price; ?>€ | <?php echo $product->weight; ?> kg</p>
                            <div class="cards__container__item__box__desc__info__btns">
                                <a class="btn btn--lime" href="<?php url_e("products/$product->id/add-to-cart"); ?>">Add to Cart</a>
                                <a class="btn btn--gray" href="<?php url_e("product/$product->id"); ?>">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>