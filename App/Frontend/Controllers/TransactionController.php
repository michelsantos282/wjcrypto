<?php

namespace App\Frontend\Controllers;

use Jenssegers\Blade\Blade;
use Pecee\Http\Request;

class TransactionController
{
    private Blade $view;

    public function __construct()
    {
        $this->view = \Helper::getContainer('ViewManager')->getViewObject();
    }


    public function depositPost()
    {
        $data = [
            'acc_number' => $_SESSION['acc_number'],
            'amount' => filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_STRING)
        ];

       $result = \Helper::getApiConnection("/transactions/deposit", $data);

       $newBalance = \Helper::getUserBalance();

       $this->showDepositPage($result->message, $newBalance);

    }

    public function withdrawPost()
    {
        $data = [
            'acc_number' => $_SESSION['acc_number'],
            'amount' => filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_STRING)
        ];

        $result = \Helper::getApiConnection("/transactions/withdraw", $data);

        $newBalance = \Helper::getUserBalance();

        $this->showWithdrawPage($result->message, $newBalance);
    }

    public function transferPost()
    {
        $data = [
            'acc_number' => $_SESSION['acc_number'],
            'amount' => filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_STRING),
            'to_acc' => filter_input(INPUT_POST, 'to_acc', FILTER_SANITIZE_STRING)
        ];

        $result = \Helper::getApiConnection("/transactions/transfer", $data);

        $newBalance = \Helper::getUserBalance();

        $this->showTransferPage($result->message, $newBalance);

    }

    public function showTransferPage($message = null, $newBalance = null)
    {
        $balance = \Helper::getUserBalance();

        if(!empty($message) && !empty($newBalance)) {
            echo $this->view->render(
                'pages/transfer',
                [
                    'balance' => $newBalance,
                    'message' => $message
                ]
            );
        } elseif(!empty($message) && empty($newBalance)) {
            echo $this->view->render(
                'pages/transfer',
                [
                    'balance' => $balance,
                    'message' => $message
                ]
            );
        } else {
            echo $this->view->render('pages/transfer', ['balance' => $balance]);
        }
    }

    public function showDepositPage($message = null, $newBalance = null)
    {
        $balance = \Helper::getUserBalance();
        if(!empty($message) && !empty($newBalance)) {
            echo $this->view->render(
                'pages/deposit',
                [
                    'balance' => $newBalance,
                    'message' => $message
                ]
            );
        } elseif(!empty($message) && empty($newBalance)) {
            echo $this->view->render(
                'pages/deposit',
                [
                    'balance' =>$balance,
                    'message' => $message
                ]
            );
        } else {
            echo $this->view->render('pages/deposit', ['balance' => $balance]);
        }
    }

    public function showWithdrawPage($message = null, $newBalance = null)
    {
        $balance = \Helper::getUserBalance();

        if(!empty($message) && isset($newBalance)) {
            echo $this->view->render(
                'pages/withdraw',
                [
                    'balance' => $newBalance,
                    'message' => $message
                ]
            );
        } elseif(!empty($message) && empty($newBalance)) {
            echo $this->view->render(
                'pages/withdraw',
                [
                    'balance' => $balance,
                    'message' => $message
                ]
            );
        } else {
            echo $this->view->render('pages/withdraw', ['balance' => $balance]);
        }
    }
}