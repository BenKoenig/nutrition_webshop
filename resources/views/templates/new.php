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
                    <img class="cards__container__item__bg" src="<?php echo $product->img_path; ?>" alt="<?php echo $product->name; ?>">
                </div>
                <div class="cards__container__item__box">
                    <div class="cards__container__item__box__desc">
                        <div class="cards__container__item__box__desc__info">
                            <!-- 
                            The headline (h4) contains the goal name from the database
                            -->
                            <h4><?php echo $product->name; ?></h4>
                            <div class="cards__container__item__box__desc__info__ratings">
                                <svg class="cards__container__item__box__desc__info__ratings__star cards__container__item__box__desc__info__ratings__star--green" xml:space="preserve" viewBox="0 0 510 510">
                                    <path d="m255 402.212 157.59 95.038-41.693-179.239L510 197.472l-183.37-15.734L255 12.75l-71.629 168.988L0 197.472l139.103 120.539L97.41 497.25z" />
                                </svg>
                                <svg class="cards__container__item__box__desc__info__ratings__star cards__container__item__box__desc__info__ratings__star--green" xml:space="preserve" viewBox="0 0 510 510">
                                    <path d="m255 402.212 157.59 95.038-41.693-179.239L510 197.472l-183.37-15.734L255 12.75l-71.629 168.988L0 197.472l139.103 120.539L97.41 497.25z" />
                                </svg>
                                <svg class="cards__container__item__box__desc__info__ratings__star cards__container__item__box__desc__info__ratings__star--green" xml:space="preserve" viewBox="0 0 510 510">
                                    <path d="m255 402.212 157.59 95.038-41.693-179.239L510 197.472l-183.37-15.734L255 12.75l-71.629 168.988L0 197.472l139.103 120.539L97.41 497.25z" />
                                </svg>
                                <svg class="cards__container__item__box__desc__info__ratings__star cards__container__item__box__desc__info__ratings__star--green" xml:space="preserve" viewBox="0 0 510 510">
                                    <path d="m255 402.212 157.59 95.038-41.693-179.239L510 197.472l-183.37-15.734L255 12.75l-71.629 168.988L0 197.472l139.103 120.539L97.41 497.25z" />
                                </svg>
                                <svg class="cards__container__item__box__desc__info__ratings__star cards__container__item__box__desc__info__ratings__star--gray" xml:space="preserve" viewBox="0 0 510 510">
                                    <path d="m255 402.212 157.59 95.038-41.693-179.239L510 197.472l-183.37-15.734L255 12.75l-71.629 168.988L0 197.472l139.103 120.539L97.41 497.25z" />
                                </svg>

                            </div>
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