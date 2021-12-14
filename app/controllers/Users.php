<?php

namespace app\Controllers;

class Users
{
    public function index()
    {
        $users = all('users', 'id,Name,email');

        echo json_encode($users);
    }
}