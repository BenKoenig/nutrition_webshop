<h1>Hello, <?php echo $user->username; ?></h1>
<h3>My orders</h3>

<?php foreach ($user->orders() as $order) : ?>
    <p><?php echo $order->bookable()->name;?></p>
    <p><?php echo $order->units;?></p>
<?php endforeach; ?>