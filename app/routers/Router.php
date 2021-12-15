<?php

function exactMatchUriInArrayRoutes($uri, $routes){
  return (array_key_exists($uri, $routes)) ? [$uri => $routes[$uri]] : [];
}

function regularExpressionMatchArrayRoutes($uri, $routes){
  return array_filter(
    $routes, 
    function($value) use($uri){ 
      $regex = str_replace('/', '\/', ltrim($value,'/'));
      return preg_match("/^$regex$/", ltrim($uri,'/'));
  }, ARRAY_FILTER_USE_KEY);
}

function getParams($uri, $matchUri){
  if(!empty($matchUri)){
    $matchedToGetParams = array_keys($matchUri)[0];
    return array_diff(
      explode('/', ltrim($uri, '/')), 
      explode('/', ltrim($matchedToGetParams, '/')));
  }
  return [];
}

function formatParams($uri, $params){
  $uri = explode('/', ltrim($uri, '/'));
  $paramsData = [];
  
  foreach($params as $index => $param){
    $paramsData[$uri[$index -1 ]] = $param;
  }

  return $paramsData;
}

function router() {
  $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

  $routes = require 'Routes.php';
  $requestMethod = $_SERVER['REQUEST_METHOD'];
 
  $matchUri = exactMatchUriInArrayRoutes($uri, $routes[$requestMethod]);

  $params = [];

  if(empty($matchUri)){
    $matchUri = regularExpressionMatchArrayRoutes($uri, $routes[$requestMethod]);   

    $params = getParams($uri, $matchUri);   
    $params = formatParams($uri, $params);
  } 

  if ($_ENV['MAINTENANCE'] === 'true') {
    $matchUri = ['/maintenance' => 'Maintenance@index'];
  }

  if(!empty($matchUri)){
    return loadController($matchUri, $params);
  }

  throw new Exception("No route defined for this URI.");
}