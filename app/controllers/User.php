<?php

namespace app\Controllers;

class User {
    
    public function create($params)
    {
        $data = [
            'title' => 'Cadastro de usuários',
        ];

        return ['view'=>'create', 'data'=> $data];        
    }

    public function show($params)
    {

        if(!isset($params['user'])){
            return redirect('/');
         }
    
        $user = findBy('users','id', $params['user']);

        $data = [
            'title' => 'Show user details',
            'user' => $user,
        ];

        return ['view'=>'show', 'data'=> $data];
    }

    public function store()
    {
        $validate = validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'maxlen:5|required',
        ], persistInputs:true, checkCsrf:true);

        if (!$validate) {
            return redirect('/user/create');
        }

        $validate['password'] = password_hash($validate['password'], PASSWORD_DEFAULT);

        $created = create('users', $validate);

        if (!$created) {
            setFlash('message', 'Ocorreu um erro ao tentar cadastrar, faça contato com o administrador');
            return redirect('/user/create');
        }

        return redirect('/');
    }
}