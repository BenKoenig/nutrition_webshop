<h2>Summary</h2>

<div class="row">
    <div class="col">
        <p><strong>Username</strong></p>
        <p><?php echo $user->username; ?></p>
    </div>
    <div class="col">
        <p><strong>Email</strong></p>
        <p><?php echo $user->email; ?></p>
    </div>
</div>

<table class="table table-striped">
    <thead>
    <th>#</th>
    <th>Name</th>
    <th>Description</th>
    <th># in cart</th>
    </thead>
    <?php
    /**
     * Alle Räume durchgehen und eine List ausgeben.
     */
    foreach ($cartContent as $product): ?>

        <tr>
            <td><?php
                echo $product->id; ?></td>
            <td>
                <a href="<?php
                echo BASE_URL; ?>/products/<?php
                echo $product->id; ?>/show"><?php
                    echo $product->name; ?>
                </a>
            </td>
            <td><?php
                echo $product->description; ?></td>
            <td><?php
                echo $product->count; ?></td>
        </tr>

    <?php
    endforeach; ?>
</table>

<?php if (\App\Models\User::isLoggedIn()): ?>
    <a href="<?php echo BASE_URL; ?>/checkout/finish" class="btn btn-primary">Finish</a>
    <a href="<?php echo BASE_URL; ?>/cart" class="btn btn-danger">Abort</a>
<?php endif; ?>