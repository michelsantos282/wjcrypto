<?php

namespace App\Api\Models;

class Transaction extends Model
{

    private $id_transaction;
    private $acc_number;
    private $amount;
    private $type;
    private $date;
    private $from_acc;
    private $to_acc;

    public function __construct()
    {
        parent::setAttributes(
            "wjcrypto2.transactions",
            [
                "id_transaction",
                "acc_number",
                "amount",
                "type",
                "date",
                "from_acc",
                "to_acc",
            ]
        );
    }

    /**
     * @return mixed
     */
    public function getIdTransaction()
    {
        return $this->id_transaction;
    }

    /**
     * @param mixed $id_transaction
     */
    public function setIdTransaction($id_transaction): void
    {
        $this->id_transaction = $id_transaction;
    }

    /**
     * @return mixed
     */
    public function getAccNumber()
    {
        return $this->acc_number;
    }

    /**
     * @param mixed $acc_number
     */
    public function setAccNumber($acc_number): void
    {
        $this->acc_number = $acc_number;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getFromAcc()
    {
        return $this->from_acc;
    }

    /**
     * @param mixed $from_acc
     */
    public function setFromAcc($from_acc): void
    {
        $this->from_acc = $from_acc;
    }

    /**
     * @return mixed
     */
    public function getToAcc()
    {
        return $this->to_acc;
    }

    /**
     * @param mixed $to_acc
     */
    public function setToAcc($to_acc): void
    {
        $this->to_acc = $to_acc;
    }

}