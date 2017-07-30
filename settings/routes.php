<?php

$ROUTE['pages/show/(\d*)'] = 'pages/show/$1'; // 4 => pages/show/4
$ROUTE['blog'] = 'blog/show';
$ROUTE['login'] = 'pages/login';
$ROUTE['admin\/new-page'] = 'pages/new-page';

$ROUTE['(.*)/(.*)(?:/(.*))?'] = '$1/$2/$3';
