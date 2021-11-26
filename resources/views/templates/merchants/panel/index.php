<div class="panel-option">
    <div class="panel-option__header">
        <div class="panel-option__header__container">
            <h2>Merchants</h2>
            <a href="<?php echo BASE_URL . "/admin/merchants/" ?>create" class="panel-option__header__container__a">Create</a>
        </div>


        <div class="panel-option__header__path">
            <a class="panel-option__path__a" href="<?php echo BASE_URL . "/admin" ?>">Admin/</a>
            <p>Merchants</p>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor sequi consequatur vel, explicabo odio harum mollitia sit iure ipsam.</p>
    </div>
    <table class="panel-option__table">
        <thead class="panel-option__table__head">
            <th>Name</th>
            <th>Website</th>
        </thead>
        <tbody class="panel-option__table__body">
            <?php foreach ($merchants as $merchant) : ?>
                <tr class="panel-option__table__body__tr">
                    <td class="panel-option__table__body__tr__td"><?php echo $merchant->name; ?></td>
                    <td class="panel-option__table__body__tr__td"><?php echo $merchant->website; ?></td>
                    <td class="panel-option__table__body__tr__td"><a class="btn btn--gray" href="<?php echo BASE_URL . "/admin/merchants/" . $merchant->id . "/edit" ?>" title="Edit">Edit</a></td>
                    <td class="panel-option__table__body__tr__td"><a class="btn btn--red" href="<?php echo BASE_URL . "/admin/merchants/$merchant->id/delete" ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

</div>