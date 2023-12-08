<?php

namespace app\controllers;

use app\helpers\FlashMessage;
use app\helpers\Redirect;

class PasswordController extends BaseController
{
    public function update($args)
    {
        if (!isset($args['user']) || $args['user'] !== \Session::user()->id) {
            return Redirect::redirect('/');
        }

        $validated = validate([
            'email' => 'required|confirmed',
            'email_confirmation' => 'required',
        ], checkCsrf: true);

        if (!$validated) {
            return Redirect::redirect('/user/edit/profile');
        }

        $updated = update('users', [
            'password' => $validated['password'],
        ], ['id' => \Session::user()->id]);

        if ($updated) {
            $user = \Session::user();
            send([
                'fromName' => $_ENV['TONAME'],
                'fromEmail' => $_ENV['TOEMAIL'],
                'toName' => $user->name,
                'toEmail' => $user->email,
                'subject' => 'Senha alterada',
                'message' => 'Senha alterada com sucesso',
                'template' => 'password',
            ]);

            FlashMessage::add('password_success', 'Senha alterada com sucesso!');

            return Redirect::redirect('/user/edit/profile');
        } else {
            FlashMessage::add('password_error', 'Ocorreu um erro ao atualizar a senha!');

            return Redirect::redirect('/user/edit/profile');
        }
    }
}
