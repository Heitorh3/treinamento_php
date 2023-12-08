<?php

namespace app\helpers;

class ValidationMessage
{
    public static function add($index, $message, $type = null)
    {
        $type = ($type == null) ? 'invalid' : $type;

        if (!isset($_SESSION['validation'][$index])) {
            $_SESSION['validation'][$index] = '<div class="'.$type.'-field">'.$message.'</div>';
        }
    }

    public static function show($index)
    {
        if (isset($_SESSION['validation'][$index])) {
            $mensagem = $_SESSION['validation'][$index];
        }
        self::removeMessage($index);

        return isset($mensagem) ? $mensagem : '';
    }

    public static function all()
    {
        if (isset($_SESSION['validation'])) {
            $mensagens = $_SESSION['validation'];
        }

        return isset($mensagens) ? $mensagens : '';
    }

    public static function removeMessage($index)
    {
        unset($_SESSION['validation'][$index]);
    }
}
