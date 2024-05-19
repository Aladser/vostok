<?php

error_reporting(E_ERROR | E_PARSE);

use ZLabs\Frontend\MustacheSingleton;

require_once $_SERVER['DOCUMENT_ROOT'] . '/../../vendor/autoload.php';

$mustache = MustacheSingleton::getInstance();

$pageConfig = [
    'meta' => [
        'title' => 'Восток Транзит: Каталог. Список авто',
    ],
    'title' => 'Каталог автомобилей',
    'isMainPage' => false,
    'pageClass' => 'page_inner',
    'mainClass' => 'main catalog',
    'inlineCss' => collect([
        '/local/assets/local/bundle-common/bundle-common.css',
        '/local/assets/local/bundle-feedback-form/bundle-feedback-form.css',
        '/local/assets/local/bundle-catalog/bundle-catalog.css',
    ]),
    'inlineJs' => collect([]),
    'deferredCss' => collect([
        '/local/assets/local/bundle-vue-catalog/bundle-vue-catalog.css'
    ]),
    'deferredJs' => collect([
        '/local/assets/local/bundle-common/bundle-common.js',
        '/local/assets/local/bundle-catalog/bundle-catalog.js',
        '/local/assets/local/bundle-feedback-form/bundle-feedback-form.js',
    ]),
    'asyncJs' => collect([
        '/local/assets/local/bundle-vue-catalog/bundle-vue-catalog.js'
    ]),
];

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/header.php');
?>
<main class="<?= $pageConfig['mainClass'] ?>">
    <div class="container">
        <?= $mustache->render('breadcrumbs', include $_SERVER['DOCUMENT_ROOT'] . '/context/catalog/breadcrumbs.php'); ?>
        <h1 class="page-title"><?= $pageConfig['title'] ?></h1>
        <div id="filter-el"></div>
        <script data-skip-moving>
          window['filter-endpoint'] = '/ajax/catalog/filter.php';
          window.filterContext = <?= json_encode(include $_SERVER['DOCUMENT_ROOT'] . '/context/catalog/filter.php')?>;

          window['catalog-endpoint'] = '/ajax/catalog/list.php';
          window.catalogContext = <?= include $_SERVER['DOCUMENT_ROOT'] . '/context/catalog/catalog.php'; ?>;
        </script>
        <?= $mustache->render('products-list', include $_SERVER['DOCUMENT_ROOT'] . '/context/index/products.php'); ?>
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
    <?= $mustache->render('modal-form', include $_SERVER['DOCUMENT_ROOT'] . '/context/catalog/order-form.php'); ?>
</main>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/include/footer.php');
