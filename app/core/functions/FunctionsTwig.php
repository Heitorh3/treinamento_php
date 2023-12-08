<?php

namespace app\core\functions;

use app\helpers\FlashMessage;
use app\helpers\ValidationMessage;
use Twig\TwigFunction;

class FunctionsTwig
{
    public $functions = [];

    private function logado()
    {
        $this->functions['logado'] = new TwigFunction('logado', function ($permission) {
            if ($permission == 'user') {
                // return Logado::logado();
                return $permission;
            }

            // return Logado::adminLogado();
            return $permission;
        });

        return $this;
    }

    private function dadosUser()
    {
        $this->functions['user'] = new TwigFunction('user', function () {
            return \Session::user();
        });

        return $this;
    }

    private function flashMessage()
    {
        $this->functions['flash'] = new TwigFunction('flash', function ($index) {
            return FlashMessage::show($index);
        });

        return $this;
    }

    private function validationMessage()
    {
        $this->functions['validation'] = new TwigFunction('validation', function ($index) {
            return ValidationMessage::show($index);
        });

        return $this;
    }

    private function errorMessages()
    {
        $this->functions['validationFail'] = new TwigFunction('validationFail', function () {
            return ValidationMessage::all();
        });

        return $this;
    }

    private function GenerateCsrf()
    {
        $this->functions['getCsfr'] = new TwigFunction('getCsfr', function () {
            $_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(8));

            return "<input name='csrf' type='hidden' value=".$_SESSION['csrf'].'>';
        });

        return $this;
    }

    private function checkCsrf()
    {
        $this->functions['checkCsrf'] = new TwigFunction('checkCsrf', function () {
            $csrf = strip_tags($_SESSION['csrf']);

            if (!$csrf) {
                throw new \Exception('Não há um token válido na requsição!');
            }

            if (!isset($_SESSION['csrf'])) {
                throw new \Exception('Token inválido!');
            }

            if ($csrf !== $_SESSION['csrf']) {
                throw new \Exception('Token inválido!');
            }

            unset($_SESSION['csrf']);
        });

        return $this;
    }

    public function run()
    {
        $this->dadosUser()
        ->flashMessage()
        ->validationMessage()
        ->errorMessages()
        ->GenerateCsrf()
        ->checkCsrf()
        ->logado();
    }
}
