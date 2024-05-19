<?php

use ZLabs\BxMustache\Link;

$item['nextLink'] = new Link();

$item['compId'] = 'blog-list';
$item['nextLink']->href = '/ajax/blog/list.php';
$item['infinite_btn_text'] = 'Загрузить еще';

return $item;