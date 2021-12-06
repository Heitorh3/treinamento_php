<?php

function connect() {
  
  $options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
];

  return new PDO('mysql:host=server_mysql;dbname=treinamentoPhp', 'root', 'bwUh3DtN3e32ttya', $options);
}

