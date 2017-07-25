<?php

if (!@session_id()) {
    @session_start();
}

function getFlash_hlp($name, $unset = true) {
    if (!$unset) {
        return $_SESSION['flash'][$name];
    }

    $message = $_SESSION['flash'][$name];
    unset($_SESSION['flash'][$name]);
    return $message;
}
