<?php

// session_start();

use app\classes\bind;
use app\core\functions\AddFunctionsTwig;
use app\core\functions\FunctionsTwig;
use app\core\Template;

require '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__FILE__, 2));
$dotenv->load();

Session::start();

date_default_timezone_set('America/Sao_Paulo');

// Inicia o template
$template = new Template();
$twig = $template->init();

// funcoes criadas para usar no template
$functionsTwig = new FunctionsTwig();
$functionsTwig->run();

// adicionando as funcoes para funcionar no template
$addFunctionsTwig = new AddFunctionsTwig();
$addFunctionsTwig->run($twig, $functionsTwig);

// Metodos vindos do baseController estendido em cada controller
Bind::bind('twig', $twig);
Sentry\init(['dsn' => SENTRY_DSN]);
