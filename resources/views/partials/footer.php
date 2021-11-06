<?php

$infos = [
    ['About Us', 'Everything about our company', "#", 'Learn about us'],
    ['Products', 'Get to know and love our products', "#", 'View our products'],
    ['Contact', 'We would love to hear from you', '#', 'Get in touch']
];

$social_media_svgs = [
    ['https://instagram.com', 'Instagram', '<svg xml:space="preserve" width="2.5rem" fill="#5FA09F" viewBox="0 0 510 510"><path d="M459 0H51C22.95 0 0 22.95 0 51v408c0 28.05 22.95 51 51 51h408c28.05 0 51-22.95 51-51V51c0-28.05-22.95-51-51-51zM255 153c56.1 0 102 45.9 102 102s-45.9 102-102 102-102-45.9-102-102 45.9-102 102-102zM63.75 459C56.1 459 51 453.9 51 446.25V229.5h53.55C102 237.15 102 247.35 102 255c0 84.15 68.85 153 153 153s153-68.85 153-153c0-7.65 0-17.85-2.55-25.5H459v216.75c0 7.65-5.1 12.75-12.75 12.75H63.75zM459 114.75c0 7.65-5.1 12.75-12.75 12.75h-51c-7.65 0-12.75-5.1-12.75-12.75v-51c0-7.65 5.1-12.75 12.75-12.75h51C453.9 51 459 56.1 459 63.75v51z"/></svg>'],
    ['https://facebook.com', 'Facebook', '<svg xml:space="preserve" width="2.5rem" fill="#5FA09F" viewBox="0 0 510 510"><path d="M459 0H51C22.95 0 0 22.95 0 51v408c0 28.05 22.95 51 51 51h408c28.05 0 51-22.95 51-51V51c0-28.05-22.95-51-51-51zm-25.5 51v76.5h-51c-15.3 0-25.5 10.2-25.5 25.5v51h76.5v76.5H357V459h-76.5V280.5h-51V204h51v-63.75C280.5 91.8 321.3 51 369.75 51h63.75z"/></svg>'],
    ['https://twitter.com', 'Twitter', '<svg xml:space="preserve" width="2.5rem" fill="#5FA09F" viewBox="0 0 510 510"><path d="M459 0H51C22.95 0 0 22.95 0 51v408c0 28.05 22.95 51 51 51h408c28.05 0 51-22.95 51-51V51c0-28.05-22.95-51-51-51zm-58.65 186.15c-2.55 117.3-76.5 198.9-188.7 204-45.9 2.55-79.05-12.75-109.65-30.6 33.15 5.101 76.5-7.649 99.45-28.05-33.15-2.55-53.55-20.4-63.75-48.45 10.2 2.55 20.4 0 28.05 0-30.6-10.2-51-28.05-53.55-68.85 7.65 5.1 17.85 7.65 28.05 7.65-22.95-12.75-38.25-61.2-20.4-91.8 33.15 35.7 73.95 66.3 140.25 71.4-17.85-71.4 79.051-109.65 117.301-61.2 17.85-2.55 30.6-10.2 43.35-15.3-5.1 17.85-15.3 28.05-28.05 38.25 12.75-2.55 25.5-5.1 35.7-10.2-2.551 12.75-15.301 22.95-28.051 33.15z"/></svg>']
];

?>

<footer class="footer">

    <h2>
        Fitness <bold>Express</bold>
    </h2>


    <div class="footer__links">
        <div class="footer__links__social">
            <p>Follow us on social media to hear about the latest news about our shop!</p>
            <ul class="footer__links__social__ul">
                <?php foreach ($social_media_svgs as $svg): ?>
                    <li class="footer__links__social__ul__li"><a class="footer__links__social__ul__li__a" href="<?php echo $svg[0]; ?>"><span class="sr-only"><?php echo $svg[1]; ?></span><?php echo $svg[2]; ?></a></li>
                <?php endforeach; ?>

            </ul>
        </div>
        <div class="footer__links__info">
            <?php foreach ($infos as $info): ?>
                <div class="footer__links__info__item">
                <h5><?php echo $info[0];?></h5>
                <p><?php echo $info[1];?></p>
                <a href="<?php echo $info[2];?>"><?php echo $info[3];?></a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="footer__copyright">
        <p>© 2021 All Rights Reserved Fitness Express</p>
        <ul class="footer__copyright__ul">
            <li class="footer__copyright__ul__li"><a class="footer__copyright__ul__li__a" href="#">Terms of Service</a></li>
            <li class="footer__copyright__ul__li"><a class="footer__copyright__ul__li__a" href="#">Privacy Notice</a></li>
        </ul>
    </div>
</footer>