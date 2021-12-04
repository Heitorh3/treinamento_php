<?php

function all($table, $fields = '*'){
  try {
    $connect = connect();

    $query = $connect->query("SELECT {fields} FROM {$table}");
    return $query-fetchAll();

  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

function findBy($table, $field, $values, $fields = '*'){
  try {
    $connect = connect();

    $prepare = $connect->prepare("SELECT {fields} FROM {$table} WHERE {$field} = {$field}");
    
    $prepare->execute([
      'field' => $values
    ]);
  
    return $query->fetch();

  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}