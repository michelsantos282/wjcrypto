<?php

namespace App\Api\Interfaces;


interface ModelInterface
{
    public static function setAttributes(string $tableName, array $columns);

    public static function selectDataFrom(string $column, $value);

    public static function selectAllData();

    public static function insertData(array $data);

    public static function updateData(array $data, string $whereColumn, $whereValue);

    public static function deleteData(string $columns, string $value);
}
