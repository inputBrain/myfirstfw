<?php

$ROUTE['pages/show/(\d*)'] = 'pages/show/$1'; // 4 => pages/show/4
$ROUTE['blog'] = 'blog/show';

$ROUTE['(.*)/(.*)(?:/(.*))?'] = '$1/$2/$3';
