<?php

namespace ZLabs\DeferredFunctions;

class PreloadImage extends DeferredFunctionAbstract
{
    private const PRELOAD_IMAGE_PROPERTY_CODE = 'preload_image';

    public static function get(...$params): string
    {
        return $GLOBALS['APPLICATION']->GetProperty(static::PRELOAD_IMAGE_PROPERTY_CODE) ?
            '<link rel="preload" as="image" crossorigin href="' . $GLOBALS['APPLICATION']->GetProperty(static::PRELOAD_IMAGE_PROPERTY_CODE) . '">':
            '';
    }
}
