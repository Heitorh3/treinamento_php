<?php

namespace app\controllers;

use app\helpers\FlashMessage;
use app\helpers\Redirect;
use stdClass;

class ContactController extends BaseController
{
    public function index()
    {
        $dados = [
            'title' => 'Contact',
        ];

        $this->view($dados, 'contact');
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
            'subject' => 'required',
            'messagem' => 'required',
        ], persistInputs: true, checkCsrf: true);

        if (!$validated) {
            return Redirect::redirect('/contact');
        }

        $send = send([
            'fromName' => $validated['name'],
            'fromEmail' => $validated['email'],
            'toName' => $_ENV['TONAME'],
            'toEmail' => $_ENV['TOEMAIL'],
            'subject' => $validated['subject'],
            'message' => $validated['messagem'],
            'template' => 'contact',
        ]);

        if ($send) {
            FlashMessage::add('contact_success', 'Mensagem enviada com sucesso!');

            return Redirect::redirect('/contact');
        }

        FlashMessage::add('contact_error', "Error ao tentar enviar a mensagem, Tente enviar a la diretamente para o e-mail: {$_ENV['TOEMAIL']}.");

        return Redirect::redirect('/contact');
    }
}
