<?php

namespace App\Api\Interfaces;

interface DBInterface
{
    public static function getDBConnection(): object;
}
