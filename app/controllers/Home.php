<?php

namespace app\Controllers;

class Home {
    public function index($params)
    {
        // $users = all('users');
        
        read('users');
        where('Name', 'Heitor Neto');
        // orWhere('email', '=', 'heitorh3@hotmail.com', 'and');
        $users = execute();

        $data = [
            'title' => 'Home',
            'subtitle' => 'Welcome to the home page',
            'description' => 'This is the home page',
            'users' => $users
        ];

        return ['view'=>'home', 'data'=> $data];
    }
}
