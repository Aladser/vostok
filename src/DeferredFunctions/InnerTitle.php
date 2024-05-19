<?php

namespace ZLabs\DeferredFunctions;

class InnerTitle extends DeferredFunctionAbstract
{
    private const TITLE_PROPERTY_CODE = 'not_show_h1';

    public static function get(...$params): string
    {
        if ('Y' === $GLOBALS['APPLICATION']->GetProperty(static::TITLE_PROPERTY_CODE, '')) {
            return '';
        }
        
        return '<div class="container"><h1 class="page-title">' . $GLOBALS['APPLICATION']->GetTitle() . '</h1></div>';
    }
}
