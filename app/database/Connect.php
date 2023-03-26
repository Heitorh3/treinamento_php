<?php

function connect() {
  
  $options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
];
  return new PDO("mysql:host={$_ENV['DATABASE_HOST']};port={$_ENV['DATABASE_PORT']};dbname={$_ENV['DATABASE_NAME']}", "{$_ENV['DATABASE_USER']}", "{$_ENV['DATABASE_PASSWORD']}", $options);
}

