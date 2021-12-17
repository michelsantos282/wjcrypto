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
        $data = [
            'acc_number' => filter_input(INPUT_POST, 'acc_number', FILTER_SANITIZE_STRING),
            'password' => filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)
        ];

        $result = \Helper::getApiConnection('/users/authenticate', $data);


        if($result->message == "Authenticated") {
            $_SESSION['acc_number'] = $data['acc_number'];
            $_SESSION['authentication_token'] = $result->auth_token;

            \Helper::response()->redirect('/');
        } else {
            $this->showHomePage(['message' => $result->message]);
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        \Helper::response()->redirect('/');
    }

    public function create()
    {
        $session = \Helper::hasSession();
        if($session) {
            \Helper::response()->redirect('/');
        } else {
            return $this->view->render("pages/register");
        }
    }

    public function store()
    {
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

        $result = \Helper::getApiConnection('/users/create', $data);

        if(!empty($data) && \Helper::request()->getMethod() == 'post'){
            unset($data);
        }

        $this->showRegisterPage([
            'acc_number' => $result->acc_number,
            'message' => $result->message
        ]);

    }

    public function showRegisterPage(?array $params = null)
    {
        if(!empty($params)) {
            echo $this->view->render('pages/register', $params);
        } else {
            echo $this->view->render('pages/register');
        }
    }

    public function showHomePage(?array $params = null)
    {


        $session = \Helper::hasSession();
        if($session) {
            echo $this->view->render('pages/home', [
                'balance' => \Helper::getUserBalance(),
                'transactions' => \Helper::getUserTransactions()
            ]);

        } elseif(!empty($params)) {
            echo $this->view->render('pages/login', $params);

        } else {
            echo $this->view->render('pages/login');
        }
    }


}