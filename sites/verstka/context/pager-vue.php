<?php

use ZLabs\BxMustache\Pagination\Pagination;
use ZLabs\BxMustache\Pagination\Item;

$pagination = new Pagination;

$pagination->id = '1';
$pagination->infinite_btn_text = 'Загрузить еще';
$pagination->compId = 'products-list';

$pagination->nextLink = new Item();
$pagination->nextLink->index = '2';

return $pagination;
