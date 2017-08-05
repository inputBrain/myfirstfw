<?php

include_once 'models/page.php';
include_once 'controllers/_components/session.php';
include_once 'views/_helpers/session.php';
include_once 'controller.php';
include_once 'views/_helpers/html.php';


function adminIndex_act() {
    include_once 'views/_helpers/session.php';
    $menu = getMenu('admin');
    display_ctr(compact('menu') ) ;
}

function addPage_act() {
    if ($_POST) {
        $result = addPage($_POST);
        if ($result) {
            setFlash_cmp('successMessage', 'Страница создана успешно');
            header('Location: ' . $_SERVER['REQUEST_URI']);
        } else {
            setFlash_cmp('errorMessage', 'Страницу создать не удалось');
            header('Location: ' . $_SERVER['REQUEST_URI']);
        }
    } else {
        $menu = getMenu('admin');
        $page = array('menu' => $menu, 'title' => 'Добавление страницы');
        display_ctr($page);
    }
}

function deletePage_act( $mPos ) {
    include_once 'controllers/_components/session.php';
    $result = deletePage($mPos);
    if ($result) {
        setFlash_cmp('successMessage', 'Успешно удалено') ;
        redirect_ctr('admin') ;
    } else {
        setFlash_cmp('errorMessage', 'Страницу не удалось удалить') ;
        redirect_ctr('admin') ;
    }
}

function editPage_act($mPos) {
    $db = getDb();
   
    if (!$_POST) {
        $page = getPage($mPos, 'admin');
        $menu = getMenu('admin');
        $page['menu'] = $menu ;
        display_ctr($page);
    } else {
       $result = editPage($_POST);
       header('Location: ' . $_SERVER['REQUEST_URI']);
    }
}

function show_act($mPos = null) {
    if (!$mPos) {
        $mPos = 1;
    }

    $page = getPage($mPos);
    if (!$page) {
        setFlash_cmp('errorMessage', "Page {$mPos} was not found!");
    }
    $menu = getMenu();
    $page['menu'] = $menu;
    display_ctr($page);
}

function login_act() {
    $menu = getMenu();
    $vars = array('menu' => $menu);
    display_ctr($vars);
}
