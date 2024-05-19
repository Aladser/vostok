<?php

namespace ZLabs\DeferredFunctions;

class ShowTextFormatting extends DeferredFunctionAbstract
{
    private const TEXT_FORMATTING_PROPERTY_CODE = 'not_show_text_formatting';

    public static function get(...$params): string
    {
        return $GLOBALS['APPLICATION']->GetProperty(static::TEXT_FORMATTING_PROPERTY_CODE) === 'Y' ?
            '' :
            '<div class="article">';
    }

    public static function getFooter(...$params): string
    {
        return $GLOBALS['APPLICATION']->GetProperty(static::TEXT_FORMATTING_PROPERTY_CODE) === 'Y' ?
            '' :
            '</div>';
    }

    public static function showHead(...$params)
    {
        return $GLOBALS['APPLICATION']->AddBufferContent([static::class, 'get'], ...$params);
    }

    public static function showFooter(...$params)
    {
        return $GLOBALS['APPLICATION']->AddBufferContent([static::class, 'getFooter'], ...$params);
    }

}
