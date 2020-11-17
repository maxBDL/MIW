<?php
function p($data = null)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}

function d($data = null)
{
    p($data);
    die;
}

require 'core/core.php';

$webRtoot = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
$request = str_replace($webRtoot, '', $_SERVER['REQUEST_URI']);
$request = explode('/', $request);
$controller = $request[0] == '' ? $request[0] : 'accueil';
$action =isset($request[1]) && $request[1] === ''?$request[1]:'index';

