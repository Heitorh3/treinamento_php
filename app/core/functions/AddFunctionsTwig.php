<?php

namespace app\core\functions;

class AddFunctionsTwig
{
    public function run($twig, $functionsTwig)
    {
        foreach ($functionsTwig->functions as $function) {
            $twig->addFunction($function);
        }
    }
}
