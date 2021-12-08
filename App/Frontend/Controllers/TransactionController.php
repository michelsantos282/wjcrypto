<?php

namespace App\Frontend\Controllers;

use Jenssegers\Blade\Blade;

class TransactionController
{
    private Blade $view;

    public function __construct()
    {
        $this->view = \Helper::getContainer('ViewManager')->getViewObject();
    }

    public function transfer()
    {
        return $this->view->render("pages/transfer");
    }

    public function deposit()
    {
        return $this->view->render("pages/deposit");
    }

    public function withdraw()
    {
        return $this->view->render("pages/withdraw");
    }

}