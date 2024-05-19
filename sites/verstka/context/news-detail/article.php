<?php

use ZLabs\BxMustache\AdaptiveImage;

ob_start();
include $_SERVER['DOCUMENT_ROOT'] . '/context/news-detail/detail-text.php';
$detailText = ob_get_clean();

$image = new AdaptiveImage();
$image->alt = 'Chery';
$image->mdSrc = '/local/assets/images/temp/news-detail/detail-mobile.png';
$image->lgSrc = '/local/assets/images/temp/news-detail/detail-tablet.png';
$image->src = '/local/assets/images/temp/news-detail/detail-desktopp.png';

return [
    'title' => 'Тест-драйв обновленного Tiggo 8 Pro Max',
    'previewText' => [
        'date' => '28 мая',
        'time' => '7 минут чтения',
        'hash' => '#Обзор'
    ],
    'detailPicture' => [
        'image' => $image,
        'description' => 'Фото: Chery'
    ],
    'text' => $detailText
];

?>