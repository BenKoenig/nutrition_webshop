<!--
--------------------- Hero Section -------------------- 
This section changes depending on the upcoming events. 

Currently, it is promoting the Vienna Run 
where customers can win prices when taking part.
--------------------------------------------------------
-->
<section class="hero">
    <div>
        <!-- Headline (h2) -->
        <h2 class="text-medium">Up for a challenge?</h2>
        <!-- Further information about the Vienna Run -->
        <p class="hero__desc">
        Sign up for the Vienna Run on <span class="text-medium">15th of September</span>
        and win awesome prices.
        </p>
        <!-- Link to find out more about the Vienna Run -->
        <a href="#" class="hero__a">Learn more</a>

        </div>


        <!-- SVG (Runner) -->
        <svg class="hero__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001" xml:space="preserve">
        <path style="fill:#ffbcab" d="M265.896 81.464h28.74v42.814h-28.74z" />
            <path style="fill:#ff9478" d="M265.896 81.464h28.74v23.717h-28.74z" />
            <path style="fill:#ffbcab" d="m310.573 124.277 52.826 58.506 51.127-33.969 2.837 4.626c6.628 10.809 3.511 24.926-7.054 31.938l-36.191 24.018c-8.336 5.456-19.392 4.104-26.169-3.198l-40.958-45.066 3.582-36.855zM243.154 417.033l29.898-135.746-48.276 17.967-14.664 88.41a2.978 2.978 0 0 1-2.938 2.491h-80.075l-8.958 29.449 113.014 6.516a11.602 11.602 0 0 0 11.999-9.087z" />
            <path style="fill:#9ce0b8" d="M91.161 461.606v-71.528h37.084l-17.662 62.528c-1.921 6.573-7.947 9-14.795 9h-4.627z" />
        <path style="fill:#781900" d="M316.886 12.46C312.268 4.999 304.008 0 294.636 0h-25.08c-14.383 0-26.152 11.768-26.152 26.152v21.176c43.747-1.6 65.393-23.835 73.482-34.868z" />
        <path style="fill:#ffbcab" d="M243.404 47.327v21.384c0 14.383 11.768 26.152 26.152 26.152h25.08c14.383 0 26.152-11.768 26.152-26.152V26.152a25.95 25.95 0 0 0-3.9-13.691c-8.091 11.032-29.737 33.267-73.484 34.866z" />
        <path style="fill:#9ce0b8" d="M373.526 512h-71.528v-37.083l60.925 17.804a14.737 14.737 0 0 1 10.603 14.145V512z" />
        <path style="fill:#ffbcab" d="m329.36 483.575-27.362-8.658V374.732l2.432 3.969-57.162-97.604 50.053-14.909 39.581 94.474c.692 1.652.987 3.445.859 5.232l-8.401 117.681z" />
        <path style="fill:#52a2e7" d="m318.605 316.987-21.283-50.801 15.642-132.803c.743-7.436-4.733-14.127-12.169-14.87l-43.225-4.319-16.706 28.754-7.487 63.715-3.652 33.637c-16.056 16.056-17.697 41.054-4.947 58.952l-.003.001-7.75 46.721c11.206.06 29.921.145 41.753.117l7.257-32.95 17.457 29.808 35.113-25.962z" />
        <path style="fill:#315591" d="m237.861 168.506-3.697 31.459 69.696 10.71 3.863-32.797-69.862-9.372z" />
        <g style="opacity:.46">
            <path style="fill:#24763d" d="M302.027 504.137v7.864h71.528v-5.135c0-.929-.096-1.84-.263-2.729h-71.265z" />
        </g>
        <g style="opacity:.46">
            <path style="fill:#24763d" d="M99.025 390.079h-7.864v71.528h5.135c.929 0 1.841-.096 2.729-.263v-71.265z" />
        </g>
        <path style="fill:#ffbcab" d="m255.942 142.459-64.63 2.087-7.086 60.974-5.315-.814c-12.561-1.924-21.344-13.447-19.87-26.069l5.03-43.093c1.219-9.888 9.391-17.456 19.342-17.915l71.379-3.485c7.91-.386 14.601 5.786 14.853 13.702.25 7.819-5.884 14.36-13.703 14.613z" />
        <path style="fill:#315591" d="m256.133 296.233 3.38 46.52 6.535-29.669z" />
    </svg>

</section>



<!--
------------- Popular Categories Section -------------- 
This section highlights the most popular categories.

A category is "popular" when the is_popular boolean 
is set to 1 inside the categories table. An admin is 
able to set it to true (1) or false (0) within the CMS.
--------------------------------------------------------
-->
<section class="cards">
    <!-- Headline (h3) -->
    <h3 class="text-dark">Popular Categories</h3>
    <div class="cards__container cards__container--md">
        <!-- Loop for every popular category -->
        <?php foreach ($categories as $categorie) : ?>
            <!-- Category Item -->
            <div class="cards__container__item cards__container__item--md">
                <div>
                    <!-- 
                    Image 
                    src: PHP code that contains the image path from the database
                    alt: PHP code that contains the name of the image from the database
                    -->
                    <?php

                    $url =  BASE_URL . $categorie->getImages()[0];
                    ?>

                    <!-- <img class="cards__container__item__bg" src="<?php echo $url; ?>"> -->
                    <img class="cards__container__item__bg" src="http://localhost/storage/uploads/1637232413_category-bars.png" alt="">
                </div>
                <!--
                Link name: PHP code that contains the category name from the database
                -->
                <a href="#" class="cards__container__item__a"><?php echo $categorie->name; ?>   </a>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!--
----------------- Goals Section -----------------
This section helps users find products depending
on their goals. For example, if they are trying
to lose weight, then products with low calorie
and sugar content will be suggested for them

The goals are loaded from the "goals" table 
and can be edited within the CMS.
------------------------------------------------
-->
<section class="cards">
    <!-- Headline (h3) -->
    <h3 class="text-dark">Find your supplements</h3>
    <div class="cards__container cards__container--lg">
        <!-- Loop for every goal -->
        <?php foreach ($goals as $goal) : ?>
            <!-- Goal Item -->
            <div class="cards__container__item cards__container__item--lg">
                <div>
                    <!-- 
                    Image 
                    src: PHP code that contains the image path from the database
                    alt: PHP code that contains the name of the image from the database
                    -->
                    <img class="cards__container__item__bg" src="<?php echo $goal->img_path; ?>" alt="<?php echo $goal->name; ?>">
                </div>
                <div class="cards__container__item__info">
                    <!-- 
                    The headline (h4) contains the goal name from the database
                    -->
                    <h4 class="cards__container__item__info__title"><?php echo $goal->name; ?></h4>
                    <a class="cards__container__item__info__a" href="#">Learn more</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>


<!--
------------- Featured Products Section --------------
The featured products section displays the products
the administrator of the website wants the users to
see firt.

A product is "featured" when the is_featured boolean 
is set to 1 inside the products table. An admin is 
able to set it to true (1) or false (0) within the CMS.
-------------------------------------------------------
-->
<section class="cards">
    <!-- Headline (h3)-->
    <h3 class="text-dark">Featured Products</h3>
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