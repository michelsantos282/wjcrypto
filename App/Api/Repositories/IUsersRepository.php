<?php

namespace App\Api\Repositories;

use App\Api\Models\User;

interface IUsersRepository
{
    public function create(array $validatedData);
    public function getAll();
    public function searchDataFrom(string $column, string $value);
    public function createToken(string $token, string $accNumber);
}
