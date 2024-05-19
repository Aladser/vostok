<?php

namespace ZLabs\BxMustache\Catalog\Price;


use DateTime;
use DateInterval;
use JetBrains\PhpStorm\Pure;

abstract class AbstractPrice
{
    public float $value = 0;
    public float $oldValue = 0;
    public float $discount = 0;
    public string $currency = '';
    public string $measure = '';
    public string $unit = '';

    public function show(): string
    {
        return "{$this->format($this->value)}";
    }

    public function showOld(): string
    {
        return "{$this->format($this->oldValue)}";
    }

    public function showDiscount(): string
    {
        return "{$this->format($this->discount)}";
    }

    public function showWithMeasure(): string
    {
        return "{$this->format($this->value)} {$this->measure}";
    }

    public function showOldWithMeasure(): string
    {
        return "{$this->format($this->oldValue)} {$this->measure}";
    }

    public function showDiscountWithMeasure(): string
    {
        return "{$this->format($this->discount)} {$this->measure}";
    }

    public function showWithCurrency(): string
    {
        return "{$this->format($this->value)} {$this->currency}";
    }

    public function showOldWithCurrency(): string
    {
        return "{$this->format($this->oldValue)} {$this->currency}";
    }

    public function showDiscountWithCurrency(): string
    {
        return "{$this->format($this->discount)} {$this->currency}";
    }

    #[Pure] public function format($value): string
    {
        return (int)$value > 0 ? number_format($value, 0, '.', ' ') : '';
    }
}
