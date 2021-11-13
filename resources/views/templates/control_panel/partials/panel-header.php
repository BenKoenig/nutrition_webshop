<!--
---------------------------------------
Control Panel Header
---------------------------------------
-->
<div class="panel-header">
    <div>
        <h2>Control Panel</h2>
        <p class="panel-header--desc">You can explore Control Panel by selecting different categories 
            (for example users, products and merchants), and viewing common tasks listed under each category. </p>
        <p class="panel-header--user">Logged in as: <?php echo \App\Models\User::getLoggedIn()->username; ?></p>
        <a class="panel-header--logout"" href="<?php echo BASE_URL ?>/logout">Logout</a>
    </div>

    <img class="panel-header__img" src="https://bit.ly/3qxun4E" alt="cat admin (supposed to be funny)">
</div>