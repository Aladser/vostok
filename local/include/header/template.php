<?

use ZLabs\Frontend\MustacheSingleton;


/** 
 * @global CMain $APPLICATION 
 * @global CUser $USER
*/

$mustache = MustacheSingleton::getInstance();

$isMainPage = CSite::InDir('/index.php');

?>

<header class="header">
    <div class="header-top">
        <div class="header__container container">
            <?= $mustache->render('header-logo', [ 'isMainPage' => $isMainPage ]); ?>

            <?= ZLabs\App::Include('header/contacts') ?>
            <?= ZLabs\App::Include('header/currency') ?>
            <?= $mustache->render('header-menu-toggle'); ?>
        </div>
    </div>
    <div class="header-nav">
        <div class="header__container container">
            <a href="#global-consul" class="header-button button button_filled_blue modal-form-link" data-fancybox>Консультация</a>
            <?= ZLabs\App::Include('header/menu') ?>

            <? if(!$USER->IsAuthorized()): ?>      
                <a href="/bitrix/admin" class="header-person">
                    <svg class="header-person__icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 16 16"><path fill="#2C3346" stroke="#2C3346" stroke-width=".3" d="M13.415 10.165a7.229 7.229 0 0 0-2.763-1.762 4.291 4.291 0 0 0 1.825-3.521c0-2.356-1.886-4.273-4.204-4.273-2.319 0-4.205 1.917-4.205 4.273 0 1.46.724 2.75 1.826 3.521a7.229 7.229 0 0 0-2.764 1.762A7.404 7.404 0 0 0 1 15.39h1.136c0-3.438 2.753-6.236 6.137-6.236 3.383 0 6.136 2.798 6.136 6.236h1.136c0-1.974-.756-3.83-2.13-5.226ZM8.273 8C6.58 8 5.205 6.601 5.205 4.882c0-1.72 1.376-3.118 3.068-3.118 1.692 0 3.068 1.398 3.068 3.118S9.965 8 8.273 8Z"></path></svg>
                    <span class="header-person__text">Войти</span>
                </a>
            <? endif ?>
        </div>
</header>