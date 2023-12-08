<?php

namespace app\traits;

trait Twig
{
    protected $twig;

    public function setTwig($twig)
    {
        $this->twig = $twig;
    }
}
