<?
global $APPLICATION;

use ZLabs\Frontend\MustacheSingleton;

$mustache = MustacheSingleton::getInstance();
?>


<? if (!$_COOKIE['alertCookie'] || $_COOKIE['alertCookie'] !== 'y') : ?>
    <?= $mustache->render('cookie-alert', [
        'text' => 'Мы используем cookies для быстрой и удобной работы сайта. Продолжая пользоваться сайтом, вы принимаете условия обработки персональных данных',
        'link' => [
            'href' => '#',
            'text' => 'Узнать больше о cookies'
        ]
    ]) ?>
<? endif; ?>