<?php

namespace app\Controllers;

class UserImage {
  public function store()
  {
    try{
      upload(640,480,'assets/images','crop');
    }catch(\Exception $e){
       return setMessageAndRedirect('error', $e->getMessage(), '/user/edit/profile');
    }
  }
}