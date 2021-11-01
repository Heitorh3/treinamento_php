<?php

function loadController($matchedUri, $params) {  
  [$controllerName, $methodName] = explode('@',array_values($matchedUri)[0]);
  $controllerWithNamespace = CONTROLLER_PATH.$controllerName;


  if(!class_exists($controllerWithNamespace, false)) {        
    throw new Exception("Controller '$controllerName' not found");
  }

  $controller = new $controllerWithNamespace;
  if(!method_exists($controller, $methodName)) {
      throw new Exception("The method '$methodName' not found");
  }
  
  return $controller->$methodName($params);
  
}