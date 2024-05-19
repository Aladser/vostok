<?php

namespace ZLabs\BxMustache;

use ZLabs\BxMustache\Svg;

class SvgCustom extends Svg
{
    public function __construct(string $filepath)
    {
        $this->src = $filepath;
    }
}
