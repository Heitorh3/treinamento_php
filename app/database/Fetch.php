<?php

function all($table, $fields = '*')
{
    try {
        $connect = connect();

        $query = $connect->query("select {$fields} from {$table}");
        return $query->fetchAll();
    } catch (PDOException $e) {
        var_dump($e->getMessage());
    }
}

function findBy($table, $field, $values, $fields = '*'){
  try {
    $connect = connect();

    $prepare = $connect->prepare("SELECT {fields} FROM {$table} WHERE {$field} = {$field}");
    
    $prepare->execute([
      'field' => $values
    ]);
  
    return $prepare->fetch();

  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}