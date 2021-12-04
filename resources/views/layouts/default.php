<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shape Nutritions</title>
    <link rel="stylesheet" href="<?php url_e("css/main.css");?>"></link>
    <script src="<?php url_e("js/app.min.js");?>"></script>
</head>

<body>
    <div class="loading">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>


    <?php
    require_once __DIR__ . '/../partials/nav.php'; ?>

    <?php
    require_once __DIR__ . '/../partials/flashMessagesAndErrors.php'; ?>

    <div class="container">
        <?php
        /**
         * Das Layout erwartet eine Variable $templatePath, damit das Layout selbst das Template laden kann.
         *
         * In der View-Klasse definieren wir, welches Template geladen werden soll. Der eigentliche Vorgang des Ladens
         * passiert hier.
         */
        require_once $templatePath; ?>
    </div>

    <?php
    require_once __DIR__ . '/../partials/footer.php'; ?>

    </footer>
    <!-- /.container -->
    <script src="<?php echo BASE_URL; ?>/js/app.min.js"></script>
</body>

</html>