<?php

namespace app\traits;

use app\classes\bind;

trait View
{
    public function view($dados, $view)
    {
        $twig = Bind::get('twig');

        $view = str_replace('.', '/', $view);

        echo $twig->render($view.'.html', $dados);
    }
}
