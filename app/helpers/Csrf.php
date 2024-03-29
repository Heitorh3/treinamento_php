<?php

function getCsrfOld()
{
    $_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(8));

    return "<input name='csrf' type='hidden' value=".$_SESSION['csrf'].'>';
}

function checkCsrfOld()
{
    // $csrf = filter_input(INPUT_POST, 'csrf', FILTER_UNSAFE_RAW);
    $csrf = strip_tags($_POST['csrf']);

    if (!$csrf) {
        throw new Exception('Não há um token válido na requsição!');
    }

    if (!isset($_SESSION['csrf'])) {
        throw new Exception('Token inválido!');
    }

    if ($csrf !== $_SESSION['csrf']) {
        throw new Exception('Token inválido!');
    }

    unset($_SESSION['csrf']);
}
