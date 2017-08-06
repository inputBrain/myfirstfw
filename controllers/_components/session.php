<?php
 if(!@session_id()) @session_start();
 
function setFlash_cmp($name,$message) {
    $_SESSION['flash'][$name] = $message;
}

function userLogin_cmp($id) {
    $_SESSION['user']['id'] = $id ;
}

function ifUserId_cmp() {
    if ($_SESSION['user']['id']) {
        return true;
    } else {
        return false;
    }
}