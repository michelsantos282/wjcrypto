<?php

namespace App\Api\Controllers;

use Helper;

class UserController
{
    private $service;
    private $logger;

    public function __construct()
    {
        $this->service = Helper::getContainer("UsersService");
        $this->logger = Helper::getContainer("LogManager");
    }

    /**
     * Receives a request and pass data to service
     */
    public function create()
    {
        $request_content = json_decode(file_get_contents('php://input'));

        $accNumber = rand(1000, 9999);

        $userData = [
            "acc_number" => $accNumber,
            "password" => $request_content->user->password,
            "name" => $request_content->user->name,
            "dob" => $request_content->user->dob,
            "phone" => $request_content->user->phone,
            "doc_number" => $request_content->user->doc_number
        ];

        $addressData = [
            "postcode" => $request_content->address->postcode,
            "country" => $request_content->address->country,
            "state" => $request_content->address->state,
            "city" => $request_content->address->city,
            "street" => $request_content->address->street,
            "number" => $request_content->address->number ,
            "complement" => $request_content->address->complement ?? null,
            "reference" => $request_content->address->reference ?? null
        ];

        try {
            $accNumber = $this->service->create($userData, $addressData);
        }catch (\Exception $e) {
            http_response_code($e->getCode());

            $message = $e->getMessage();

            $this->logger->log("Create User: " .$message);
            Helper::apiResponse($message);
        }

        http_response_code(201);
        Helper::apiResponse("Usuário criado com sucesso!","acc_number", $accNumber);
    }

    /**
     * Authenticate an user an returns an auth token
     *
     * @return string
     */
    public function authenticate()
    {
        $request_content = json_decode(file_get_contents('php://input'));

        $loginData = [
            "acc_number" => $request_content->acc_number,
            "password" => $request_content->password
        ];

        try {
            $token = $this->service->authenticate($loginData);
        }catch (\Exception $e){
            http_response_code($e->getCode());

            $message = $e->getMessage();

            $this->logger->log("Authenticate User: " .$message);
            Helper::apiResponse($message);
        }

        http_response_code(200);
        Helper::apiResponse("Authenticated", "auth_token", $token);
    }

    public function logout()
    {
        session_unset();
        session_destroy();
    }
}
