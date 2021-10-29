<?php

require 'bootstrap.php';

try {
  $data = router();   

  if(!isset($data['data'])){
    throw new Exception("Data not found.");
  }

  if(!isset($data['data']['title'])){
    throw new Exception("Title not found.");
  }
  
  if(!isset($data['view'])) {
    throw new Exception("View not found.");
  }
  
  if(!file_exists(VIEWS.$data['view'].'.view.php')) {
    throw new Exception("File not exists.");
  } 
  
  extract($data['data']);

  $view = $data['view'];

  require VIEWS.'index.view.php';
} catch (Exception $e) {
    echo $e->getMessage();
}