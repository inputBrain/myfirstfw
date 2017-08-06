<?php
include_once 'models/page.php';
include_once 'controllers/_components/session.php';
include_once 'views/_helpers/session.php';
include_once 'controller.php';
include_once 'views/_helpers/html.php';
include_once 'models/user.php';

function signup_act() {
    if ($_POST) {
        if ($_POST['password'] === $_POST['repassword']) {
            signup($_POST['username'], $_POST['password']);
            setFlash_cmp('successMessage', 'Авторизация прошла успешно');
            redirect_ctr('login');
        } else {
            setFlash_cmp('errorMessage', 'Авторизация не пройде');
            redirect_ctr('signup');
        }
    } else {
        display_ctr(); 
    }
   
}


function login_act() {
    $menu = getMenu();
    $vars = array('menu' => $menu);
    display_ctr($vars);
}
