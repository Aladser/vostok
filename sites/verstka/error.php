<?php

error_reporting(E_ERROR | E_PARSE);

use ZLabs\Frontend\MustacheSingleton;

require_once $_SERVER['DOCUMENT_ROOT'] . '/../../vendor/autoload.php';

$mustache = MustacheSingleton::getInstance();

$pageConfig = [
    'meta' => [
        'title' => 'Восток Транзит: Error',
    ],
    'title' => 'Error',
    'isMainPage' => true,
    'mainClass' => 'main error',
    'inlineCss' => collect([
        '/local/assets/local/bundle-common/bundle-common.css',
        '/local/assets/local/bundle-feedback-form/bundle-feedback-form.css',
        '/local/assets/local/bundle-error/bundle-error.css',
    ]),
    'inlineJs' => collect([]),
    'deferredCss' => collect([]),
    'deferredJs' => collect([
        '/local/assets/local/bundle-common/bundle-common.js',
        '/local/assets/local/bundle-error/bundle-error.js',
        '/local/assets/local/bundle-feedback-form/bundle-feedback-form.js',
    ]),
    'asyncJs' => collect([])
];

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/header.php');

?>
<main class="<?= $pageConfig['mainClass'] ?>">
    <div class="container">
        <?= $mustache->render('breadcrumbs', include $_SERVER['DOCUMENT_ROOT'] . '/context/error/breadcrumbs.php'); ?>
        <div class="error-block">
            <div class="error-img-block">
                <picture class="error__img">
                    <source media="(max-width: 767px)" srcset="/local/assets/images/error/auto-mobile.png">
                    <source srcset="/local/assets/images/error/auto-desktop.png">
                    <img src="/local/assets/images/error/auto-desktop.png"
                         width="692"
                         height="144"
                         alt="Страница не найдена">
                </picture>
            </div>
            <div class="error-text-block">
                <div class="error__head">К сожалению, мы не смогли найти то, что вы искали.</div>
                <div class="error__text">
                    Возможно, вы попали на эту страницу по ошибке, либо она была перемещена или удалена.
                    <a href="/" class="error__link">Вернуться на главную</a>
                </div>
                <div class="error-link-block">
                </div>
            </div>
        </div>
    </div>
    <div class="error__bottom">
        <div class="container container-error__bottom">
            <div class="seo-text">
                <h2>Восток-Транзит</h2>
                <p>Группа компаний «Восток Транзит» предлагает заказ автомобилей внутреннего рынка <b>Китая, Японии,
                    Южной Кореи</b> под полную пошлину. Организовываем отправку в регионы РФ. Работаем с 2005 года,
                    являясь одной из старейших и крупнейших компаний в этой сфере. За это время мы отправили тысячи
                    автомобилей из Азии в разные регионы России. Получили сотни хороших отзывов от клиентов, многие
                    из которых стали нашими постоянными заказчиками.<br class="tablet-hide">
                    <a href="#">Узнать подробнее</a></p>
            </div>
        </div>
    </div>
</main>
<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/footer.php');