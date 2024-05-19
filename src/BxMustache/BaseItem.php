<?php


namespace ZLabs\BxMustache;


use ZLabs\BxMustache\Traits\DetailPageUrl;

class BaseItem implements ItemInterface
{
    use DetailPageUrl, HermitageTrait;

    public string $id = "";
    public string $title = "";
    public string $text = "";
    public Image $image;
}