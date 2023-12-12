<?php

namespace app\controllers;

use app\helpers\FlashMessage;
use app\helpers\Redirect;

class UserController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Cadastro de usuários',
        ];

        $this->view($data, 'home');
    }

    public function show(int $id)
    {
        if (!isset($id)) {
            return Redirect::redirect('/');
        }

        $user = findBy('users', 'id', $id);

        $data = [
            'title' => 'Show user details',
            'user' => $user,
        ];

        $this->view($data, 'show');
    }

    public function store()
    {
        $validate = validate([
            'name' => 'required',
            'cpf' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'maxlen:15|required',
        ], persistInputs: true, checkCsrf: true);

        if (!$validate) {
            return Redirect::redirect('/user/create');
        }

        $validate['password'] = password_hash($validate['password'], PASSWORD_DEFAULT);

        $validate['cpf'] = mascara_cpf($validate['cpf']);

        $created = create('users', $validate);

        if (!$created) {
            FlashMessage::add('user_error', 'Ocorreu um erro ao tentar cadastrar, faça contato com o administrador.');

            return Redirect::redirect('/user/create');
        }

        FlashMessage::add('user_success', 'Usuário cadastrado com sucesso!');

        return Redirect::redirect('/');
    }

    public function edit()
    {
        if (!\Session::logged()) {
            return Redirect::redirect('/');
        }

        read('users', 'users.id,name,email,password,cpf,path');
        tableJoin('photos', 'id', 'left');
        where('users.id', \Session::user()->id);

        $user = execute(isFetchAll: false);

        $data = [
            'title' => 'Edit',
            'user' => $user,
        ];

        $this->view($data, 'edit');
    }

    public function update($id)
    {
        if (!isset($id) || intval($id) !== \Session::user()->id) {
            return Redirect::redirect('/');
        }

        $validated = validate([
            'name' => 'required',
            'cpf' => 'required|cpf',
            'email' => 'required|email|uniqueUpdate:users,id='.$id,
        ]);

        if (!$validated) {
            return Redirect::redirect('/user/edit/profile');
        }

        $validated['cpf'] = mascara_cpf($validated['cpf']);
        $validated['updated_At'] = date('Y-m-d H:i:s');

        $updated = update('users', $validated, ['id' => \Session::user()->id]);

        if ($updated) {
            FlashMessage::add('updated_success', 'Registro atualizado com sucesso!', 'success');

            return Redirect::redirect('/user/edit/profile');
        }
        FlashMessage::add('updated_error', 'Ocorreu um erro ao atualizar o registro!');

        return Redirect::redirect('/user/edit/profile');
    }

    public function delete($params)
    {
        if (!\Session::logged()) {
            return Redirect::redirect('/');
        }

        if (!isset($params['user'])) {
            return Redirect::redirect('/');
        }

        $deleted = delete('users', ['id' => $params['user']]);

        if (!$deleted) {
            FlashMessage::add('error', 'Ocorreu um erro ao tentar apagar o registro, faça contato com o administrador');

            return Redirect::redirect('/');
        }

        FlashMessage::add('success', 'Registro apagado com sucesso!', 'success');

        return Redirect::redirect('/');
    }
}
