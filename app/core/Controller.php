<?php

function loadController($matchedUri, $params)
{
    [$controllerName, $methodName] = explode('@', array_values($matchedUri)[0]);
    $controllerWithNamespace = CONTROLLER_PATH . $controllerName;

    if (!class_exists($controllerWithNamespace)) {
        throw new Exception("Controller '$controllerName' não foi encontrado");
    }

    $controllerInstance = new $controllerWithNamespace();
    if (!method_exists($controllerInstance, $methodName)) {
        throw new Exception("O método {$methodName} não existe no controller {$controllerName}");
    }

    $controller = $controllerInstance->$methodName($params);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        die();
    }

    return $controller;
}
