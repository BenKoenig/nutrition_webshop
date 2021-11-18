<h2>Categories</h2>
<ul class="categories">
    <?php foreach ($categories as $categorie): ?>
        <li class="categories__li">
            <a class="categories__li__a" href="#"><?php echo $categorie->name; ?></a>
        </li>
    <?php endforeach; ?> 
</ul>