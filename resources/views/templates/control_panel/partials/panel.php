<?php
$control_panel_categories = ['Products', 'Categories', 'Goals', 'Ratings', 'Users', 'Merchants'];
?>
<!--
---------------- Admin Control Panel ---------------------
Here admins can select which parts of the website they
want to edit. 
----------------------------------------------------------
-->
<div class="panel">
    <h2>Control Panel</h2>
    <div class="panel__container">
        <?php foreach ($control_panel_categories as $control_panel_category) : ?>
            <div class="panel__container__item">
                <a class="panel__container__item__a" href="#"><?php echo $control_panel_category; ?></a>
            </div>
        <?php endforeach; ?>
    </div>

</div>