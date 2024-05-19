<?php

namespace ZLabs\DeferredFunctions;

class ShowNavChain extends DeferredFunctionAbstract
{
    private const PROPERTY_CODE = 'not_show_nav_chain_custom';

    public static function get(...$params): string
    {
        return 'Y' !== $GLOBALS['APPLICATION']->GetProperty(static::PROPERTY_CODE, '')
            ? '<div class="container">' . $GLOBALS['APPLICATION']->GetNavChain(...$params) . '</div>' : '';
    }
}
