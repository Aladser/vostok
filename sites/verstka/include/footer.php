<?php

use ZLabs\Asset\AsyncJs;
use ZLabs\Asset\DeferredJs;
use ZLabs\Asset\DeferredStyles;
use ZLabs\EnvSingleton;
use ZLabs\Frontend\MustacheSingleton;

/** @var array $pageConfig */
/** @var MustacheSingleton $mustache */
?>

<footer class="footer">
    <div class="footer-buttons-wrap">
        <div class="footer-buttons">
            <div class="footer-buttons__container container">
                <div class="footer-buttons__title">Есть вопросы или предложения?</div>
                <div class="footer-buttons__list">
                    <a href="#write-form" class="footer-button button button_linear" data-fancybox>Напишите нам</a>
                    <a href="#callback-form" class="footer-button button button_linear" data-fancybox>Заказать звонок</a>
                </div>
                <?= $mustache->render('social-list', include $_SERVER['DOCUMENT_ROOT'] . '/context/footer/social-list.php'); ?>
            </div>
        </div>
    </div>
    <div class="footer-menu-wrap">
        <div class="footer-menu-wrap__container container">
            <?= $mustache->render('footer-contacts', include $_SERVER['DOCUMENT_ROOT'] . '/context/footer/contacts.php'); ?>
            <?= $mustache->render('footer-menu', include $_SERVER['DOCUMENT_ROOT'] . '/context/footer/menu.php'); ?>
        </div>
    </div>
    <div class="footer__social">
        <div class="footer__container container">
            <?= $mustache->render('social-list', include $_SERVER['DOCUMENT_ROOT'] . '/context/footer/social-list.php'); ?>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="footer__container container">
            <div class="footer__company">© 2023 ООО «Восток-Транзит». <br class="tablet-hide">Подбор и доставка автомобилей из Азии</div>
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
<?// page-inner?>
</div>
<? if (!$_COOKIE['alertCookie'] || $_COOKIE['alertCookie'] !== 'y') : ?>
    <?= $mustache->render('cookie-alert', [
        'text' => 'Мы используем cookies для быстрой и удобной работы сайта. Продолжая пользоваться сайтом, вы принимаете условия обработки персональных данных',
        'link' => [
            'href' => '#',
            'text' => 'Узнать больше о <b>cookies</b>'
        ]
    ]) ?>
<? endif; ?>
<script id="feedback-success-message" type="text/x-mustache-template">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/local/assets/mustache/feedback-success-message.mustache') ?>
</script>
<?php

// Если фронтенд не собран (работает команда npm run start), покажем стили и скрипты "отложено", чтобы webpack нормально работал
if (!EnvSingleton::getInstance()->isFrontendMode()) {
    echo (new DeferredJs(collect([
    ]), true))->render();
}

// Если фронтенд собран, покажем отложенные css файлы
if (EnvSingleton::getInstance()->isFrontendMode()) {
    echo (new DeferredStyles($pageConfig['deferredCss'], true))->render();
}

if ($_ENV['MODE'] === 'dev') {
    // костыль для вебпак 5 версии. Общий runtime вынесен в отдельный файл
    $pageConfig['deferredJs']->prepend('/local/assets/local/runtime/runtime.js');
}

// Эти скрипты всегда будут грузится отложено (defer)
echo (new DeferredJs($pageConfig['deferredJs'], true))->render();

// Эти скрипты всегда будут грузится отложено (async - нужно использовать scriptsReady в js файлах)
echo (new AsyncJs($pageConfig['asyncJs'], true))->render();
?>
</body>
</html>