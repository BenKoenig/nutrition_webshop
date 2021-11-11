<h2>Categories</h2>

<?php foreach ($categories as $categorie) {
    echo $categorie->name;
    echo $categorie->img_url;
    echo $categorie->is_popular;
}

?>