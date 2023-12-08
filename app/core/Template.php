<?php

namespace app\core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Template
{
    private function loader()
    {
        return new FilesystemLoader('../app/views');
    }

    public function init()
    {
        return new Environment($this->loader(), [
            'debug' => true,
            'auto_reload' => true,
        ]);
    }
}
