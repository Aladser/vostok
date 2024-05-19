<?php

ob_start();
include $_SERVER['DOCUMENT_ROOT'] . '/context/detail/tabs/content-1.php';
$content1 = ob_get_clean();

ob_start();
include $_SERVER['DOCUMENT_ROOT'] . '/context/detail/tabs/content-2.php';
$content2 = ob_get_clean();

ob_start();
include $_SERVER['DOCUMENT_ROOT'] . '/context/detail/tabs/content-3.php';
$content3 = ob_get_clean();

ob_start();
include $_SERVER['DOCUMENT_ROOT'] . '/context/detail/tabs/content-4.php';
$content4 = ob_get_clean();

return [
    'tabs' => collect([
        [
            'id' => 'chars',
            'name' => 'Технические  характеристики',
            'active' => true,
            'content' => $content1
        ],
        [
            'id' => 'docs',
            'name' => 'Документы',
            'active' => false,
            'content' => $content2
        ],
        [
            'id' => 'delivery',
            'name' => 'Доставка и оплата',
            'active' => false,
            'content' => $content3
        ],
        [
            'id' => 'faq',
            'name' => 'Частые вопросы',
            'active' => false,
            'content' => $content4
        ],
    ])
];