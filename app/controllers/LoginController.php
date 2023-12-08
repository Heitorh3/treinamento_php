<?php

namespace app\controllers;

use app\helpers\FlashMessage;
use app\helpers\Redirect;

class LoginController extends BaseController
{
    public function index()
    {
        $dados = [
            'title' => 'Login',
        ];

        $this->view($dados, 'login');
    }

    public function store()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
        // $password = filter_input( INPUT_POST, 'password', FILTER_UNSAFE_RAW );

        if (empty($password) || empty($email)) {
            FlashMessage::add('login', 'Erro ao logar, usuário ou senha inválidos!');

            return Redirect::redirect('/login');
        }

        // $user = findBy( 'users', 'email', $email );
        read('users', 'users.id, name, email, cpf, password, path');
        tableJoin('photos', 'id', 'left');
        where('email', $email);

        $user = execute(isFetchAll: false);

        if (!$user) {
            FlashMessage::add('login', 'Erro ao logar, usuário ou senha inválidos!');

            return Redirect::redirect('/login');
        }

        if (!password_verify($password, $user->password)) {
            FlashMessage::add('login', 'Erro ao logar, usuário ou senha inválidos!');

            return Redirect::redirect('/login');
        }

        unset($user->password);

        $_SESSION[LOGGED] = $user;

        return Redirect::redirect('/');
    }

    public function destroy()
    {
        unset($_SESSION[LOGGED]);

        return Redirect::redirect('/');
    }
}
