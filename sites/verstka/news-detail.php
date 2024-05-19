<?php

error_reporting(E_ERROR | E_PARSE);

use ZLabs\Frontend\MustacheSingleton;

require_once $_SERVER['DOCUMENT_ROOT'] . '/../../vendor/autoload.php';

$mustache = MustacheSingleton::getInstance();

$pageConfig = [
    'meta' => [
        'title' => 'Восток Транзит: Журнал',
    ],
    'title' => 'Журнал',
    'isMainPage' => false,
    'mainClass' => 'main main-width-sidebar news-detail',
    'inlineCss' => collect([
        '/local/assets/local/bundle-common/bundle-common.css',
        '/local/assets/local/bundle-feedback-form/bundle-feedback-form.css',
        '/local/assets/local/bundle-news-detail/bundle-news-detail.css',
    ]),
    'inlineJs' => collect([]),
    'deferredCss' => collect([
        '/local/assets/local/bundle-vue-catalog/bundle-vue-catalog.css'
    ]),
    'deferredJs' => collect([
        '/local/assets/local/bundle-common/bundle-common.js',
        '/local/assets/local/bundle-news-detail/bundle-news-detail.js',
        '/local/assets/local/bundle-feedback-form/bundle-feedback-form.js',
    ]),
    'asyncJs' => collect([
        '/local/assets/local/bundle-vue-catalog/bundle-vue-catalog.js',
        'https://yastatic.net/share2/share.js'
    ]),
];

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/header.php');

?>
<main class="<?= $pageConfig['mainClass'] ?>">
    <div class="container page-columns">
        <div class="page-content">
            <?= $mustache->render('breadcrumbs', include $_SERVER['DOCUMENT_ROOT'] . '/context/news/breadcrumbs.php'); ?>
            <?= $mustache->render('article', include $_SERVER['DOCUMENT_ROOT'] . '/context/news-detail/article.php'); ?>
            <?= $mustache->render('products-slider', include $_SERVER['DOCUMENT_ROOT'] . '/context/news-detail/similar.php'); ?>
        </div>
        <? include $_SERVER['DOCUMENT_ROOT'] . '/include/sidebar.php' ?>
    </div>
    <div class="news-detail-footer">
        <div class="news-detail-wrapper__container container">
            <?=$mustache->render('ya-share')?>
        </div>
    </div>
</main>
<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/footer.php');