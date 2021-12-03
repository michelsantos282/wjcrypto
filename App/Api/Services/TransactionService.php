<?php

namespace App\Api\Services;

use App\Api\Repositories\ITransactionsRepository;

class TransactionService
{

    private ITransactionsRepository $repository;

    public function __construct()
    {
        $this->repository = \Helper::getContainer("TransactionsRepository");
    }

    public function deposit(array $depositData)
    {
        //Verify if user is Logged
        if(!\Helper::hasSession()){
            throw new \Exception("Você deve logar para realizar uma transação", 401);
        }

        //Get user current balance
        $user = $this->repository->getUser($depositData["acc_number"]);

        //Sets user new balance
        $newBalance =  $user->balance + $depositData["amount"];


        $accNumber = $this->repository->deposit($depositData);

        //Update user balance
        $this->repository->updateUserBalance($accNumber, $newBalance);
    }

    public function withdraw(array $depositData)
    {
        //Verify if user is Logged
        if(!\Helper::hasSession()){
            throw new \Exception("Você deve logar para realizar uma transação", 401);
        }

        //Get user current balance
        $user = $this->repository->getUser($depositData["acc_number"]);

        if($depositData["amount"] > $user->balance) {
            throw new \Exception("Você não possui esse dinheiro em conta", 403);
        }

        //Sets user new balance
        $newBalance = $user->balance - $depositData["amount"];

        $accNumber = $this->repository->withdraw($depositData);

        //Update user balance
        $this->repository->updateUserBalance($accNumber, $newBalance);
    }

    public function transfer(array $transferData)
    {
        //Verify if user is Logged
        if(!\Helper::hasSession()){
            throw new \Exception("Você deve logar para realizar uma transação", 401);
        }

        //Get user current balance
        $userFromAcc = $this->repository->getUser($transferData["acc_number"]);
        $userToAcc = $this->repository->getUser($transferData["to_acc"]);

        if($userFromAcc->acc_number === $userToAcc->acc_number) {
            throw new \Exception("Você não pode realizar uma transferência para você mesmo!", 403);
        }

        if(!$userToAcc) {
            throw new \Exception("O Usuario para o qual você quer realziar uma transferência não foi encontrado", 404);
        }

        if($transferData["amount"] > $userFromAcc->balance) {
            throw new \Exception("Você não possui esse dinheiro em conta", 403);
        }

        //Sets user new balance
        $newBalanceFromAcc = $userFromAcc->balance - $transferData["amount"];
        $newBalanceToAcc = $userToAcc->balance + $transferData["amount"];


        $accounts = $this->repository->transfer($transferData);

        //Update user balance
        $this->repository->updateUserBalance($accounts["from_acc"], $newBalanceFromAcc);
        $this->repository->updateUserBalance($accounts["to_acc"], $newBalanceToAcc);
    }
}