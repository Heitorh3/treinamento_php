<?php

return [
    '/' => 'Home@index',
    '/user/create' => 'User@create',
    '/user/[0-9]+/show' => 'User@show', 
    '/user/[0-9]+/name/[a-z]+' => 'User@create', 
];  