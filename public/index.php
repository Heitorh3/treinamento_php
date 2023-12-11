<?php

require 'bootstrap.php';

use app\controllers\HomeController;
use app\controllers\LoginController;
use app\controllers\PasswordController;
use app\controllers\UserController;
use app\controllers\UserImageController;
use app\router\Router;

try {
    $router = new Router();

    $admin = require base_path().'/app/routers/admin.php';
    $router->group('/admin', $admin, Session::PROTECTED);

    $router->add('GET', '/login', [LoginController::class, 'index']);
    $router->add('POST', '/login', [LoginController::class, 'store']);
    $router->add('GET', '/logout', [LoginController::class, 'destroy']);

    $router->add('GET', '/', [HomeController::class, 'index', Session::PROTECTED]);
    $router->add('POST', '/', [HomeController::class, 'show', Session::PROTECTED]);

    $router->add('GET', '/user/edit/profile', [UserController::class, 'edit', Session::PROTECTED]);
    $router->add('POST', '/user/{id:[0-9]+}/update', [UserController::class, 'update', Session::PROTECTED]);
    $router->add('GET', '/users', [UserController::class, 'index', Session::PROTECTED]);
    $router->add('POST', '/user/image/update', [UserImageController::class, 'store', Session::PROTECTED]);
    $router->add('GET', '/user/{id:[0-9]+}/show', [UserController::class, 'show', Session::PROTECTED]);
    $router->add('POST', '/password/user/{id:[0-9]+}', [PasswordController::class, 'update', Session::PROTECTED]);

    $router->run();
} catch (Throwable $e) {
    \Sentry\captureException($e);

    echo $e->getMessage();
}
