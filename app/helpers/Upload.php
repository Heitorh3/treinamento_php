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

function resize(int $width, int $height, int $newWidth, int $newHeight){
  $ratio = $width/$height;

  if($newWidth/$newHeight > $ratio){
      $newWidth = $newHeight * $ratio;
      $newHeight = $newHeight;
  }else{
      $newHeight = $newWidth / $ratio;
      $newWidth = $newHeight;
  }
  return [$newHeight,$newWidth];
}

function crop(){

}
function upload(int $newWidth, int $newHeight, string $folder, string $type = 'resize')
{
  $tmpFileName = $_FILES['file']['tmp_name'];
  $fileName = $_FILES['file']['name'];

  [$widht, $height] = getimagesize($tmpFileName);

  [$imagecreatefrom, $imagesave] = getFunctionCreateFrom($fileName);

  $src = $imagecreatefrom($tmpFileName);

  
  if($type === 'resize'){
    [$newHeight,$newWidth] = resize($widht, $height, $newWidth, $newHeight);
    $dst = imagecreatetruecolor($newWidth,$newHeight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newWidth,$newHeight, $widht, $height);
  }else{
    crop();
   // imagecopyresampled($dst, $src, 0, 0, 0, 0, 640, 480, $widht, $height);
  }

  $imagesave($dst, $folder.DIRECTORY_SEPARATOR.rand().'.'.getExtension($fileName));
}