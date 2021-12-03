<?php

namespace App\Api\Db;

use App\Api\Interfaces\DBInterface;
use PDO;


/**
 * DBManager
 */
class DBConnection implements DBInterface
{
    private static $conn;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(PDO $connection)
    {
        self::$conn = $connection;
    }

    /**
     * getDBConnection
     *
     * @return PDO
     */
    public static function getDBConnection(): object
    {
        return self::$conn;
    }
}
