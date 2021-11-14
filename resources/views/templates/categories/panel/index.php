<div class="panel">
    <div class="panel__header">

        <div class="panel__header__container">
            <h2>Categories</h2>
            <a href="<?php echo BASE_URL . "/admin/categories/" ?>create" class="panel__header__container__btn">Create</a>
        </div>
        <div class="panel__header__path">
            <a class="panel__header__path__a" href="<?php echo BASE_URL . "/admin" ?>">Admin</a>
            <p>/Categories</p>
        </div>

        <p class="panel__header__desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor sequi consequatur vel, explicabo odio harum mollitia sit iure ipsam.</p>

    </div>
    <div class="panel__container">
        <!--
        Foreach loop with for all of the control
        panel categories
        -->
        <?php foreach ($categories as $category) : ?>
            <div class="panel__container__item">
                <h3><?php echo $category->name; ?></h3>
                <p><?php echo $category->is_popular ? "Popular" : ""; ?></p>
                <div class="panel__container__item__options">
                    <a class="panel__container__item__options__btn panel__container__item__options__btn--view" href="<?php echo BASE_URL . "/admin/categories/" . $category->id; ?>">View Products</a>
                    <a class="panel__container__item__options__btn panel__container__item__options__btn--edit" href="#">Edit</a>
                    <a class="panel__container__item__options__btn panel__container__item__options__btn--delete" href="#">Delete</a>
                </div>
                <!--    
            <a class="panel__container__item__a" href="<?php echo BASE_URL . "/control_panel/" . $category->name; ?>"><?php echo $category->name; ?></a>
        -->
            </div>
        <?php endforeach; ?>
    </div>
</div>