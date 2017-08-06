<?php

$ROUTE['pages/show/(\d*)'] = 'pages/show/$1'; // 4 => pages/show/4
$ROUTE['admin'] = 'pages/adminIndex' ;
$ROUTE['admin\/new-page'] = 'pages/addPage' ;
$ROUTE['admin\/edit-page/(\d+)'] = 'pages/editPage/$1' ;
$ROUTE['admin\/delete-page/(\d+)'] = 'pages/deletePage/$1' ;

$ROUTE['login'] = 'pages/login';
$ROUTE['signup'] = 'users/signup';

$ROUTE['(.*)/(.*)(?:/(.*))?'] = '$1/$2/$3';