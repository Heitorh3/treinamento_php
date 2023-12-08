<?php

use app\helpers\ValidationMessage;

function required($field)
{
    if ($_POST[$field] === '') {
        ValidationMessage::add($field, 'O campo é obrigatório!');

        return false;
    }

    return strip_tags($_POST[$field]);
}

function email($field)
{
    $email = strip_tags($_POST[$field], FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        ValidationMessage::add($field, 'O campo tem que ter um email válido!');

        return false;
    }

    return $email;
}

function uniqueUpdate($field, $param)
{
    $email = strip_tags($_POST[$field], FILTER_SANITIZE_EMAIL);

    if (!str_contains($param, '=')) {
        ValidationMessage::add($field, 'A validaçao para o unique email no update tem que ter o sinal de =');

        return false;
    }

    [$fieldToCompare, $value] = explode('=', $param);

    if (!str_contains($fieldToCompare, ',')) {
        ValidationMessage::add($field, 'A validaçao para o unique email no update tem que ter a virgula!');

        return false;
    }

    $table = substr($fieldToCompare, 0, strpos($fieldToCompare, ','));
    $fieldToCompare = substr($fieldToCompare, strpos($fieldToCompare, ',') + 1);

    read($table);
    where($field, $email);
    orWhere($fieldToCompare, '!=', $value, 'and');
    $userFound = execute(isFetchAll: false);

    if ($userFound) {
        ValidationMessage::add($field, 'Esse valor já está cadastrado!');

        return false;
    }

    return $email;
}

function cpf($field)
{
    $cpf = strip_tags($_POST[$field]);

    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    if (strlen($cpf) > 11 || strlen($cpf) < 11) {
        ValidationMessage::add($field, "O campo {$field} deve conter 11 caracteres.");

        return false;
    }

    if (preg_match('/(\d)\1{10}/', $cpf)) {
        ValidationMessage::add($field, "O campo {$field} não pode conter uma sequência de caracteres.");

        return false;
    }

    for ($t = 9; $t < 11; ++$t) {
        for ($d = 0, $c = 0; $c < $t; ++$c) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            ValidationMessage::add($field, "O campo {$field} não é válido.");

            return false;
        }
    }

    return $cpf;
}

function unique($field, $param)
{
    $data = strip_tags($_POST[$field]);

    $user = findBy($param, $field, $data);

    if ($user) {
        ValidationMessage::add($field, 'Esse valor já está cadastrado.');

        return false;
    }

    return $data;
}

function maxlen($field, $param)
{
    $data = strip_tags($_POST[$field]);

    if (strlen($data) > $param) {
        ValidationMessage::add($field, "Esse campo não pode passar de {$param} caracteres.");

        return false;
    }

    return $data;
}

function minlen($field, $param)
{
    $data = strip_tags($_POST[$field]);

    if (strlen($data) < $param) {
        ValidationMessage::add($field, "Esse campo não pode ser inferior a {$param} caracteres.");

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
    if (!isset($_POST[$field], $_POST[$field.'_confirmation'])) {
        ValidationMessage::add($field, 'Os campos para atualizar a senha são obrigatórios.');

        return false;
    }

    $value = strip_tags($_POST[$field]);
    $value_confirmation = strip_tags($_POST[$field.'_confirmation']);

    if ($value !== $value_confirmation) {
        ValidationMessage::add($field, 'Os dois campos devem que ser iguais.');

        return false;
    }

    if ($field === 'password') {
        return password_hash($value, PASSWORD_DEFAULT);
    }

    return $value;
}
