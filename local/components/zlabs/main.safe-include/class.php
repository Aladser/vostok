<?php

namespace ZLabs\Main;

class SafeIncludeComponent extends \CBitrixComponent
{
    public function executeComponent()
    {
        $this->includeComponentTemplate();
    }
}
