<?php

namespace app\Controllers;

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
        $password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);

        if (empty($password) || empty($email)) {
            return setMessageAndRedirect('message', 'Usuário ou senha inválidos', '/login');
        }

        $user = findBy('users', 'email', $email);

        if (!$user) {
            return setMessageAndRedirect('message', 'Usuário ou senha inválidos', '/login');
        }

        if (!password_verify($password, $user->password)) {
            return setMessageAndRedirect('message', 'Usuário ou senha inválidos', '/login');
        }

        unset($user->password);

        $_SESSION[LOGGED] = $user;

        return redirect('/');
    }

    public function destroy()
    {
        unset($_SESSION[LOGGED]);

        return redirect('/');
    }
}
