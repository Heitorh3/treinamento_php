<?php

namespace app\Controllers;
class Login
{
  public function index()
  {
    $data = [
        'title' => 'Login',
        'subtitle' => 'Welcome to the login page',
        'description' => 'This is the login page'
    ];

    return ['view'=>'login', 'data'=>$data];
  }

  public function store($params)
  {
    $data = [
        'title' => 'Login',
        'subtitle' => 'Welcome to the method login page',
        'description' => 'This is the method login page'
    ];

    return ['view'=>'login', 'data'=>$data];
  }
}