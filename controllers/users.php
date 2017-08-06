<?php
include_once 'models/page.php';
include_once 'controller.php';
include_once 'views/_helpers/html.php';


function signup_act() {
    display_ctr();
}


function login_act() {
    $menu = getMenu();
    $vars = array('menu' => $menu);
    display_ctr($vars);
}
