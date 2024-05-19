<?php


namespace ZLabs\BxMustache\Catalog\Price;


use JetBrains\PhpStorm\Pure;
use ZLabs\Models\Currencies\CurrenciesTable;

class Price2Currencies
{
    public Price $basePrice;
    public Price $additionalPrice;

    public function __construct($baseValue = 0, $baseOldValue = 0, $baseDiscount = 0)
    {
        $this->createBasePrice($baseValue, $baseOldValue, $baseDiscount);
        $this->createAdditionalPrice();
    }

    protected function createBasePrice($baseValue = 0, $baseOldValue = 0, $baseDiscount = 0)
    {
        $this->basePrice = new Price($baseValue, $baseOldValue, $baseDiscount);

        $this->basePrice->currency = '¥';
    }

    protected function createAdditionalPrice()
    {
        $currenciesValue = CurrenciesTable::getLastCurrenciesInfo();
        $this->additionalPrice = new Price();

        if ($currenciesValue['UF_CNY']) {
            if ($this->basePrice->value) $this->additionalPrice->value = static::calculateRublePrice($this->basePrice->value, (float)$currenciesValue['UF_CNY']);
            if ($this->basePrice->oldValue) $this->additionalPrice->value = static::calculateRublePrice($this->basePrice->oldValue, (float)$currenciesValue['UF_CNY']);
            if ($this->basePrice->discount) $this->additionalPrice->discount = $this->basePrice->discount;
        }

        $this->additionalPrice->currency = '₽';
    }

    #[Pure] static public function calculateRublePrice($base = 0, $currency = 0): int
    {
        $value = $base * $currency;

        if ($value >= 1000000) {
            $value = ceil($value / 1000) * 1000;
        }

        return $value;
    }
}