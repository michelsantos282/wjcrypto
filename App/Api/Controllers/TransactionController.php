<?php

namespace App\Api\Controllers;

class TransactionController
{

    private $service;

    public function __construct()
    {
        $this->service = \Helper::getContainer("TransactionService");
    }

    public function deposit()
    {
        $request_content = json_decode(file_get_contents('php://input'));

        $depositData = [
            "acc_number" => $request_content->acc_number,
            "amount" => $request_content->amount,
        ];


        try {
            $this->service->deposit($depositData);
        } catch (\Exception $e) {
            http_response_code($e->getCode());

            $message = $e->getMessage();
            \Helper::apiResponse($message);
        }

        http_response_code(201);
        \Helper::apiResponse("Deposito Realizado com Sucesso!");
    }

    public function withdraw()
    {
        $request_content = json_decode(file_get_contents('php://input'));

        $withdrawData = [
            "acc_number" => $request_content->acc_number,
            "amount" => $request_content->amount,
        ];

        try {
            $this->service->withdraw($withdrawData);
        } catch (\Exception $e) {
            http_response_code($e->getCode());

            $message = $e->getMessage();
            \Helper::apiResponse($message);
        }

        http_response_code(201);
        \Helper::apiResponse("Saque Realizado com Sucesso!");
    }

    public function transfer()
    {
        $request_content = json_decode(file_get_contents('php://input'));

        $transferData = [
            "acc_number" => $request_content->acc_number,
            "amount" => $request_content->amount,
            "to_acc" => $request_content->to_acc,
        ];

        try {
            $this->service->transfer($transferData);
        } catch (\Exception $e) {
            http_response_code($e->getCode());

            $message = $e->getMessage();
            \Helper::apiResponse($message);
        }

        http_response_code(201);
        \Helper::apiResponse("Transferência Realizada com Sucesso!");
    }
}