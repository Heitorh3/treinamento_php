<?php

return [
    'POST' => [
        '/user/store' => 'User@store',
        '/user/[0-9]+/name/[a-z]+' => 'User@edit', 
        '/user/[0-9]+/update' => 'User@update',
        '/contact' => 'Contact@store', 
        '/login' => 'Login@store'
    ],
    'GET' => [
        '/' => 'Home@index',
        '/api/users' => 'Users@index',
        '/user/[0-9]+/show' => 'User@show', 
        '/user/create' => 'User@create', 
        '/user/[0-9]+/delete' => 'User@delete', 
        '/user/edit/profile' => 'User@edit',
        '/contact' => 'Contact@index',
        '/login' => 'Login@index',
        '/logout' => 'Login@destroy'
    ]
];  