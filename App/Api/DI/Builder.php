<?php

namespace App\Api\DI;

use App\Api\Models\Transaction;
use App\Api\Models\UserAddress;
use App\Api\Repositories\Implementations\TransactionsRepository;
use App\Api\Repositories\Implementations\UsersAddressRepository;
use App\Api\Services\TransactionService;
use App\Api\Services\TransactionsService;
use App\Api\Services\UserAddressService;
use Jenssegers\Blade\Blade;
use PDO;
use DI\Container;
use DI\ContainerBuilder;
use function DI\factory;
use Psr\Container\ContainerInterface;



use App\Api\Db\DBConnection;
use App\Api\Models\ModelManager;
use App\Api\Models\User;
use App\Api\Repositories\Implementations\UsersRepository;
use App\Api\Services\UserService;
use App\Frontend\Views\ViewManager;


class Builder
{
    private static $builder;

    /**
     * buildContainer
     *
     * Returns a new Container Object
     * 
     * @return Container
     */
    public static function buildContainer(): Container
    {
        self::$builder = new ContainerBuilder();

        self::$builder->addDefinitions([
            'ModelManager' => factory(function (ContainerInterface $c) {
                return new ModelManager($c->get('DBConnection'));
            }),

            'DBConnection' => factory(function (ContainerInterface $c) {
                return new DBConnection($c->get('PDO'));
            }),

            'PDO' => factory(function () {
                return new PDO("mysql:host=localhost;port=3306;dbname=wjcrypto2;", "root", "root");
            }),

            'UsersRepository' => factory(function (ContainerInterface $c) {
                return new UsersRepository();
            }),

            'UsersService' => factory(function (ContainerInterface $c) {
                return new UserService();
            }),

            'User' => factory(function (ContainerInterface $c) {
                return new User();
            }),

            'UserAddress' => factory(function (ContainerInterface $c) {
                return new UserAddress();
            }),

            'UsersAddressRepository' => factory(function (ContainerInterface $c) {
                return new UsersAddressRepository();
            }),

            'TransactionsRepository' => factory(function (ContainerInterface $c) {
                return new TransactionsRepository();
            }),

            'TransactionService' => factory(function (ContainerInterface $c) {
                return new TransactionService();
            }),

            'Transaction' => factory(function (ContainerInterface $c) {
                return new Transaction();
            }),

            'ViewManager' => factory(function (ContainerInterface $c) {
                return new ViewManager($c->get('Blade'));
            }),

            'Blade' => factory(function () {
                return new Blade(__DIR__ . '/../../Frontend/Views' , __DIR__ . '/../../Frontend/Views/cache');
            }),
        ]);

        return self::$builder->build();
    }
}
