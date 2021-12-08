<?php

namespace App\Api\Middlewares;

use App\Api\Models\User;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class AuthMiddlewareApi implements IMiddleware
{
    private User $user;

    public function __construct()
    {
        $this->user = \Helper::getContainer("User");
    }

    /**
     * Receives a request and check if bearer token is valid and belongs to some user
     * @param Request $request
     */
    public function handle(Request $request): void
    {
        $authentication_header = $request->getHeader('authorization');
        $authentication_token = substr($authentication_header, 7);

        try {
            $user = $this->user->selectDataFrom('auth_token', $authentication_token);

            if($user != false) {
                if(empty($authentication_token) || $authentication_token != $user[0]->auth_token) {
                    header('WWW-Authenticate: Bearer realm="Access Denied"');
                    http_response_code(401);

                    \Helper::apiResponse('Acesso negado - Token vazio ou incorreto');
                } else {
                    header('WWW-Authenticate: Bearer ' . $authentication_token);

                    http_response_code(200);
                }
            } else {
                throw new \Exception('Nenhum usuário corresponde com o token informado.');
            }
        } catch (\Exception $e) {
            $message = $e->getMessage();

            header('WWW-Authenticate: Bearer realm="Access Denied"');
            http_response_code(401);

            \Helper::apiResponse('Acesso negado - ' . $message);
        }
    }
}