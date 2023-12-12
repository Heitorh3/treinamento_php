<?php

namespace app\controllers;

use app\helpers\FlashMessage;
use app\helpers\Redirect;

class Login
{
    public function index()
    {
        $data = [
            'title' => 'Login',
            'subtitle' => 'Welcome to the login page',
            'description' => 'This is the login page',
        ];

        return ['view' => 'login', 'data' => $data];
    }

    public function store()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
        // $password = filter_input( INPUT_POST, 'password', FILTER_UNSAFE_RAW );

        if (empty($password) || empty($email)) {
            FlashMessage::add('login', 'Usuário ou senha inválidos');

            return Redirect::redirect('/login');
            // return setMessageAndRedirect('message', 'Usuário ou senha inválidos', '/login');
        }

        // $user = findBy( 'users', 'email', $email );
        read('users', 'users.id, name, email, password, path');
        tableJoin('photos', 'id', 'left');
        where('email', $email);

        $user = execute(isFetchAll: false);

        if (!$user) {
            FlashMessage::add('login', 'Usuário ou senha inválidos');

            return Redirect::redirect('/login');
        }

        if (!password_verify($password, $user->password)) {
            FlashMessage::add('login', 'Usuário ou senha inválidos');

            return Redirect::redirect('/login');
        }

        unset($user->password);

        $_SESSION[LOGGED] = $user;

        return Redirect::redirect('/');
    }

    public function destroy()
    {
        unset($_SESSION[LOGGED]);

        Redirect::redirect('/');
    }
}
