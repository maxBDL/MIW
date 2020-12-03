<?php

require 'core/core.php';
require 'core/SPDO.php';
require 'core/Controller.php';
require 'core/Model.php';
//require 'controllers/Streamer.php';
//on créé un framework


//règle de routage
// www.monsite.com/
// www.monsite.com/streamer/liste
// www.monsite.com/CONTROLLER/ACTION

$webRoot = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
$request = str_replace($webRoot, '', $_SERVER['REDIRECT_URL']);
$request = explode('/', $request);
$controller = $request[0] !== ''?$request[0]:'accueil';
$action = isset($request[1]) && $request[1] !== ''?$request[1]:'index';
define('WEB_ROOT', $webRoot);

$controller = ucfirst(strtolower($controller)).'Controller';

//$controller = StreamerController
$requestController = new $controller();
//$action = index ou liste
if (method_exists($controller, $action)) {
    $methodReflector = new ReflectionMethod($requestController, $action);
    //liste des paramètres dela méthode $requestController->$action();
    //p($methodReflector->getParameters());
    $params = [];
    foreach ($methodReflector->getParameters() as $methodParam) {
        //le type de paramètre que la méthode demande
        //p($methodParam->getClass()->name);

        //si la classe demandé est une sous-classe de Model
        if (is_subclass_of($methodParam->getClass()->name, 'Model')) {
            //alors j'ai accès à ::find(id);
            $modelName = $methodParam->getClass()->name;
            //$paramObject = StreamerModel::find();
            $params[] = isset($_GET['id'])?$modelName::find($_GET['id']):new $modelName();
        } else {
            $params[] = null;
        }
    }
    call_user_func_array([$requestController, $action], $params);
    //(new StreamerController())->detail(new StreamerModel());
    //$requestController->$action();
} else {
    echo '404 - method not found';
}