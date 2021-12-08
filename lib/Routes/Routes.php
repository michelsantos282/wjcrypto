<?php

use Pecee\SimpleRouter\SimpleRouter;


SimpleRouter::get('/', [\App\Frontend\Controllers\UserController::class, 'showHomePage']);
SimpleRouter::post('/login', [\App\Frontend\Controllers\UserController::class, 'login']);
SimpleRouter::get('/cadastro', [\App\Frontend\Controllers\UserController::class, 'create']);
SimpleRouter::post('/cadastro', [\App\Frontend\Controllers\UserController::class, 'store']);

SimpleRouter::group(['middleware' => App\Api\Middlewares\AuthMiddleware::class], function () {
    SimpleRouter::get('/logout', [\App\Frontend\Controllers\UserController::class, 'logout']);
    SimpleRouter::get('/transferencia', [\App\Frontend\Controllers\TransactionController::class, 'transfer']);
    SimpleRouter::get('/deposito', [\App\Frontend\Controllers\TransactionController::class, 'deposit']);
    SimpleRouter::get('/saque', [\App\Frontend\Controllers\TransactionController::class, 'withdraw']);
});


