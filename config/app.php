<?php

/**
 * =================================
 * Admin Account: 
 * Username: sae
 * Password: test
 * =================================
 * User Account (without admin privileges): 
 * Username: user
 * Password: test
 * =================================
 */


return [
    /**
     * Hier definieren wir den Namen der Anwendung. Das bietet uns die Möglichkeit einen zentralen String zu definieren,
     * den wir dann beispielsweise für den <title>-Tag verwenden können.
     */
    'app-name' => 'Shape Nutritions',

    /**
     * Hier definieren wir eine Slug Form des Anwendungsnamens. Dieser wird beispielsweise in der Session Klasse
     * verwendet, um den Namen des Session-Cookies zu setze.
     */
    'app-slug' => 'sae-php-mvc-session',

    /**
     * Die baseurl wird benötigt, um den <base>-Tag zu setzen, damit CSS, JS und IMG Imports immer von derselben URL
     * ausgehen und nicht von der aktuell im Browser aufgerufenen. Das ermöglicht es uns die src-Attribute relativ zu
     * setzen und die Files werden trotzdem absolut geladen.
     *
     * bei euch: http://localhost/mvc/ od. sowas wie http://localhost/sae-wdd320/mvc/
     */
    'baseurl' => 'http://localhost/php/fitness_nutrition_webshop/public',

    /**
     * Um einzelne Funktionalitäten je nach Umgebung leicht umschalten zu können, führen wir eine Einstellung ein,
     * die zwischen dev und prod unterscheiden kann. Dadurch können wir Beispielsweise das Error Reporting ein-
     * bzw. ausschalten.
     */
    'environment' => 'dev',

    /**
     * Hier definieren wir welches Layout standardmäßig verwendet wird. Hier könnte beispielsweise bei Werbeaktionen,
     * bei denen die gesamte Seite von einem Werbekunden gebrandet wird, hilfreich sein.
     */
    'default-layout' => 'default',

        /**
     * @todo: comment
     */
    'max-upload-size' => 1024 * 1024 * 10,

    /**
     * @todo: comment (relative to storage folder)
     */
    'uploads-folder' =>'/uploads'
];
