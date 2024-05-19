<?php

namespace ZLabs;

class SiteFacade
{
    protected $arSiteFromConfig;
    protected $arBxSite;
    protected $isCurrent;

    /**
     * SiteFacade constructor.
     * @param $arSiteFromConfig
     * @param $arBxSite
     * @param $isCurrent
     */
    public function __construct($arSiteFromConfig, $arBxSite, $isCurrent = false)
    {
        $this->arSiteFromConfig = $arSiteFromConfig;
        $this->arBxSite = $arBxSite;
        $this->isCurrent = $isCurrent;
    }

    /**
     * @return bool
     */
    public function isCurrent(): bool
    {
        return $this->isCurrent;
    }

    public function getText()
    {
        return $this->arSiteFromConfig['text'];
    }

    public function getSiteUrl()
    {
        return $this->arSiteFromConfig['protocol'] . $this->arBxSite['SERVER_NAME'];
    }

    public function getSiteName()
    {
        return $this->arBxSite['NAME'];
    }

    public function getIBlockId($code)
    {
        return (int)$this->arSiteFromConfig[$code.'_ib'];
    }

    public function isRu()
    {
        return $this->arSiteFromConfig['text'] === 'Ru';
    }

    public function isEng()
    {
        return $this->arSiteFromConfig['text'] === 'Eng';
    }

    public function getEventsFormatOnlineId()
    {
        return $this->arSiteFromConfig['events_prop_format_online_id'];
    }

    public function getEventsFormatOfflineId()
    {
        return $this->arSiteFromConfig['events_prop_format_offline_id'];
    }

    public function getEventsDateTypeId()
    {
        return $this->arSiteFromConfig['events_prop_date_type_anons_id'];
    }

}
