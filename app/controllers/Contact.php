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

      $validated = validate([  
        'name' => 'required',
        'email' => 'required|email',
        'subject'=> 'required',
        'messagem'=> 'required'
      ],persistInputs:true,checkCsrf:true);

      if(!$validated){
        return redirect('/contact');
      }

      $sent = send([
        'fromName'=>$validated['name'],
        'fromEmail'=>$validated['email'],
        'toName'=>$_ENV['TONAME'],
        'toEmail'=>$_ENV['TOEMAIL'],
        'subject'=>$validated['subject'],
        'message'=>$validated['messagem'],
        'template'=>'contact',
      ]);
      
      if($sent){
        return setMessageAndRedirect('success', 'Mensagem enviada com sucesso!', '/contact');
      }
      return setMessageAndRedirect('error', "Error ao tentar enviar a mensagem, Tente enviar a sua mensagem diretamente para o seguinte e-mail: {$_ENV['TOEMAIL']}.", '/contact');
    }
}