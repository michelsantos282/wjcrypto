<?php

namespace App\Api\Repositories;

interface IUsersAddressRepository
{
    public function create(array $addressData);
    public function searchAddrByAccNumber(string $accNumber);
    public function searchAccNumber(string $accNumber);
}