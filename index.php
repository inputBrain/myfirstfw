<?php

$testString = "123";
include_once 'settings/startup.php';
$uri = $_SERVER['REQUEST_URI'];
$uri = preg_replace('/^\/' . APP_DIR . '\//i', '', $uri);
$uri = preg_replace('/^\//i', '', $uri);
//var_dump($uri); //string(11) "/showPage/1" 

include_once 'settings/routes.php';
include_once 'functions/functions.php';
$route = get_route($uri);

//var_dump($route); //array(3) { ["controller"]=> string(0) "" ["action"]=> NULL ["params"]=> array(0) { } }
include_once 'controllers/' . $route['controller'] . '.php';
call_user_func_array("{$route['action']}_act", $route['params']);

