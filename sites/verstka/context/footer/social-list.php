<?php

use ZLabs\BxMustache\SvgCustom;

return [
    'items' => collect([
        [
            'href' => '#',
            'icon' => new SvgCustom('/local/assets/images/icons/social/rutube.svg'),
            'isWide' => true
        ],
        [
            'href' => '#',
            'icon' => new SvgCustom('/local/assets/images/icons/social/youtube.svg'),
            'isWide' => false
        ],
        [
            'href' => '#',
            'icon' => new SvgCustom('/local/assets/images/icons/social/vk.svg'),
            'isWide' => false
        ],
        [
            'href' => '#',
            'icon' => new SvgCustom('/local/assets/images/icons/social/tg.svg'),
            'isWide' => false
        ],
    ])
];
