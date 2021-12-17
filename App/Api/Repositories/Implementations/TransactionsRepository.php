<?php

namespace App\Api\Repositories\Implementations;

use App\Api\Models\Transaction;
use App\Api\Repositories\ITransactionsRepository;

class TransactionsRepository implements ITransactionsRepository
{

    public function deposit(array $data)
    {
        $deposit = \Helper::getContainer("Transaction");

        $deposit->setAccNumber($data["acc_number"]);
        $deposit->setAmount($data["amount"]);
        $deposit->setType("Deposito");
        $deposit->setDate(date("Y-m-d H:i:s"));
        $deposit->setFromAcc($data["acc_number"]);
        $deposit->setToAcc($data["acc_number"]);


        $depositData = [
            "acc_number" => $deposit->getAccNumber(),
            "amount" => $deposit->getAmount(),
            "type" => $deposit->getType(),
            "date" => $deposit->getDate(),
            "from_acc" => $deposit->getFromAcc(),
            "to_acc" => $deposit->getToAcc()
        ];

        $deposit->insertData($depositData);

        $deposit->clearColumnsAndTable();

        return $depositData["acc_number"];
    }

    public function withdraw(array $data)
    {
        $withdraw = \Helper::getContainer("Transaction");

        $withdraw->setAccNumber($data["acc_number"]);
        $withdraw->setAmount($data["amount"]);
        $withdraw->setType("Saque");
        $withdraw->setDate(date("Y-m-d H:i:s"));
        $withdraw->setFromAcc($data["acc_number"]);
        $withdraw->setToAcc($data["acc_number"]);


        $withdrawData = [
            "acc_number" => $withdraw->getAccNumber(),
            "amount" => $withdraw->getAmount(),
            "type" => $withdraw->getType(),
            "date" => $withdraw->getDate(),
            "from_acc" => $withdraw->getFromAcc(),
            "to_acc" => $withdraw->getToAcc()
        ];

        $withdraw->insertData($withdrawData);

        $withdraw->clearColumnsAndTable();

        return $withdrawData["acc_number"];
    }

    public function transfer(array $data)
    {
        $transfer = \Helper::getContainer("Transaction");

        $transfer->setAccNumber($data["acc_number"]);
        $transfer->setAmount($data["amount"]);
        $transfer->setType("Transfer");
        $transfer->setDate(date("Y-m-d H:i:s"));
        $transfer->setFromAcc($data["acc_number"]);
        $transfer->setToAcc($data["to_acc"]);

        $transferData = [
            "acc_number" => $transfer->getAccNumber(),
            "amount" => $transfer->getAmount(),
            "type" => $transfer->getType(),
            "date" => $transfer->getDate(),
            "from_acc" => $transfer->getFromAcc(),
            "to_acc" => $transfer->getToAcc()
        ];

        $transfer->insertData($transferData);

        $transfer->clearColumnsAndTable();

        return [
            "from_acc" => $transferData["from_acc"],
            "to_acc" => $transferData["to_acc"]
        ];
    }

    public function getUser(string $acc_number)
    {
        $user = \Helper::getContainer("User");
        $userData = $user->selectDataFrom("acc_number", $acc_number);

        $user->clearColumnsAndTable();

        if($userData) {
            return  $userData[0];
        }

        return null;
    }


    public function updateUserBalance(string $acc_number, float $amount)
    {
        $user = \Helper::getContainer("User");

        $user->updateData(["balance" => $amount], "acc_number", $acc_number);

        $user->clearColumnsAndTable();
    }
}