<?php

function connect() {
  $db = new PDO('mysql:host=localhost;dbname=proflin', 'root', '@t55pvsudo');
  $db->setAttribute(
    PDO::ATTR_ERRMODE, 
    PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE, 
    PDO::FETCH_OBJ);
  return $db;
}