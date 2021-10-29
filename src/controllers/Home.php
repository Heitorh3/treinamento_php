<?php

namespace App\Controllers;

class Home {
    public function index($params)
    {
        $users = all('users');
        $data = [
            'title' => 'Home',
            'subtitle' => 'Welcome to the home page',
            'description' => 'This is the home page',
            'users' => $users
        ];

        return ['view'=>'home', 'data'=> $data];
    }
}