<?

use ZLabs\Frontend\MustacheSingleton;


/** @global CMain $APPLICATION */
/** @var bool $isMainPage */
/** @var bool $isSearchPage */

$mustache = MustacheSingleton::getInstance();

?>

<footer class="footer">
    <div class="footer-buttons-wrap">
        <div class="footer-buttons">
            <div class="footer-buttons__container container">
                <?= ZLabs\App::Include('footer/buttons') ?>
                <?= ZLabs\App::Include('footer/social') ?>
            </div>
        </div>
    </div>
    <div class="footer-menu-wrap">
        <div class="footer-menu-wrap__container container">
            <?= ZLabs\App::Include('footer/menu') ?>
        </div>
    </div>
    <div class="footer__social">
        <div class="footer__container container">
            <? $APPLICATION->ShowViewContent('socials') ?>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="footer__container container">
            <div class="footer__company">
                <?= ZLabs\App::Include('footer/copyright') ?>
            </div>
            <!--noindex-->
            <a href="https://z-labs.ru/?utm_source=copyright&utm_medium=organic&utm_campaign=vostok-transit-gk.ru"
               target="_blank"
               rel="nofollow"
               class="footer-developer">
                Разработано <b>Студией Z-labs</b>
            </a>
            <!--/noindex-->
        </div>
    </div>
</footer>