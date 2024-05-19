<?php

use ZLabs\BxMustache\BreadcrumbsLink;

$breadcrumbs = collect([
    'Главная',
    'Каталог автомобилей'
]);

$breadcrumbs = $breadcrumbs->map(function ($text, $index) use ($breadcrumbs) {
    $link = new BreadcrumbsLink;

    $link->href = '#';
    $link->text = $text;
    $link->isLast = $index === ($breadcrumbs->count() - 1);

    return $link;
});

return [
    'breadcrumbs' => [
        'prevLink' => $breadcrumbs->count() > 2 ? $breadcrumbs->get(1) : $breadcrumbs->get(0),
        'items' => $breadcrumbs,
    ]
];