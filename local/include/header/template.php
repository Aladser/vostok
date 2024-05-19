<?

use ZLabs\Frontend\MustacheSingleton;


/** @global CMain $APPLICATION */

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
        </div>
    </div>
</header>