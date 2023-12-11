<?php

namespace app\controllers;

use app\classes\Redis;

class HomeController extends BaseController
{
    public const TIME = '+1day';

    public function index()
    {
        $cache = new Redis($this->getCache());

        read('users');
        paginate(DEFAULT_PAGINATE);

        if ($cache->toExpire('users') === -2 || $cache->toExpire('users') === -1) {
            $users = execute();

            $cache->set('users', json_encode(
                $users
            ));

            $cache->expire('users', 10);
        } else {
            $users = json_decode($cache->get('users'));
        }

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

        paginate(DEFAULT_PAGINATE);

        $users = execute();

        $data = [
            'title' => 'Home',
            'links' => render(),
            'users' => $users,
        ];

        $this->view($data, 'home');
    }
}
