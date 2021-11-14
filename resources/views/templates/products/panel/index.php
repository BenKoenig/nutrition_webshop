
<div class="panel-option">
    <div class="panel-option__header">
        <h2>Category: <?php echo $categories[0]->name; ?></h2>
        <div class="panel-option__header__path">
            <a class="panel-option__path__a" href="<?php echo BASE_URL . "/admin" ?>">Admin/</a>
            <a class="panel-option__path__a" href="<?php echo BASE_URL . "/admin/categories" ?>">Categories/</a>
            <p><?php echo $categories[0]->id ?> (<?php echo $categories[0]->name ?>)</p>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor sequi consequatur vel, explicabo odio harum mollitia sit iure ipsam.</p>
    </div>
    <table class="panel-option__table">
        <thead class="panel-option__table__head">
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Image Path</th>
            <th>Serving</th>
            <th>Ingredients</th>
            <th>Weight</th>
            <th>Featured</th>
            <th>Bestseller</th>
        </thead>
        <tbody class="panel-option__table__body">
            <?php foreach ($products as $product) : ?>
                <tr class="panel-option__table__body__tr">
                    <td class="panel-option__table__body__tr__td"><?php echo $product->name; ?></td>
                    <td class="panel-option__table__body__tr__td"><?php echo $product->price; ?></td>
                    <td class="panel-option__table__body__tr__td"><?php echo $product->description; ?></td>
                    <td class="panel-option__table__body__tr__td"><?php echo $product->img_path; ?></td>
                    <td class="panel-option__table__body__tr__td"><?php echo $product->serving; ?></td>
                    <td class="panel-option__table__body__tr__td"><?php echo $product->ingredients; ?></td>
                    <td class="panel-option__table__body__tr__td"><?php echo $product->weight; ?></td>
                    <td class="panel-option__table__body__tr__td"><?php echo ($product->is_featured  ? 'Yes' : 'No'); ?></td>
                    <td class="panel-option__table__body__tr__td"><?php echo ($product->is_bestseller  ? 'Yes' : 'No'); ?></td>
                    <td class="panel-option__table__body__tr__td"><a class="panel-option__table__body__tr__td__btn panel-option__table__body__tr__td__btn--edit" href="#">Edit</a></td>
                    <td class="panel-option__table__body__tr__td"><a class="panel-option__table__body__tr__td__btn panel-option__table__body__tr__td__btn--delete" href="#">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

</div>
