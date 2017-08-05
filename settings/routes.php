<?php

$ROUTE['pages/show/(\d*)'] = 'pages/show/$1'; // 4 => pages/show/4
$ROUTE['admin'] = 'pages/adminIndex' ;
$ROUTE['blog'] = 'blog/show';
$ROUTE['login'] = 'pages/login';
$ROUTE['admin\/new-page'] = 'pages/addPage' ;
$ROUTE['admin\/edit-page/(\d+)'] = 'pages/editPage/$1' ;
$ROUTE['admin\/delete-page/(\d+)'] = 'pages/deletePage/$1' ;

$ROUTE['(.*)/(.*)(?:/(.*))?'] = '$1/$2/$3';
