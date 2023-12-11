<?php

use app\classes\bind;
use app\core\functions\AddFunctionsTwig;
use app\core\functions\FunctionsTwig;
use app\core\Template;
use Predis\Autoloader;
use Predis\Client;

require '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__FILE__, 2));
$dotenv->load();

Session::start();

date_default_timezone_set('America/Sao_Paulo');

// Inicia o template
$template = new Template();
$twig = $template->init();

// Funcoes criadas para usar no template
$functionsTwig = new FunctionsTwig();
$functionsTwig->run();

// Adicionando as funções para funcionar no template
$addFunctionsTwig = new AddFunctionsTwig();
$addFunctionsTwig->run($twig, $functionsTwig);

// Conexão com redis
Autoloader::register();
$client = new Client([
    'scheme' => 'tcp',
    'host' => 'server_cache',
    'port' => 6379,
]);

// Metodos vindos do baseController estendido em cada controller
Bind::bind('twig', $twig);
Bind::bind('cache', $client);

Sentry\init(['dsn' => SENTRY_DSN]);
