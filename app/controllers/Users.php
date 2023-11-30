<?php

namespace app\Controllers;

class Users
{
    public function index()
    {
        $users = all('users', 'id,name,email,path');

        echo json_encode($users);
    }
}
