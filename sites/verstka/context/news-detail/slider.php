<?

use ZLabs\BxMustache\AdaptiveImage;

$image = new AdaptiveImage();
$image->alt = 'Слайд';
$image->mdSrc = '/local/assets/images/temp/news-detail/slide1-mobile.png';
$image->lgSrc = '/local/assets/images/temp/news-detail/slide1-tablet.png';
$image->src = '/local/assets/images/temp/news-detail/slide1-desktop.png';
$image->realSrc = '/local/assets/images/temp/news-detail/slide1-desktop.png';

$imageMin = new AdaptiveImage();
$imageMin->alt = 'Слайд';
$imageMin->mdSrc = '/local/assets/images/temp/news-detail/slide1-min-mobile.png';
$imageMin->lgSrc = '/local/assets/images/temp/news-detail/slide1-min-tablet.png';
$imageMin->src = '/local/assets/images/temp/news-detail/slide1-min-desktop.png';
$imageMin->realSrc = '/local/assets/images/temp/news-detail/slide1-min-desktop.png';

return [
    'index' => 1,
    'items' => collect([
        [
            'image' => $image
        ],
        [
            'image' => $image
        ],
        [
            'image' => $image
        ],
        [
            'image' => $image
        ],
        [
            'image' => $image
        ],
        [
            'image' => $image
        ],
        [
            'image' => $image
        ],
        [
            'image' => $image
        ],
        [
            'image' => $image
        ],
        [
            'image' => $image
        ],
    ]),
    'thumbs' => collect([
        [
            'image' => $imageMin
        ],
        [
            'image' => $imageMin
        ],
        [
            'image' => $imageMin
        ],
        [
            'image' => $imageMin
        ],
        [
            'image' => $imageMin
        ],
        [
            'image' => $imageMin
        ],
        [
            'image' => $imageMin
        ],
        [
            'image' => $imageMin
        ],
        [
            'image' => $imageMin
        ],
        [
            'image' => $imageMin
        ],
    ])
];

?>