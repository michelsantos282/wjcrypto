<?php

namespace App\Frontend\Controllers;

use Jenssegers\Blade\Blade;

class UserController
{

    private Blade $view;

    public function __construct()
    {
        $this->view = \Helper::getContainer('ViewManager')->getViewObject();
    }


    public function index()
    {
        return $this->view->render("pages/home");
    }

    public function login()
    {
        return $this->view->render("pages/login");
    }

    public function create()
    {
        return $this->view->render("pages/register");
    }

    public function store()
    {

        $client = new Client();

        $data = [
            'user' => [
                'name' => filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING),
                'phone' => filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING),
                'doc_number' => filter_input(INPUT_POST, 'doc_number', FILTER_SANITIZE_STRING),
                'dob' => filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING),
                'password' => filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)
            ],
            'address' => [
                'postcode' => filter_input(INPUT_POST, 'postcode', FILTER_SANITIZE_STRING),
                'country' => filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING),
                'state' => filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING),
                'city' => filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING),
                'street' => filter_input(INPUT_POST, 'street', FILTER_SANITIZE_STRING),
                'number' => filter_input(INPUT_POST, 'number', FILTER_SANITIZE_STRING),
                'complement' => filter_input(INPUT_POST, 'complement', FILTER_SANITIZE_STRING),
                'reference' => filter_input(INPUT_POST, 'complement', FILTER_SANITIZE_STRING),
            ]
        ];

    }
}