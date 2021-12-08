<?php

namespace App\Api\Middlewares;

use App\Api\Models\User;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class AuthMiddleware implements IMiddleware
{
    private User $user;

    public function __construct()
    {
        $this->user = \Helper::getContainer('User');
    }

    public function handle(Request $request): void
    {
        $authentication_token = $_SESSION['authentication_token'];

        $userData = $this->user->selectDataFrom('acc_number', \Helper::encrypt_data($_SESSION['acc_number']));

        if(empty($authentication_token) || $authentication_token != $userData[0]->auth_token) {
            header('WWW-Authenticate: Bearer realm="Access Denied"');
            http_response_code(401);

            \Helper::response()->redirect('/');
        } else {
            header('WWW-Authenticate: Bearer ' . $authentication_token);
            http_response_code(200);
        }
    }
}