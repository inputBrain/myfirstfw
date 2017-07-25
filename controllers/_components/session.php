<?php
 if(!@session_id()) @session_start();
 
function setFlash_cmp($name,$message) {
    $_SESSION['flash'][$name] = $message;
}