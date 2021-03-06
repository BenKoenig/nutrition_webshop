<!--
---------------------------------------
Control Panel Header
---------------------------------------
-->
<div class="panel-header">
    <div>
        <h2>Admin Panel</h2>
        <!-- Small description of the admin panel -->
        <p class="panel-header--desc">You can explore Admin Panel by selecting different categories
            (for example users, products and merchants), and viewing common tasks listed under each category. </p>
        <!-- Displays who is logged in-->
        <p class="panel-header--user">Logged in as: <?php echo \App\Models\User::getLoggedIn()->username; ?></p>
        <a class="btn btn--red" href=" <?php echo BASE_URL ?>/logout">Logout</a>
    </div>

    <img class="panel-header__img" src="https://bit.ly/3qxun4E" alt="cat admin (supposed to be funny)">
</div>


<!--
Array list of all the control panel categories that admins 
can edit within the website.
-->
<?php
$control_panel_categories = ['products', 'categories', 'goals', 'users', 'merchants'];
?>
<!--
----------------------------------------------------------

Admin Control Panel 

Here admins can select which parts of the website they
want to edit. 

----------------------------------------------------------
-->
<div class="listing">

    <ul class="listing__ul">
        <?php foreach ($control_panel_categories as $control_panel_category) : ?>
            <li class="listing__ul__li listing__ul__li--settings">
                <a class="listing__ul__li__a listing__ul__li__a--black" href="<?php echo BASE_URL . "/admin/" . $control_panel_category; ?>"><?php echo ucfirst($control_panel_category); ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>