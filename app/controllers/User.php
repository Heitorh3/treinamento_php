<?php

namespace App\Controllers;

class User {
    public function index($params)
    {
        $data = [
            'title' => 'Home',
            'subtitle' => 'Welcome to the home page',
            'description' => 'This is the home page'
        ];

        return ['view'=>'home', 'data'=> $data];
    }

    public function create($params)
    {
        $data = [
            'title' => 'Create',
            'subtitle' => 'Welcome to the create page',
            'description' => 'This is the create page'
        ];

        return ['view'=>'create', 'data'=> $data];        
    }

    public function show($params)
    {
        if(!isset($params['user'])){
            return redirect('/');
         }
    
        $user = findBy('users','id', $params['user']);

        $data = [
            'title' => 'Show user details',
            'user' => $user,
        ];

        return ['view'=>'show', 'data'=> $data];
    }
}