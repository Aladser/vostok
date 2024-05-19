<?php


namespace ZLabs\Components;


use ZLabs\BxMustache\ItemInterface;
use ZLabs\Components\Helpers\Hermitage;
use ZLabs\Components\Traits\HermitageTrait;
use ZLabs\BxMustache\BaseItem;

class BaseItemFactory implements FactoryMethodInterface
{
    use HermitageTrait;

    protected BaseItem $instance;
    protected array $arBxItem;

    public function __construct($arBxItem, Hermitage $hermitage = null)
    {
        $this->arBxItem = $arBxItem;
        if ($hermitage) $this->hermitage = $hermitage;

        $this->obtainResizers();
    }

    protected function obtainResizers()
    {

    }

    public function create(): ItemInterface
    {
        $this->createBase();

        return $this->instance;
    }

    protected function createBase()
    {
        $this->createInstance();
        $this->createHermitage();
        $this->createId();
        $this->createTitle();
        $this->createDetailPageUrl();
    }

    protected function createInstance()
    {
        $this->instance = new BaseItem();
    }

    protected function createHermitage()
    {
        if ($this->hermitage) $this->instance->strMainId = $this->hermitage();
    }

    protected function createId()
    {
        $this->instance->id = $this->arBxItem['ID'];
    }

    protected function createTitle()
    {
        $this->instance->title = $this->arBxItem['NAME'];
    }

    protected function createPreviewText()
    {
        $this->instance->text = $this->arBxItem['~PREVIEW_TEXT'];
    }

    protected function createDetailText()
    {
        $this->instance->text = $this->arBxItem['~DETAIL_TEXT'];
    }

    protected function createDetailPageUrl()
    {
        $this->instance->detailPageUrl = $this->arBxItem['DETAIL_PAGE_URL'];
    }
}