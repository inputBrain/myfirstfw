<?php

function display_ctr(array $_varsArr = array(), $_vName = null, $_lName = null) {
    $_vName = $_vName ? "views/{$_vName}.php" :
            "views/{$GLOBALS['route']['controller']}/{$GLOBALS['route']['action']}.php";
    $_lName = $_lName ? "views/_layouts/{$_lName}.php":
                        "views/_layouts/default.php" ;

    $lPath = APP_PATH. $_lName;
    $vPath = APP_PATH. $_vName;
    if (!file_exists($vPath) || !file_exists($lPath)) {
        die('Вид или обертка не найден');
    }

    extract($_varsArr);
    ob_start();
    include $_vName;
    $content_for_layout = ob_get_clean();
    include $_lName;
}

function redirect_ctr($url) {
    $url = '/' . APP_DIR . '/' . $url ;
    header("Location:{$url}" ) ;
    exit;
}