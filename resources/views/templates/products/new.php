<section class="cards">
    <!-- Headline (h3)-->
    <h1 class="text-dark">New Products</h1>
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
                    <img class="cards__container__item__bg" src="<?php echo BASE_URL . $product->getImages()[0]; ?>" alt="<?php echo $product->name; ?>">
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
                            <p><?php echo $product->price; ?>€</p>
                            <div class="cards__container__item__box__desc__info__btns">
                                <a class="cards__container__item__box__desc__info__btns__btn cards__container__item__box__desc__info__btns__btn--cart" href="#">Add to Cart</a>
                                <a class="cards__container__item__box__desc__info__btns__btn cards__container__item__box__desc__info__btns__btn--details" href="#">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>