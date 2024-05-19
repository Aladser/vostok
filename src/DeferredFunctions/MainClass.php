<?php

namespace ZLabs\DeferredFunctions;

class MainClass extends DeferredFunctionAbstract
{
    private const TITLE_PROPERTY_CODE = 'main_class';

    public static function get(...$params): string
    {
        return $GLOBALS['APPLICATION']->GetProperty(static::TITLE_PROPERTY_CODE) ?
            ' ' . $GLOBALS['APPLICATION']->GetProperty(static::TITLE_PROPERTY_CODE) :
            ' static';
    }

}
