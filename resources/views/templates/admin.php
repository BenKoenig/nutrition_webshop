<!--
---------------------------------------
Control Panel Header
---------------------------------------
-->
<div class="panel-header">
    <div>
        <h1>Admin Panel</h1>
        <p class="panel-header--desc">You can explore Admin Panel by selecting different categories 
            (for example users, products and merchants), and viewing common tasks listed under each category. </p>
        <p class="panel-header--user">Logged in as: <?php echo \App\Models\User::getLoggedIn()->username; ?></p>
        <a class="panel-header--logout"" href="<?php echo BASE_URL ?>/logout">Logout</a>
    </div>

    <img class="panel-header__img" src="https://bit.ly/3qxun4E" alt="cat admin (supposed to be funny)">
</div>


<!--
Array list of all the control panel categories that admins 
can edit within the website.
-->
<?php
$control_panel_categories = ['categories', 'goals', 'ratings', 'users', 'merchants', 'flavors'];
?>
<!--
----------------------------------------------------------

Admin Control Panel 

Here admins can select which parts of the website they
want to edit. 

----------------------------------------------------------
-->
<div class="panel">
    <div class="panel__container">
        <!--
        Foreach loop with for all of the control
        panel categories
        -->
        <?php foreach ($control_panel_categories as $control_panel_category) : ?>
            <div class="panel__container__item">
                <a class="panel__container__item__a" href="<?php echo BASE_URL . "/admin/" . $control_panel_category; ?>"><?php echo ucfirst($control_panel_category); ?></a>
            </div>
        <?php endforeach; ?>
    </div>
</div>