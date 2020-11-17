<?php

require 'core/core.php';
require 'core/Controller.php';
//require 'controllers/Streamer.php';
//on créé un framework


//règle de routage
// www.monsite.com/
// www.monsite.com/streamer/liste
// www.monsite.com/CONTROLLER/ACTION

$webRoot = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
$request = str_replace($webRoot, '', $_SERVER['REQUEST_URI']);
$request = explode('/', $request);
$controller = $request[0] !== ''?$request[0]:'accueil';
$action = isset($request[1]) && $request[1] !== ''?$request[1]:'index';

$controller = ucfirst(strtolower($controller)).'Controller';

//$controller = StreamerController
$requestController = new $controller();
//$action = index ou liste
if (method_exists($controller, $action)) {
    $requestController->$action();
} else {
    echo '404 - method not found';
}