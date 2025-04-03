<?php

$url = $_SERVER['REQUEST_URI']; // richiesta url con URI
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET'; // richiesta metodo

$url = trim(str_replace('mvc5F/', '', $url), '/');
require 'Router.php';

$routerClass = new Router();

$routerClass->addController('GET', 'home/index', 'HomeController', 'presentation1');
$routerClass->addController('GET', 'home/products', 'ProductController', 'show1');
$routerClass->addController('GET', 'home/services', 'ServiceController', 'presentation2');

$routerClass->addController('POST', 'home/index', 'HomeController', 'presentation11');
$routerClass->addController('POST', 'home/products', 'ProductController', 'show11');
$routerClass->addController('POST', 'home/services', 'ServiceController', 'presentation22');


$reValue = $routerClass->match($url, $method);
//echo $url; // /uda5F/mvc5F/index.php
//echo "<br>";
//echo $method; // GET


//echo "<br>";
//echo $url; // /uda5F/index.php

//echo '<br>';
//echo ' ciao sono index.php';





if (empty($reValue))
{
    http_response_code(404);
    die('pagina non trovata');
}

$controller=$reValue['controller'];

$action=$reValue['action'];
echo $action;

require $controller. ".php";
$controllerObj= new $controller();
$controllerObj-> $action();
