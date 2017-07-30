<?php
function element_hlp($_eName, $_varsArr) {
    $_eName = "views/_elements/{$_eName}.php";
    if (file_exists($_eName)) {
        if (is_array($_varsArr)) {
            extract($_varsArr);
            ob_start();
            include $_eName;
            return ob_get_clean();
        } else {
        echo 'Елемент не найден';    
        }
    }
}

function link_hlp($link) {
    $link = '/' . APP_DIR . '/' . $link ;
    return $link;
}
