<?php


namespace ZLabs\BxMustache\Catalog\Price;


class Price extends AbstractPrice
{
    public function __construct($value = 0, $oldValue = 0, $discount = 0)
    {
        $this->value = $value;
        $this->oldValue = $oldValue;
        $this->discount = $discount;
    }
}