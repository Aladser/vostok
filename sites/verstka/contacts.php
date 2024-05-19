<?php

error_reporting(E_ERROR | E_PARSE);

use ZLabs\Frontend\MustacheSingleton;

require_once $_SERVER['DOCUMENT_ROOT'] . '/../../vendor/autoload.php';

$mustache = MustacheSingleton::getInstance();

$pageConfig = [
    'meta' => [
        'title' => 'Восток Транзит: Контакты',
    ],
    'title' => 'Контакты',
    'isMainPage' => false,
    'pageClass' => 'page_inner',
    'mainClass' => 'main contacts',
    'inlineCss' => collect([
        '/local/assets/local/bundle-common/bundle-common.css',
        '/local/assets/local/bundle-feedback-form/bundle-feedback-form.css',
        '/local/assets/local/bundle-contacts/bundle-contacts.css',
    ]),
    'inlineJs' => collect([]),
    'deferredCss' => collect([]),
    'deferredJs' => collect([
        '/local/assets/local/bundle-common/bundle-common.js',
        '/local/assets/local/bundle-contacts/bundle-contacts.js',
        '/local/assets/local/bundle-feedback-form/bundle-feedback-form.js',
    ]),
    'asyncJs' => collect([])
];

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/header.php');
?>
<main class="<?= $pageConfig['mainClass'] ?>">
    <div class="container">
        <?= $mustache->render('breadcrumbs', include $_SERVER['DOCUMENT_ROOT'] . '/context/detail/breadcrumbs.php'); ?>
    </div>
    <div class="container">
        <div class="contacts-top">
            <div class="contacts-top__header">
                <h1 class="page-title"><?= $pageConfig['title']; ?></h1>
                <div class="contacts-top__subtitle">ООО «Восток-Транзит»</div>
            </div>
            <div class="contacts-main">
                <a href="tel:79241422414" class="contacts-main__phone">+7 924 142-24-14</a>
                <div class="contacts-main__address">675000, Амурская обл., г. Благовещенск, ул.&nbsp;Тополиная, д. 68 корп. А1</div>
                <a href="mailto:east.transit@yandex.ru" class="contacts-main__email">east.transit@yandex.ru</a>
            </div>
        </div>
        <?= $mustache->render('units', include $_SERVER['DOCUMENT_ROOT'] . '/context/contacts/units.php'); ?>
        <?= $mustache->render('requisites', include $_SERVER['DOCUMENT_ROOT'] . '/context/contacts/requisites.php'); ?>
    </div>
    <?= $mustache->render('ask-form', include $_SERVER['DOCUMENT_ROOT'] . '/context/forms/ask-form.php'); ?>
</main>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/include/footer.php');
