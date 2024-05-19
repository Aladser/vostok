<?php

namespace ZLabs;

use Illuminate\Support\Collection;
use InvalidArgumentException;
use Bitrix\Main\Config\Configuration;
use Bitrix\Main\Context;
use CSite;

final class Sites
{
    private static $instance = null;
    private $sites;

    public static function getInstance(): Sites
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    private function __construct()
    {
        $bxSites = $this->getBxSites();

        $this->sites = collect(Configuration::getInstance()->get('sites'))
            ->map(function ($arSiteFromConfig, $id) use ($bxSites) {
                return (new SiteFacade(
                    $arSiteFromConfig,
                    $bxSites->get($id),
                    $id === Context::getCurrent()->getSite()
                ));
            });
    }

    private function getBxSites()
    {
        $bxSites = collect();

        $iterator = CSite::GetList($order, $by);
        while ($arSite = $iterator->Fetch()) {
            $bxSites->push($arSite);
        }

        return $bxSites->keyBy('ID');
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    public function currentSite(): SiteFacade
    {
        return $this->sites->get(Context::getCurrent()->getSite());
    }

    /**
     * @param $id
     * @return SiteFacade
     */
    public function getSite($id): SiteFacade
    {
        if ($this->sites->get($id) === null) {
            throw new InvalidArgumentException('Site not found');
        }

        return $this->sites->get($id);
    }

    /**
     * @return Collection
     */
    public function getSites(): Collection
    {
        return $this->sites;
    }
}
