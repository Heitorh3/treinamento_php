<?php

namespace app\Controllers;

class User
{
    public function create()
    {
        $data = [
            'title' => 'Cadastro de usuários',
        ];

        return ['view' => 'create', 'data' => $data];
    }

    public function show($params)
    {
        if (!isset($params['user'])) {
            return redirect('/');
        }

        $user = findBy('users', 'id', $params['user']);

        $data = [
            'title' => 'Show user details',
            'user' => $user,
        ];

        return ['view' => 'show', 'data' => $data];
    }

    public function store()
    {
        $validate = validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'maxlen:15|required',
        ], persistInputs:true, checkCsrf:true);

        if (!$validate) {
            return redirect('/user/create');
        }

        $validate['password'] = password_hash($validate['password'], PASSWORD_DEFAULT);

        $created = create('users', $validate);

        if (!$created) {
            setFlash('error', 'Ocorreu um erro ao tentar cadastrar, faça contato com o administrador');

            return redirect('/user/create');
        }

        return setMessageAndRedirect('success', 'Usuário cadastrado com sucesso!', '/');
    }

    public function edit()
    {
        if (!logged()) {
            redirect('/');
        }

        read('users', 'users.id,name,email,password,path');
        tableJoin('photos', 'id', 'left');
        where('users.id', user()->id);

        $user = execute(isFetchAll:false);

        return [
            'view' => 'edit',
            'data' => ['title' => 'Edit', 'user' => $user],
        ];
    }

    public function update($args)
    {
        if (!isset($args['user']) || intval($args['user']) !== user()->id) {
            return redirect('/');
        }

        $validated = validate([
            'name' => 'required',
            'email' => 'required|email|uniqueUpdate:users,id=' . $args['user'],
        ]);

        if (!$validated) {
            return redirect('/user/edit/profile');
        }

        $updated = update('users', $validated, ['id' => user()->id]);

        if ($updated) {
            return setMessageAndRedirect('updated_success', 'Atualizado com sucesso', '/user/edit/profile');
        }
        setMessageAndRedirect('updated_error', 'Ocorreu um erro ao atualizar', '/user/edit/profile');
    }

    public function delete($params)
    {
        if (!logged()) {
            redirect('/');
        }

        if (!isset($params['user'])) {
            return redirect('/');
        }

        $deleted = delete('users', ['id' => $params['user']]);

        if (!$deleted) {
            setMessageAndRedirect('error', 'Ocorreu um erro ao tentar apagar o registro, faça contato com o administrador', '/');
        }

        setMessageAndRedirect('success', 'Registro apagado/deletado com sucesso!', '/');
    }
}
