<div class="errors">
    <?php foreach (\Core\Session::getAndForget('errors', []) as $error) : ?>
        <p class="errors__message"><?php echo $error; ?></p>
    <?php endforeach; ?>
</div>