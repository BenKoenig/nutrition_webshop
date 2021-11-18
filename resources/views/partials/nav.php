<nav class="nav">
    <div class="nav__desktop">
        <div class="nav__desktop__container">
            <ul class="nav__desktop__container__ul">
                <li class="nav__desktop__container__ul__li"><a class="nav__desktop__container__ul__li__a nav__desktop__container__ul__li__a--home" href="<?php echo BASE_URL; ?>/home">Fitness Express</a></li>
                <li class="nav__desktop__container__ul__li"><a class="nav__desktop__container__ul__li__a" href="<?php echo BASE_URL; ?>/categories"">Categories</a></li>
                <li class=" nav__desktop__container__ul__li"><a class="nav__desktop__container__ul__li__a" href="<?php echo BASE_URL; ?>/sales"">Sales</a></li>
                <li class=" nav__desktop__container__ul__li"><a class="nav__desktop__container__ul__li__a" href="<?php echo BASE_URL; ?>/new"">New</a></li>
                <?php
    if (\Core\Middlewares\AuthMiddleware::isAdmin()) : ?>
                <li class=" nav__desktop__container__ul__li"><a class="nav__desktop__container__ul__li__a nav__desktop__container__ul__li__a--admin" href="<?php echo BASE_URL; ?>/admin"">Admin</a></li>
                <?php
    endif; ?>
            </ul>

            <ul class=" nav__desktop__container__account">
            <?php if (!\App\Models\User::isLoggedIn()) : ?>
                <li class="nav__desktop__container__account__li"><a class="nav__desktop__container__account__li__a nav__desktop__container__account__li__a--login" href="<?php echo BASE_URL; ?>/login">Login</a></li>
                <li class="nav__desktop__container__account__li"><a class="nav__desktop__container__account__li__a nav__desktop__container__account__li__a--register" href="<?php echo BASE_URL; ?>/register">Register</a></li>
            <?php else : ?>
                <div class="nav__desktop__container__account__logged">
                    <p>Logged in as <?php echo \App\Models\User::getLoggedIn()->username; ?></p>
                    <a class="nav__desktop__container__account__logged__a" href="<?php echo BASE_URL ?>/logout">Logout</a>
                </div>
            <?php endif; ?>
            </ul>




            <a href="#" class="nav__desktop__container__cart">Cart<svg class="nav__desktop__container__cart--svg" class="xmlns=" http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 510 510">
                    <path d="M153 408c-28.05 0-51 22.95-51 51s22.95 51 51 51 51-22.95 51-51-22.95-51-51-51zM0 0v51h51l91.8 193.8-35.7 61.2c-2.55 7.65-5.1 17.85-5.1 25.5 0 28.05 22.95 51 51 51h306v-51H163.2c-2.55 0-5.1-2.55-5.1-5.1v-2.551l22.95-43.35h188.7c20.4 0 35.7-10.2 43.35-25.5L504.9 89.25c5.1-5.1 5.1-7.65 5.1-12.75 0-15.3-10.2-25.5-25.5-25.5H107.1L84.15 0H0zm408 408c-28.05 0-51 22.95-51 51s22.95 51 51 51 51-22.95 51-51-22.95-51-51-51z" />
                </svg></a>
        </div>
    </div>

</nav>























<nav class="nav" hidden>
    <div class="nav__container">
        <ul class="nav__container__ul">
            <li class="nav__container__ul__li"><a class="nav__container__ul__li__a nav__container__ul__li__a--home" href="#">Home</a></li>
            <li class="nav__container__ul__li" hidden><a class="nav__container__ul__li__a" href="#">Categories</a></li>
            <li class="nav__container__ul__li" hidden><a class="nav__container__ul__li__a" href="#">Sales</a></li>
            <li class="nav__container__ul__li" hidden><a class="nav__container__ul__li__a" href="#">New Releases</a></li>
        </ul>
        <button class="nav__container__mobilebtn" type="button">Menu</button>
        <div class="nav__container__menu nav__container__menu--mobile">
            <div class="nav__container__menu__items nav__container__menu__items--mobile">
                <ul class="nav__container__menu__items__ul">
                    <li><a href="#">Categories</a></li>
                    <li><a href="#">Sales</a></li>
                    <li><a href="#">New Releases</a></li>
                </ul>
                <ul class="nav__container__menu__items__ul nav__container__menu__items__ul__account">
                    <li><a class="nav__container__menu__items__ul__account--login" href="#">Login</a></li>
                    <li><a class="nav__container__menu__items__ul__account--register" href="#">Register</a></li>

                </ul>
                <a href="#" class="nav__container__menu__items__a"><svg class="nav__container__menu__items__a--svg" class="xmlns=" http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 510 510">
                        <path d="M153 408c-28.05 0-51 22.95-51 51s22.95 51 51 51 51-22.95 51-51-22.95-51-51-51zM0 0v51h51l91.8 193.8-35.7 61.2c-2.55 7.65-5.1 17.85-5.1 25.5 0 28.05 22.95 51 51 51h306v-51H163.2c-2.55 0-5.1-2.55-5.1-5.1v-2.551l22.95-43.35h188.7c20.4 0 35.7-10.2 43.35-25.5L504.9 89.25c5.1-5.1 5.1-7.65 5.1-12.75 0-15.3-10.2-25.5-25.5-25.5H107.1L84.15 0H0zm408 408c-28.05 0-51 22.95-51 51s22.95 51 51 51 51-22.95 51-51-22.95-51-51-51z" />
                    </svg></a>
            </div>

        </div>
    </div>

</nav>


<nav hidden class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><?php echo \Core\Config::get('app.app-name'); ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>/rooms">Räume</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>/room-features">Raum Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>/categories">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>/admin">admin</a>
                </li>
            </ul>
            <?php
            /**
             * Ist ein*e User*in eingeloggt, so zeigen wir den Username an und einen Logout Button. Andernfalls einen
             * Login Button.
             */
            if (\App\Models\User::isLoggedIn()) : ?>
                <div class="d-flex">
                    Eingeloggt: <?php echo \App\Models\User::getLoggedIn()->username; ?>
                    (<a href="<?php echo BASE_URL ?>/logout">Logout</a>)
                </div>
            <?php else : ?>
                <a class="btn btn-primary" href="<?php echo BASE_URL; ?>/login">Login</a>
            <?php endif; ?>
        </div>
    </div>
</nav>