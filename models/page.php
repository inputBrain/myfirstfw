<?php

function getPage($mPos) {
    $db = getDb();
    $mPos = mysqli_real_escape_string($db, $mPos);
    
    $query = "SELECT *
        FROM " . DB_PRE . "pages
        WHERE menu_position = {$mPos}
        AND visible = '1'
        LIMIT 1";
        
    $result = mysqli_query($db, $query);
    return mysqli_fetch_assoc($result);
}

function getFirstVisPos() {

    $db = getDb();
    $query = "SELECT MIN(menu_position)
                AS min_m_pos
                FROM " . DB_PRE . "pages
                WHERE visible = '1' LIMIT 1";
    $result = mysqli_query($db, $query);
    $fvp = mysqli_fetch_assoc($result);
    return $fvp['min_m_pos'];
}
