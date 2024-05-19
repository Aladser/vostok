<?
return [
    'composer' => [
        'value' => [
            'config_path' => 'composer.json',
        ],
        'readonly' => false,
    ],
    'monolog' =>
        array(
            'value' =>
                array(
                    'handlers' =>
                        array(
                            'currencies' =>
                                array(
                                    'class' => '\\Monolog\\Handler\\StreamHandler',
                                    'level' => 'DEBUG',
                                    'stream' => '../../logs/currencies.log',
                                ),
                        ),
                    'loggers' =>
                        array(
                            'currencies' =>
                                array(
                                    'handlers' =>
                                        array(
                                            0 => 'currencies',
                                        ),
                                ),
                        ),
                ),
            'readonly' => false,
        ),
];