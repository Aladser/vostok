<?php

error_reporting(E_ERROR | E_PARSE);

use ZLabs\Frontend\MustacheSingleton;

require_once $_SERVER['DOCUMENT_ROOT'] . '/../../vendor/autoload.php';

$mustache = MustacheSingleton::getInstance();

$pageConfig = [
    'meta' => [
        'title' => 'Восток Транзит: Каталог. Детальная',
    ],
    'title' => 'Geely Coolray 186 л.с. искрящийся белый',
    'isMainPage' => false,
    'pageClass' => 'page_inner',
    'mainClass' => 'main detail',
    'inlineCss' => collect([
        '/local/assets/local/bundle-common/bundle-common.css',
        '/local/assets/local/bundle-feedback-form/bundle-feedback-form.css',
        '/local/assets/local/bundle-detail/bundle-detail.css',
    ]),
    'inlineJs' => collect([]),
    'deferredCss' => collect([
        '/local/assets/local/bundle-vue-catalog/bundle-vue-catalog.css'
    ]),
    'deferredJs' => collect([
        '/local/assets/local/bundle-common/bundle-common.js',
        '/local/assets/local/bundle-detail/bundle-detail.js',
        '/local/assets/local/bundle-feedback-form/bundle-feedback-form.js',
    ]),
    'asyncJs' => collect([])
];

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/header.php');
?>
<main class="<?= $pageConfig['mainClass'] ?>">
    <div class="container">
        <?= $mustache->render('breadcrumbs', include $_SERVER['DOCUMENT_ROOT'] . '/context/detail/breadcrumbs.php'); ?>
        <?= $mustache->render('detail-top', include $_SERVER['DOCUMENT_ROOT'] . '/context/detail/top.php'); ?>
    </div>
    <?= $mustache->render('detail-tabs', include $_SERVER['DOCUMENT_ROOT'] . '/context/detail/tabs.php'); ?>
    <?= $mustache->render('products-slider', include $_SERVER['DOCUMENT_ROOT'] . '/context/detail/similar.php'); ?>
    <?= $mustache->render('products-slider', include $_SERVER['DOCUMENT_ROOT'] . '/context/detail/viewed.php'); ?>
    <div class="static__bottom">
        <div class="container">
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
    <?= $mustache->render('modal-form', include $_SERVER['DOCUMENT_ROOT'] . '/context/forms/order-form.php'); ?>
</main>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/include/footer.php');
