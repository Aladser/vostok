<?

use ZLabs\BxMustache\AdaptiveImage;

$image = new AdaptiveImage();
$image->alt = 'арбуз';
$image->mdSrc = '/local/assets/images/temp/news-detail/arbuz-tablet.png';
$image->lgSrc = '/local/assets/images/temp/news-detail/arbuz-desktopp.png';
$image->src = '/local/assets/images/temp/news-detail/arbuz-mobile.png';
$image->realSrc = '/local/assets/images/temp/news-detail/arbuz-desktopp.png';

return [
    'image' => $image,
    'description' => 'Подпись под фото',
    'link' => '/local/assets/images/temp/news-detail/arbuz-desktopp.png'
];

?>