<?php
include_once 'models/page.php';
include_once 'controllers/_components/session.php';
include_once 'views/_helpers/session.php';

function show_act($mPos=null) {
    if (!$mPos) {
        $mPos = 1;   
    }
    
    $page = getPage($mPos) ;
    if (!$page) {
        setFlash_cmp('errorMessage', "Page {$mPos} was not found!");
        $page = getFirstVisPos();
        header("Location:{$page}");
        exit;
    }
    include_once 'views/pages/showPage.php';
}