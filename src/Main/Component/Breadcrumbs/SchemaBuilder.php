<?php

namespace ZLabs\Main\Component\Breadcrumbs;

use ZLabs\Main\Component\SchemaBuilderAbstract;

class SchemaBuilder extends SchemaBuilderAbstract
{
    public const SCHEMA_TYPE = "BreadcrumbList";

    /** @var array $arBxItems */
    protected array $arBxItems;

    public function __construct($arBxItems)
    {
        $this->arBxItems = $arBxItems;
    }

    public function create()
    {
        $this->schema = [
            "@context" => "https://schema.org/",
            "@type" => $this::SCHEMA_TYPE,
            "itemListElement" => collect($this->arBxItems)->values()->map(function ($arNav, $index) {
                return [
                    "@type" => "ListItem",
                    "position" => $index + 1,
                    "name" => $arNav['TITLE'],
                    "item" => self::SITE_URL . $arNav["LINK"]
                ];
            })->toArray()
        ];
    }
}
