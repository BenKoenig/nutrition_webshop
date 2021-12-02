<div class="message">
    <?php foreach (\Core\Session::getAndForget('errors', []) as $error) : ?>
        <p class=""><?php echo $error; ?></p>
    <?php endforeach; ?>
</div>