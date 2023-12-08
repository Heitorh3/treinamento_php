<?php

namespace app\controllers;

class HomeController extends BaseController
{
    public function index()
    {
        read('users');
        paginate(2);

        $users = execute();

        $data = [
            'title' => 'Home',
            'links' => render(),
            'users' => $users,
        ];

        $this->view($data, 'home');
    }

    public function show()
    {
        $search = filter_input(INPUT_POST, 'search', FILTER_UNSAFE_RAW);

        read('users');

        if ($search) {
            search(['Name' => $search]);
        }

        paginate(2);

        $users = execute();

        $data = [
            'title' => 'Home',
            'links' => render(),
            'users' => $users,
        ];

        $this->view($data, 'home');
    }
}
