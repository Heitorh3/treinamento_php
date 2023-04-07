<?php

function required($field)
{
    if ($_POST[$field] === '') {
        setFlash($field, 'O campo é obrigatório');

        return false;
    }

    return strip_tags($_POST[$field]);
}

function email($field)
{
    $emailIsValid = strip_tags($_POST[$field]);

    if (!$emailIsValid) {
        setFlash($field, 'O campo tem que ser um email válido');

        return false;
    }

    return $emailIsValid;
}

function uniqueUpdate($field, $param)
{
    // $email = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
    $email = strip_tags($_POST[$field]);

    if (!str_contains($param, '=')) {
        setFlash($field, 'A validaçao para o unique email no update tem que ter o sinal de =');

        return false;
    }

    [$fieldToCompare, $value] = explode('=', $param);

    if (!str_contains($fieldToCompare, ',')) {
        setFlash($field, 'A validaçao para o unique email no update tem que ter a virgula');

        return false;
    }

    $table = substr($fieldToCompare, 0, strpos($fieldToCompare, ','));
    $fieldToCompare = substr($fieldToCompare, strpos($fieldToCompare, ',') + 1);

    read($table);
    where($field, $email);
    orWhere($fieldToCompare, '!=', $value, 'and');
    $userFound = execute(isFetchAll:false);
    if ($userFound) {
        setFlash($field, 'Esse valor já está cadastrado');

        return false;
    }


    return $email;
}

function unique($field, $param)
{
    $data = strip_tags($_POST[$field]);
    $user = findBy($param, $field, $data);

    if ($user) {
        setFlash($field, 'Esse valor já está cadastrado');

        return false;
    }

    return $data;
}

function maxlen($field, $param)
{
    $data = strip_tags($_POST[$field]);

    if (strlen($data) > $param) {
        setFlash($field, "Esse campo não pode passar de {$param} caracteres");

        return false;
    }

    return $data;
}

function optional($field)
{
    $data = strip_tags($_POST[$field]);

    if ($data === '') {
        return null;
    }

    return $data;
}

function confirmed($field)
{
    if (!isset($_POST[$field], $_POST[$field . '_confirmation'])) {
        setFlash($field, 'Os campos para atualizar a senha são obrigatórios');

        return false;
    }

    $value = strip_tags($_POST[$field]);
    $value_confirmation = strip_tags($_POST[$field . '_confirmation']);

    if ($value !== $value_confirmation) {
        setFlash($field, 'Os dois campos devem que ser iguais');

        return false;
    }

    if ($field === 'password') {
        return password_hash($value, PASSWORD_DEFAULT);
    }

    return $value;
}
