<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::get('/', [\App\Frontend\Controllers\UserController::class, 'index']);
SimpleRouter::get('/login', [\App\Frontend\Controllers\UserController::class, 'login']);

SimpleRouter::get('/cadastro', [\App\Frontend\Controllers\UserController::class, 'create']);
SimpleRouter::post('/cadastro', [\App\Frontend\Controllers\UserController::class, 'store']);


SimpleRouter::get('/transferencia', [\App\Frontend\Controllers\TransactionController::class, 'transfer']);
SimpleRouter::get('/deposito', [\App\Frontend\Controllers\TransactionController::class, 'deposit']);
SimpleRouter::get('/saque', [\App\Frontend\Controllers\TransactionController::class, 'withdraw']);
