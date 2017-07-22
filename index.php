<?php
include_once 'settings/startup.php';
$uri = $_SERVER['REQUEST_URI'];
//echo $uri . '<hr />';
$uri = preg_replace('/^\/'.APP_DIR.'\//i', '', $uri);
//echo $uri . '<hr />';
$params = explode("/", $uri);
//var_dump($params);
$controller = array_shift($params);
$action = array_shift($params);
//echo $controller . '<hr />' ;
//echo $action . '<hr />' ;
include_once '/controllers/pages.php' ;
call_user_func_array($action, $params);
