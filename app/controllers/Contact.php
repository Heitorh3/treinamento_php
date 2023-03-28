<?php

namespace app\Controllers;
use stdClass;

class Contact {
    public function index()
    {
      return ['view'=>'contact', 'data'=> [
        'title'=>'Contact'
      ]];
    }

    public function store()
    {
      /*
      $email = new stdClass();
      $email->fromName = 'Heitor';
      $email->fromEmail = 'heitorh3@gmail.com';
      $email->toName = 'Jhon Doe';
      $email->toEmail = 'jhondo@gmail.com';
      $email->subject = 'Teste de envio de e-mail';
      $email->message = 'Mensagem de teste';
      $email->template = 'contact';
      */

      $sent = send([
        'fromName'=>'Heitor Neto',
        'fromEmail'=>'heitorh3@gmail.com',
        'toName'=>'Jhon Doe',
        'toEmail'=>'jhondo@gmail.com',
        'subject'=>'Teste de envio de e-mail',
        'message'=>'Teste de envio de e-mail com array',
        'template'=>'contact',
      ]);
      ds($sent);
    }
}