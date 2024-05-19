<?php

error_reporting(E_ERROR | E_PARSE);

use ZLabs\Frontend\MustacheSingleton;

require_once $_SERVER['DOCUMENT_ROOT'] . '/../../vendor/autoload.php';

$mustache = MustacheSingleton::getInstance();

$pageConfig = [
    'meta' => [
        'title' => 'Восток Транзит: О компании',
    ],
    'title' => 'О компании',
    'isMainPage' => false,
    'pageClass' => 'page_inner',
    'mainClass' => 'main about',
    'inlineCss' => collect([
        '/local/assets/local/bundle-common/bundle-common.css',
        '/local/assets/local/bundle-feedback-form/bundle-feedback-form.css',
        '/local/assets/local/bundle-about/bundle-about.css',
    ]),
    'inlineJs' => collect([]),
    'deferredCss' => collect([]),
    'deferredJs' => collect([
        '/local/assets/local/bundle-common/bundle-common.js',
        '/local/assets/local/bundle-about/bundle-about.js',
        '/local/assets/local/bundle-feedback-form/bundle-feedback-form.js',
    ]),
    'asyncJs' => collect([])
];

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/header.php');

?>
<main class="<?= $pageConfig['mainClass'] ?>">
    <div class="container">
        <?= $mustache->render('breadcrumbs', include $_SERVER['DOCUMENT_ROOT'] . '/context/about/breadcrumbs.php'); ?>
    </div>
    <?= $mustache->render('about-top', include $_SERVER['DOCUMENT_ROOT'] . '/context/about/top.php'); ?>
    <div class="container">
        <?= $mustache->render('index-company', include $_SERVER['DOCUMENT_ROOT'] . '/context/about/about-company.php'); ?>
        <div class="article">
            <h2>О компании</h2>
            <p>
                Группа компаний «Восток Транзит» предлагает заказ автомобилей 
                внутреннего рынка <b>Китая, Японии, Южной Кореи</b> под полную пошлину. 
                Организовываем отправку в регионы РФ. Работаем с 2005 года, являясь 
                одной из старейших и крупнейших компаний в этой сфере. За это время 
                мы отправили тысячи  автомобилей из Азии в разные регионы России. 
                Получили сотни хороших отзывов от клиентов, многие из которых стали 
                нашими постоянными заказчиками.
            </p>
            <p>
                Так, популярный кроссовер Chery Tiggo 8 стоит в России от 2,48 миллиона 
                рублей, и государственные субсидии на него не распространяются. 
                В Китае его стоимость при переводе в рубли — менее 900 тысяч, 
                таможенные платежи составят чуть более 400 тысяч рублей, так что 
                даже с учетом доставки и прочих расходов получается заметная экономия. 
                По оценкам фирм, специализирующихся на такой услуге, дисконт выходит на 
                уровне 30%, а это в нынешних ценах — почти миллион.
            </p>
        </div>
        <?= $mustache->render('about-how-work'); ?>
    </div>
    <div class="about-form-container">
        <?= $mustache->render('ask-form', include $_SERVER['DOCUMENT_ROOT'] . '/context/forms/ask-form.php'); ?>
    </div>
</main>
<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/footer.php');