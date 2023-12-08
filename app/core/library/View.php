<?php

namespace app\core\library;

use Twig\Loader\ArrayLoader;
use Twig\Loader\FilesystemLoader;

class Views
{
    public static function render(string $view, array $data = [])
    {
        if (!file_exists(VIEWS.$view.'.html')) {
            throw new \Exception("View {$view} does not exist");
        }

        $loader = new ArrayLoader([VIEWS]);
        $loader = new FilesystemLoader('../app/views');

        $twig = new \Twig\Environment($loader, [
            'debug' => true,
            'auto_reload' => true,
        ]);
        echo $twig->render($view.'.html', $data);
    }
}
