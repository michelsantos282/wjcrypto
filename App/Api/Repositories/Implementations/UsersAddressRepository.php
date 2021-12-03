<?php

namespace App\Api\Repositories\Implementations;

use App\Api\Models\User;
use App\Api\Models\UserAddress;
use App\Api\Repositories\IUsersAddressRepository;

class UsersAddressRepository implements IUsersAddressRepository
{

    private UserAddress $userAddress;
    private User $user;

    public function __construct()
    {
        $this->userAddress = \Helper::getContainer("UserAddress");
    }

    /**
     * Creates a new user address
     * @param array $addressData
     */
    public function create(array $addressData)
    {
        $accNumber = $addressData["acc_number"];
        foreach ($addressData as $key => $value) {
            if (!$value == null) {
                $addressData[$key] = \Helper::encrypt_data($value);
            }
        }

        $this->userAddress->setAccNumber($accNumber);
        $this->userAddress->setPostcode($addressData["postcode"]);
        $this->userAddress->setCountry($addressData["country"]);
        $this->userAddress->setState($addressData["state"]);
        $this->userAddress->setCity($addressData["city"]);
        $this->userAddress->setStreet($addressData["street"]);
        $this->userAddress->setNumber($addressData["number"]);
        $this->userAddress->setComplement($addressData["complement"]);
        $this->userAddress->setReference($addressData["reference"]);

        $userAddressData = [
            "acc_number" =>  $this->userAddress->getAccNumber(),
            "postcode"   =>  $this->userAddress->getPostcode(),
            "country"    =>  $this->userAddress->getCountry(),
            "state"      =>  $this->userAddress->getState(),
            "city"       =>  $this->userAddress->getCity(),
            "street"     =>  $this->userAddress->getStreet(),
            "number"     =>  $this->userAddress->getNumber(),
            "complement" =>  $this->userAddress->getComplement(),
            "reference"  =>  $this->userAddress->getReference()
        ];

        $this->userAddress->insertData($userAddressData);
    }

    /**
     * Search for an address with accNumber
     * @param string $accNumber
     */
    public function searchAddrByAccNumber(string $accNumber)
    {
        $user = $this->userAddress->selectDataFrom("acc_number", $accNumber);

        if($user) {
            return $user[0];
        }

        return null;
    }

    public function searchAccNumber(string $accNumber)
    {
        $user = $this->user->selectDataFrom("acc_number", $accNumber);

        if($user) {
            return $user[0];
        }

        return null;
    }
}