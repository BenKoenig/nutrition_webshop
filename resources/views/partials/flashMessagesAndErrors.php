<?php foreach (\Core\Session::getAndForget('errors', []) as $error) : ?>
    <div class="errors">
        <p class="errors_message"><?php echo $error; ?></p>
    </div>
<?php endforeach; ?>