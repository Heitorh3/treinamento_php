<?php

return [
    'POST' => [
        '/user/store' => 'User@store',
        '/user/[0-9]+/name/[a-z]+' => 'User@edit', 
        '/login' => 'Login@store'
    ],
    'GET' => [
        '/' => 'Home@index',
        '/user/[0-9]+/show' => 'User@show', 
        '/user/create' => 'User@create', 
        '/login' => 'Login@index',
        '/logout' => 'Login@destroy'
    ]
];  