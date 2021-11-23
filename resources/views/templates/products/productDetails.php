<div class="productDetail">
    <div class="productDetail__breadcrumbs">
        <p>crumbs</p>
        <p><?php echo $product->category_id; ?></p>
        <p><?php echo $product->name; ?></p>
    </div>
    <div class="productDetail__container">
        <img class="productDetail__container__img" src="<?php echo $product->img_path; ?>" alt="">
        <div class="productDetail__container__details">
            <div class="productDetail__container__details__ratings">

            </div>
            <div class="productDetail__container__details__wrapper">
                <div class="productDetail__container__details__wrapper__price">
                    <p>€ <?php echo $product->price; ?></p>
                </div>
                <p class="productDetail__container__details__wrapper__desc">
                    <?php echo $product->description; ?>
                </p>
            </div>


            <div class="productDetail__container__details__infos">
                <div class="productDetail__container__details__infos__item">

                </div>
                <div class="productDetail__container__details__infos__item">

                </div>
                <div class="productDetail__container__details__infos__item">

                </div>
                <div class="productDetail__container__details__infos__item">

                </div>
            </div>
            <form class="productDetail__container__details__flavor">
                <h4>Choose a flavor</h4>
                </div>

                <div class="productDetail__container__details__flavor__main">

                </div>
                <button type="submit">Add to Cart</button>
            </form>

     


        </div>
    </div>
</div>