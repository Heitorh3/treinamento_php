<?php

return [
    'POST' => [
        '/user/store' => 'User@store',
        '/user/[0-9]+/name/[a-z]+' => 'User@edit', 
        '/user/[0-9]+/update' => 'User@update', 
        '/login' => 'Login@store'
    ],
    'GET' => [
        '/' => 'Home@index',
        '/user/[0-9]+/show' => 'User@show', 
        '/user/create' => 'User@create', 
        '/user/[0-9]+/delete' => 'User@delete', 
        '/user/edit/profile' => 'User@edit',
        '/login' => 'Login@index',
        '/logout' => 'Login@destroy'
    ]
];  