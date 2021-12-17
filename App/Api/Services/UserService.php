<?php

namespace App\Api\Services;

use App\Api\Models\User;
use App\Api\Repositories\IUsersAddressRepository;
use App\Api\Repositories\IUsersRepository;
use Helper;

class UserService
{
    private IUsersRepository $repository;
    private IUsersAddressRepository $addressRepository;

    public function __construct()
    {;
        $this->repository = Helper::getContainer("UsersRepository");
    }

    /**
     * create
     *
     * Validate data and pass to repository
     * @param array $userData
     * @throws \Exception
     */
    public function create(array $userData, array $addressData)
    {
        $userAcc = $this->repository->searchEncryptDataFrom("acc_number", $userData["acc_number"]);
        $userDoc = $this->repository->searchEncryptDataFrom("doc_number", $userData["doc_number"]);

        if($userAcc || $userDoc) {
            throw new \Exception("Usuario ja cadastrado", 409);
        }

        foreach ($userData as $key => $value) {
            if(strlen($value) > 255) {
                throw new \Exception("O Campo $key Ultrapassou o limite de caracteres (255)", 400);
            }
        }

        $accNumber = $this->repository->create($userData);
        $addressData["acc_number"] =  $accNumber;

        $this->addressRepository = \Helper::getContainer("UsersAddressRepository");

        $this->addressRepository->create($addressData);


        return $accNumber;
    }

    /**
     * getAll
     *
     * Return all users from database
     *
     * @return array
     */
    public function getAll()
    {
        $users = $this->repository->getAll();

        return $users;
    }

    public function authenticate(array $loginData)
    {
        //Verificar se usuario existe
        $user = $this->repository->searchDataFrom("acc_number", $loginData["acc_number"]);

        if(!$user) {
            throw new \Exception("Usuário ou Senha inválidos", 403);
        }

        //Verificar se credenciais batem
        $isPasswordCorrect = password_verify($loginData['password'], $user->password);

        if(!$isPasswordCorrect) {
            throw new \Exception("Usuário ou Senha inválidos", 403);
        }

        //Criar token
        $token = $this->repository->createToken(base64_encode(random_bytes(16)), $user->acc_number);
        $_SESSION["acc_number"] = \Helper::decrypt_data($user->acc_number);
        $_SESSION["authentication_token"] = $user->auth_token;

        if(!isset($token))
        {
            throw new \Exception("Algo deu Errado!", 500);
        }
        return $token;
    }
}
