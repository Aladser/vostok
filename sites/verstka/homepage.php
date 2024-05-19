<?php

error_reporting(E_ERROR | E_PARSE);

use ZLabs\Frontend\MustacheSingleton;

require_once $_SERVER['DOCUMENT_ROOT'] . '/../../vendor/autoload.php';

$mustache = MustacheSingleton::getInstance();

$pageConfig = [
    'meta' => [
        'title' => 'Восток Транзит: Главная',
    ],
    'title' => 'Восток Транзит: Главная',
    'isMainPage' => true,
    'mainClass' => 'main index',
    'inlineCss' => collect([
        '/local/assets/local/bundle-common/bundle-common.css',
        '/local/assets/local/bundle-feedback-form/bundle-feedback-form.css',
        '/local/assets/local/bundle-homepage/bundle-homepage.css',
    ]),
    'inlineJs' => collect([]),
    'deferredCss' => collect([
        '/local/assets/local/bundle-vue-catalog/bundle-vue-catalog.css'
    ]),
    'deferredJs' => collect([
        '/local/assets/local/bundle-common/bundle-common.js',
        '/local/assets/local/bundle-homepage/bundle-homepage.js',
        '/local/assets/local/bundle-feedback-form/bundle-feedback-form.js',
    ]),
    'asyncJs' => collect([
        '/local/assets/local/bundle-vue-catalog/bundle-vue-catalog.js'
    ]),
];

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/header.php');
?>
<main class="<?= $pageConfig['mainClass'] ?>">
    <div class="index__container container">
        <?= $mustache->render('index-top', include $_SERVER['DOCUMENT_ROOT'] . '/context/index/top.php'); ?>
        <div class="index-catalog">
            <div class="index-catalog__head">
                <div class="index-catalog__title">Каталог</div>
                <a href="#" class="index-catalog__link">
                    <span class="tablet-hide">Полный каталог</span>
                    <span class="mobile-hide tablet-show">Смотреть полный каталог</span>
                </a>
            </div>
            <div id="filter-el"></div>
            <script data-skip-moving>
              window['filter-endpoint'] = '/ajax/catalog/filter.php';
              window.filterContext = <?= json_encode(include $_SERVER['DOCUMENT_ROOT'] . '/context/catalog/filter.php')?>;

              window['catalog-endpoint'] = '/ajax/catalog/list.php';
              window.catalogContext = <?= include $_SERVER['DOCUMENT_ROOT'] . '/context/catalog/catalog.php'; ?>;
            </script>
            <?= $mustache->render('products-list', include $_SERVER['DOCUMENT_ROOT'] . '/context/index/products.php'); ?>
        </div>
    </div>
    <?= $mustache->render('index-get-car', include $_SERVER['DOCUMENT_ROOT'] . '/context/index/index-get-car.php') ?>
    <?= $mustache->render('index-stages', include $_SERVER['DOCUMENT_ROOT'] . '/context/index/index-stages.php'); ?>
    <?= $mustache->render('index-reviews', include $_SERVER['DOCUMENT_ROOT'] . '/context/index/reviews.php'); ?>
    <?= $mustache->render('index-blog', include $_SERVER['DOCUMENT_ROOT'] . '/context/index/blog/index-blog.php') ?>
    <?= $mustache->render('index-faq', include $_SERVER['DOCUMENT_ROOT'] . '/context/index/index-faq.php') ?>
    <div class="container">
        <?= $mustache->render('index-company', include $_SERVER['DOCUMENT_ROOT'] . '/context/index/index-company.php') ?>
    </div>
    <?= $mustache->render('modal-form', include $_SERVER['DOCUMENT_ROOT'] . '/context/catalog/order-form.php'); ?>
</main>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/include/footer.php');
