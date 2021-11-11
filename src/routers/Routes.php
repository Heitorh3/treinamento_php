<?php

return [
    'POST' => [
        '/user/create' => 'User@create',
        '/user/[0-9]+/name/[a-z]+' => 'User@create', 
        '/login' => 'Login@store'
    ],
    'GET' => [
        '/' => 'Home@index',
        '/user/[0-9]+/show' => 'User@show', 
        '/login' => 'Login@index'
    ]
];  