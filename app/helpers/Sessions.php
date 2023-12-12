<?php

class Session
{
    public const PROTECTED = 'protected';

    public static function start()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function old()
    {
        // if ($_SESSION['old']) {
        //     unset($_SESSION['old']);
        // }
        if (isset($_SESSION['old'])) {
            unset($_SESSION['old']);
        }
    }

    public static function user()
    {
        if (isset($_SESSION[LOGGED])) {
            return $_SESSION[LOGGED];
        }
    }

    public static function logged(): bool
    {
        return isset($_SESSION[LOGGED]);
    }

    public static function checkCsrf()
    {
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
}
