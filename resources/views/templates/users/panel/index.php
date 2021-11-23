<div class="panel-option">
    <div class="panel-option__header">
        <div class="panel-option__header__container">
            <h2>Users</h2>
        </div>


        <div class="panel-option__header__path">
            <a class="panel-option__path__a" href="<?php echo BASE_URL . "/admin" ?>">Admin/</a>
            <p>Users</p>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor sequi consequatur vel, explicabo odio harum mollitia sit iure ipsam.</p>
    </div>
    <table class="panel-option__table">
        <thead class="panel-option__table__head">
            <th>Username</th>
            <th>Email</th>
            <th>Creation Date</th>
        </thead>
        <tbody class="panel-option__table__body">
            <?php foreach ($users as $user) : ?>
                <tr class="panel-option__table__body__tr">
                    <td class="panel-option__table__body__tr__td"><?php echo ucfirst($user->username); ?></td>
                    <td class="panel-option__table__body__tr__td"><?php echo ucfirst($user->email); ?></td>
                    <td class="panel-option__table__body__tr__td"><?php echo ucfirst($user->created_at); ?></td>
                    <!-- <td class="panel-option__table__body__tr__td"><a class="btn btn--red" href="<?php echo BASE_URL . "/admin/products/$rating->id/ratings/delete" ?>">Delete</a></td> -->
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

</div>