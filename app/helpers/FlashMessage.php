<?php

namespace app\helpers;

class FlashMessage
{
    public static function add($index, $message, $type = null)
    {
        $type = ($type == null) ? 'danger' : $type;

        if (!isset($_SESSION['flash'][$index])) {
            $_SESSION['flash'][$index] = '<div class="alert alert-'.$type.' role=alert">'.$message.'</div>';
        }
    }

    public static function show($index)
    {
        if (isset($_SESSION['flash'][$index])) {
            $mensagem = $_SESSION['flash'][$index];
        }
        self::removeMessage($index);

        return isset($mensagem) ? $mensagem : '';
    }

    public static function removeMessage($index)
    {
        unset($_SESSION['flash'][$index]);
    }
}
