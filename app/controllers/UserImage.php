<?php

namespace app\Controllers;

class UserImage {

  public function store()
  {
    $name = $_FILES['file']['name'];
    isImage($name);
    //isFileToUpload('file');
    //ds(getExtension($name));
  }
}