<?php

namespace App\Api\Models;

/**
 * User address class
 * @class UserAddress
 */
class UserAddress extends Model
{

    private $id_address;
    private $acc_number;
    private $postcode;
    private $country;
    private $state;
    private $city;
    private $street;
    private $number;
    private $complement;
    private $reference;


    public function __construct()
    {
        parent::setAttributes(
            "wjcrypto2.user_address",
            [
                "id_address",
                "acc_number",
                "postcode",
                "country",
                "state",
                "city",
                "street",
                "number",
                "complement",
                "reference"
            ]
        );
    }

    /**
     * @return int
     */
    public function getIdAddress(): int
    {
        return $this->id_address;
    }

    /**
     * @param int $id_address
     * @return void
     */
    public function setIdAddress(int $id_address): void
    {
        $this->id_address = $id_address;
    }

    /**
     * @return string
     */
    public function getAccNumber(): string
    {
        return $this->acc_number;
    }

    /**
     * @param string $acc_number
     * @return void
     */
    public function setAccNumber(string $acc_number): void
    {
        $this->acc_number = $acc_number;
    }

    /**
     * @return string
     */
    public function getPostcode(): string
    {
        return $this->postcode;
    }

    /**
     * @param string $postcode
     * @return void
     */
    public function setPostcode(string $postcode): void
    {
        $this->postcode = $postcode;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return void
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return string
     *
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     * @return void
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return void
     *
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     * @return void
     *
     */
    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    /**
     * @return int
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return void
     */
    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    /**
     * @return string|void
     */
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * @param string $complement
     * @return void
     */
    public function setComplement(string $complement = null): void
    {
        $this->complement = $complement;
    }

    /**
     * @return string|void
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     * @return void
     *
     */
    public function setReference(string $reference = null): void
    {
        $this->reference = $reference;
    }


}