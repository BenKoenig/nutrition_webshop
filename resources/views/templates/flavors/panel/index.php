<div class="panel-option">
    <div class="panel-option__header">
        <div class="panel-option__header__container">
            <h2>Flavors</h2>
            <a href="<?php echo BASE_URL . "/admin/flavors/" ?>create" class="panel-option__header__container__a">Create</a>
        </div>


        <div class="panel-option__header__path">
            <a class="panel-option__path__a" href="<?php echo BASE_URL . "/admin" ?>">Admin/</a>
            <p>Flavors</p>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor sequi consequatur vel, explicabo odio harum mollitia sit iure ipsam.</p>
    </div>
    <table class="panel-option__table">
        <thead class="panel-option__table__head">
            <th>Flavors</th>
        </thead>
        <tbody class="panel-option__table__body">
            <?php foreach ($flavors as $flavor) : ?>
                <tr class="panel-option__table__body__tr">
                    <td class="panel-option__table__body__tr__td"><?php echo ucfirst($flavor->flavor); ?></td>
                    <td class="panel-option__table__body__tr__td"><a class="btn btn--gray" href="<?php echo BASE_URL . "/admin/flavors/" . $flavor->id . "/edit" ?>" title="Edit">Edit</a></td>
                    <td class="panel-option__table__body__tr__td"><a class="btn btn--red" href="<?php echo BASE_URL . "/admin/flavors/$flavor->id/delete" ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

</div>