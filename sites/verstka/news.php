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
    'mainClass' => 'main news',
    'inlineCss' => collect([
        '/local/assets/local/bundle-common/bundle-common.css',
        '/local/assets/local/bundle-feedback-form/bundle-feedback-form.css',
        '/local/assets/local/bundle-news/bundle-news.css',
    ]),
    'inlineJs' => collect([]),
    'deferredCss' => collect([
        '/local/assets/local/bundle-vue-catalog/bundle-vue-catalog.css'
    ]),
    'deferredJs' => collect([
        '/local/assets/local/bundle-common/bundle-common.js',
        '/local/assets/local/bundle-news/bundle-news.js',
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
        <?= $mustache->render('breadcrumbs', include $_SERVER['DOCUMENT_ROOT'] . '/context/news/breadcrumbs.php'); ?>
        <h1 class="page-title"><?= $pageConfig['title']; ?></h1>
        <?= $mustache->render('news-list', include $_SERVER['DOCUMENT_ROOT'] . '/context/news/items.php'); ?>
        <?= $mustache->render('pager', include $_SERVER['DOCUMENT_ROOT'] . '/context/news/pager.php'); ?>
    </div>
    <div class="news__bottom">
        <div class="container container-news__bottom">
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