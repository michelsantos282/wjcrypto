<?php

namespace App\Api\Repositories;

interface ITransactionsRepository
{

    public function deposit(array $data);
    public function withdraw(array $data);
    public function transfer(array $data);
    public function getUser(string $acc_number);
    public function updateUserBalance(string $acc_number, float $amount);
}