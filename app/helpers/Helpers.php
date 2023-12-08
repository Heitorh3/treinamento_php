<?php

function arrayIsAssociative(array $arr)
{
    return array_keys($arr) !== range(0, count($arr) - 1);
}

function isAjax(): bool
{
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
}

function base_path()
{
    return dirname(__FILE__, 3);
}

function mascara_cpf($cpf)
{
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    $cpf_formatado = substr($cpf, 0, 3).'.'.substr($cpf, 3, 3).'.'.substr($cpf, 6, 3).'-'.substr($cpf, 9, 2);

    return $cpf_formatado;
}

function ds($data)
{
    if ($_ENV['PRODUCTION'] === 'true') {
        dd('Something get wrong');
    }
    dd($data);
}

function public_path()
{
    return $_SERVER['DOCUMENT_ROOT'];
}

function remove_file(string $file)
{
    @unlink(public_path().$file);
}
