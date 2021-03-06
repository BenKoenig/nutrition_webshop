<div class="panel-option">
    <div class="panel-option__header">
        <div class="panel-option__header__container">
            <h1>Products</h1>
            <a href="<?php echo BASE_URL . "/admin/products/" ?>create" class="panel-option__header__container__a">Create</a>
        </div>


        <div class="panel-option__header__path">
            <a class="panel-option__path__a" href="<?php echo BASE_URL . "/admin" ?>">Admin/</a>
            <p>Products</p>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor sequi consequatur vel, explicabo odio harum mollitia sit iure ipsam.</p>
    </div>
    <table class="panel-option__table">
        <thead class="panel-option__table__head">
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Serving</th>
            <th>Ingredients</th>
            <th>Weight</th>
            <th>Featured</th>
            <th>Bestseller</th>
            <th>Sale</th>
        </thead>
        <tbody class="panel-option__table__body">
            <?php foreach ($products as $product) : ?>
                <tr class="panel-option__table__body__tr">
                    <td class="panel-option__table__body__tr__td"><?php echo $product->name; ?></td>
                    <td class="panel-option__table__body__tr__td"><?php echo $product->price; ?></td>
                    <td class="panel-option__table__body__tr__td"><?php echo $product->description; ?></td>
                    <td class="panel-option__table__body__tr__td"><?php echo $product->serving; ?></td>
                    <td class="panel-option__table__body__tr__td"><?php echo $product->ingredients; ?></td>
                    <td class="panel-option__table__body__tr__td"><?php echo $product->weight; ?> g</td>
                    <td class="panel-option__table__body__tr__td"><?php echo ($product->is_featured===1  ? 'Yes' : 'No'); ?></td>
                    <td class="panel-option__table__body__tr__td"><?php echo ($product->is_bestseller===1  ? 'Yes' : 'No'); ?></td>
                    <td class="panel-option__table__body__tr__td"><?php echo ($product->is_sale===1  ? 'Yes' : 'No'); ?></td>
                    <td class="panel-option__table__body__tr__td"><a class="btn btn--gray" href="<?php echo BASE_URL . '/admin/products/' . $product->id . '/edit';?>">Edit</a></td>
                    <td class="panel-option__table__body__tr__td"><a class="btn btn--red" href="<?php echo BASE_URL . '/admin/products/' . $product->id . '/delete';?>"">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

</div>