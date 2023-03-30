<?php

namespace app\Controllers;

class UserImage {
  public function store()
  {
    $name = $_FILES['file']['name'];
    
    upload(640,480,'assets/images','resize');

    //isImage($name);
    //isFileToUpload('file');
    //ds(getExtension($name));
  }
}