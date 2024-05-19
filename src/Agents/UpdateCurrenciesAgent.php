<?php


namespace ZLabs\Agents;


use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use Bitrix\Main\Type\DateTime;
use Notamedia\ConsoleJedi\Agent\Agent;
use Notamedia\ConsoleJedi\Agent\AgentTask;
use ZLabs\Models\Currencies\CurrenciesUpdate;

class UpdateCurrenciesAgent extends Agent
{
    public static function buildAgent()
    {
        $executionTime = DateTime::createFromTimestamp(time());

        $executionTime->setTimeZone(new \DateTimeZone('Etc/GMT+9'));
        $executionTime->setTime(3, 0);

        AgentTask::build()
            ->setClass(__CLASS__)
            ->setCallChain(['run' => []])
            ->setExecutionTime($executionTime)
            ->setModule('main')
            ->setInterval(6 * 3600)
            ->setPeriodically(true)
            ->setUserId(1)
            ->setActive(true)
            ->setSort(10)
            ->create();
    }

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @throws LoaderException
     */
    protected function loadModules()
    {
        Loader::includeModule('highloadblock');
    }

    protected function execute(): string
    {
        $this->synchronize();

        return $this->getAgentName(['run' => []]);
    }

    protected function synchronize()
    {
        $this->loadModules();

        $currenciesUpdate = new CurrenciesUpdate();

        $currenciesUpdate->update();
    }
}