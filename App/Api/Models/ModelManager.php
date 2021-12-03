<?php

namespace App\Api\Models;

use App\Api\Db\DBConnection;

use App\Api\Interfaces\DBInterface;

/**
 * Class gets a connection from database
 * @class ModelManager
 */
class ModelManager
{
    protected static DBConnection $connection;

    public function __construct(DBInterface $connection)
    {
        self::$connection = $connection;
    }
}
