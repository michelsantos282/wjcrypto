<?php

namespace App\Api\Logger;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class LogManager
{
    private static Logger $logger;

    public function __construct(Logger $logger)
    {
        self::$logger = $logger;
    }

    public function log($message, $mode = 'info')
    {
        self::$logger->pushHandler(new StreamHandler(__DIR__ . '/logs.txt'));

        switch ($mode) {
            case 'info':
                self::$logger->info($message);
                break;
            case 'warning':
                self::$logger->warning($message);
                break;
            case 'error':
                self::$logger->error($message);
                break;
            case 'debug':
                self::$logger->debug($message);
                break;
            case 'critical':
                self::$logger->critical($message);
                break;
            case 'alert':
                self::$logger->alert($message);
                break;
            case 'emergency':
                self::$logger->emergency($message);
                break;
        }
    }
}