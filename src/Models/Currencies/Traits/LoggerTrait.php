<?php


namespace ZLabs\Models\Currencies\Traits;

use Monolog\Registry;
use Monolog\Logger;

trait LoggerTrait
{
    protected Logger $logger;

    protected function createLogger()
    {
        $this->logger = Registry::getInstance('currencies');
    }
}