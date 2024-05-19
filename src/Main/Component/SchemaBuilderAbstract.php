<?php


namespace ZLabs\Main\Component;

class SchemaBuilderAbstract
{
    const SCHEMA_TYPE = "";
    const SITE_URL = 'https://' . SITE_SERVER_NAME;

    /** @var array $schema */
    protected array $schema = [];

    public function create()
    {
        $this->schema = [
            "@context" => "http://schema.org/",
            "@type" => self::SCHEMA_TYPE,
        ];
    }

    public function getSchema(): string
    {
        if ($this->schema) {
            return static::obtainProlog() . json_encode($this->schema) . static::obtainEpilog();
        }

        return "";
    }

    protected function obtainProlog(): string
    {
        return '<script type="application/ld+json" data-skip-moving="true">';
    }

    protected function obtainEpilog(): string
    {
        return '</script>';
    }
}
