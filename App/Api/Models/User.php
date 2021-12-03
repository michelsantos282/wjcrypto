<?php

namespace App\Api\Models;


/**
 * @class User
 */
class User extends Model
{
    private $id_user;
    private $acc_number;
    private $password;
    private $name;
    private $dob;
    private $phone;
    private $docNumber;
    private $auth_token;
    private $balance;

    public function __construct()
    {
        parent::setAttributes(
            "wjcrypto2.user",
            [
                "id_user",
                "acc_number",
                "password",
                "name",
                "dob",
                "phone",
                "doc_number",
                "auth_token",
                "balance"
            ]
        );
    }
    #=====================================================
    public function getUserId()
    {
        return $this->id_user;
    }

    public function setUserId($id)
    {
        $this->id_user = $id;
    }
    #=====================================================
    public function getAccNumber()
    {
        return $this->acc_number;
    }

    public function setAccNumber($accNumber)
    {
        $this->acc_number = $accNumber;
    }
    #=====================================================
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
    #=====================================================
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    #=====================================================
    public function getDob()
    {
        return $this->dob;
    }

    public function setDob($dob)
    {
        $this->dob = $dob;
    }
    #=====================================================
    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    #=====================================================
    public function getDocNumber()
    {
        return $this->docNumber;
    }

    public function setDocNumber($docNumber)
    {
        $this->docNumber = $docNumber;
    }
    #=====================================================
    public function getAuthenticationToken()
    {
        return $this->auth_token;
    }

    public function setAuthenticationToken($auth_token)
    {
        $this->auth_token = $auth_token;
    }
    #=====================================================
    public function getBalance()
    {
        return $this->balance;
    }

    public function setBalance($balance)
    {
        $this->balance = $balance;
    }
    #=====================================================


}
