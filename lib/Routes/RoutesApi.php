<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::group(['namespace' => 'App\Api\Controllers', 'prefix' => '/api'], function () {
    SimpleRouter::post('/users/authenticate', [\App\Api\Controllers\UserController::class, 'authenticate']);
    SimpleRouter::post('/users/create', [\App\Api\Controllers\UserController::class, 'create']);
    SimpleRouter::post('/logout', [\App\Api\Controllers\UserController::class, 'logout']);

    SimpleRouter::group(['middleware' => App\Api\Middlewares\AuthMiddlewareApi::class], function () {
        SimpleRouter::group(['prefix' => '/transactions'], function() {
            SimpleRouter::post('/deposit', [\App\Api\Controllers\TransactionController::class, 'deposit']);
            SimpleRouter::post('/withdraw', [\App\Api\Controllers\TransactionController::class, 'withdraw']);
            SimpleRouter::post('/transfer', [\App\Api\Controllers\TransactionController::class, 'transfer']);
        });
    });
});
