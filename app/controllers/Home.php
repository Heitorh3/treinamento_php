<?php

namespace app\Controllers;

class Home {
    public function index($params)
    {
        
        $search = filter_input(INPUT_GET, 'search', FILTER_UNSAFE_RAW);

        read('users');
        
        if($search){
            search(['Name' => $search]);
        }

        paginate(5);

        $users = execute();
// ddd($users);
        $data = [
            'title' => 'Home',
            'subtitle' => 'Welcome to the home page',
            'description' => 'This is the home page',
            'links' => render(),
            'users' => $users
        ];

        return ['view'=>'home', 'data'=> $data];
    }
}
