<?php

function required($field)
{
    if ($_POST[$field] === '') {
        setFlash($field, "O campo é obrigatório");
        return false;
    }

    return filter_input(INPUT_POST, $field, FILTER_UNSAFE_RAW);
}


function email($field)
{
    $emailIsValid = filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL);

    if (!$emailIsValid) {
        setFlash($field, "O campo tem que ser um email válido");
        return false;
    }

    return filter_input(INPUT_POST, $field, FILTER_UNSAFE_RAW);
}


function uniqueUpdate($field, $param)
{
    $email = filter_input(INPUT_POST, $field, FILTER_UNSAFE_RAW);

    if (str_contains($param, '=')) {
        list($fieldToCompare, $value) = explode('=', $param);

        //read('users');
        //where($field, $email);
        //orWhere($fieldToCompare, '!=', $value, 'and');
        $userFound =null; // execute(isFetchAll:false);
        if ($userFound) {
            setFlash($field, "Esse valor já está cadastrado");
            return false;
        }
    } else {
        setFlash($field, "A validaçao para o unique email no update tem que ter o sinal de =");
        return false;
        // throw new Exception("A validaçao para o unique email no update tem que ter o sinal de =");
    }

    return $email;
}

function unique($field, $param)
{
    $data = filter_input(INPUT_POST, $field, FILTER_UNSAFE_RAW);
    $user = findBy($param, $field, $data);

    if ($user) {
        setFlash($field, "Esse valor já está cadastrado");
        return false;
    }

    return $data;
}


function maxlen($field, $param)
{
    $data = filter_input(INPUT_POST, $field, FILTER_UNSAFE_RAW);

    if (strlen($data) > $param) {
        setFlash($field, "Esse campo não pode passar de {$param} caracteres");
        return false;
    }

    return $data;
}

function optional($field)
{
    $data = filter_input(INPUT_POST, $field, FILTER_UNSAFE_RAW);

    if ($data === '') {
        return null;
    }

    return $data;
}
