<?php

function getExtension(string $name)
{
  return pathinfo($name, PATHINFO_EXTENSION);
}

function isFileToUpload($fieldName)
{
  if(!isset($_FILES[$fieldName])|| !isset($_FILES[$fieldName]['name'])|| $_FILES[$fieldName]['name']=== ''){
    throw new exception('Por favor escolha uma imagem/arquivo para ser enviado!');
  }
}

function isImage($name)
{
  if(!in_array(getExtension($name), ['jpg', 'jpeg', 'png','gif'])){
    throw new exception('Por favor escolha um arquivo com as seguintes extensões: jpg, jpeg, gif e png');
  }
}