<?php

error_reporting(E_ERROR | E_PARSE);

use ZLabs\Frontend\MustacheSingleton;

require_once $_SERVER['DOCUMENT_ROOT'] . '/../../vendor/autoload.php';

$mustache = MustacheSingleton::getInstance();

$pageConfig = [
    'meta' => [
        'title' => 'Восток Транзит: Общая информация',
    ],
    'title' => 'Общая информация',
    'isMainPage' => false,
    'pageClass' => 'page_inner',
    'mainClass' => 'main static',
    'inlineCss' => collect([
        '/local/assets/local/bundle-common/bundle-common.css',
        '/local/assets/local/bundle-feedback-form/bundle-feedback-form.css',
        '/local/assets/local/bundle-static/bundle-static.css',
    ]),
    'inlineJs' => collect([]),
    'deferredCss' => collect([]),
    'deferredJs' => collect([
        '/local/assets/local/bundle-common/bundle-common.js',
        '/local/assets/local/bundle-static/bundle-static.js',
        '/local/assets/local/bundle-feedback-form/bundle-feedback-form.js',
    ]),
    'asyncJs' => collect([])
];

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/header.php');
?>
    <main class="<?= $pageConfig['mainClass'] ?>">
        <div class="container">
            <?= $mustache->render('breadcrumbs', include $_SERVER['DOCUMENT_ROOT'] . '/context/static/breadcrumbs.php'); ?>
            <h1 class="page-title"><?= $pageConfig['title']; ?></h1>
            <div class="page-columns">
                <? include $_SERVER['DOCUMENT_ROOT'] . '/include/side-menu.php' ?>
                <div class="page-content">
                    <div class="article">
                        <h3>Гарантии</h3>
                        <p>
                            По договору мы даем гарантию того, что состояние кузова купленного автомобиля будет
                            соответствовать дефектам на кузове, отраженным в аукционном листе. Новые повреждения,
                            полученные в процессе доставки, будут компенсироваться за наш счет. На японских аукционах не
                            описывается состояние двигателя, ходовой части, агрегатов.
                        </p>
                        <p>
                            Царапины на боковых зеркалах, литых дисках или колпаках, а также мелкие дефекты не
                            отражаются на схеме повреждений, а описывается общими фразами в замечаниях инспектора
                            "Мелкие царапины и вмятины по кузову".
                        </p>
                        <p>
                            Клиент предоставляет необходимые документы. В договоре указываются параметры желаемого
                            автомобиля и реквизиты. Подписывается договор, оплачивается аванс. Начинается поиск авто на
                            аукционах. Клиенту предлагаются наиболее подходящие варианты с учетом пожеланий. После того,
                            как клиент принял решение, автомобиль выкупается. Мы транспортируем автомобиль в порт
                            Японии, грузим на судно и доставляем во Владивосток, где проходит таможенное оформление.
                            Автомобиль отправляется по всей РФ самыми надежными транспортными компаниями. Клиент
                            сообщает, где бы хотел получить автомобиль, остальное мы организуем сами.
                        </p>
                        <mark>Договор</mark>
                        <p>
                            Клиент предоставляет необходимые документы. В договоре указываются параметры желаемого
                            автомобиля и реквизиты. Подписывается договор, оплачивается аванс.
                            Начинается поиск авто на аукционах.
                        </p>
                        <mark>Поиск, подбор и покупка</mark>
                        <p>
                            Клиенту предлагаются наиболее подходящие варианты с учетом пожеланий. После того, как клиент
                            принял решение, автомобиль выкупается.
                        </p>
                        <mark>Доставка в РФ и оформление</mark>
                        <p>
                            Мы транспортируем автомобиль в порт Японии, грузим на судно и доставляем во Владивосток, где
                            проходит таможенное оформление.
                        </p>
                        <mark>Доставка до вашего города</mark>
                        <p>
                            Автомобиль отправляется по всей РФ самыми надежными транспортными компаниями. Клиент
                            сообщает, где бы хотел получить автомобиль, остальное мы организуем сами.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="static__bottom">
            <div class="container">
                <div class="seo-text">
                    <h2>Восток-Транзит</h2>
                    <p>Группа компаний «Восток Транзит» предлагает заказ автомобилей внутреннего рынка <b>Китая, Японии,
                            Южной Кореи</b> под полную пошлину. Организовываем отправку в регионы РФ. Работаем с 2005
                        года,
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
