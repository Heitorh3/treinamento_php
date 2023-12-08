<?php

namespace app\controllers;

class Users
{
    public function index()
    {
        $users = all('users', 'id,name,email,path');

        echo json_encode($users);
    }
}
