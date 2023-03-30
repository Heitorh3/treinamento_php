<?php

function getFunctionCreateFrom(string $name)
{
  return match(getExtension($name)){
    'png' => ['imagecreatefrompng','imagepng'],
    'jpeg','jpg' => ['imagecreatefromjpeg','imagejpeg'],
    'gif' => ['imagecreatefromgif','imagegif']
  };
}

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

function upload()
{
  $dst = imagecreatetruecolor(640,480);
  [$widht, $height] = getimagesize($_FILES['file']['tmp_name']);

  [$imagecreatefrom, $imagesave] = getFunctionCreateFrom($_FILES['file']['name']);

  $src = $imagecreatefrom($_FILES['file']['tmp_name']);

  imagecopyresampled($dst, $src, 0, 0, 0, 0, 640, 480, $widht, $height);
  $imagesave($dst, 'assets/images/teste.png');
}