<div class="listing">
    <h1 class="listing__h1">Categories</h1>

    <ul class="listing__ul">
        <?php foreach ($categories as $categorie) : ?>
            <li class="listing__ul__li">
                <a class="listing__ul__li__a" href="<?php echo BASE_URL . '/categories/' . $categorie->id ;?>"><?php echo $categorie->name; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>