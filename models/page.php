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

function getMenu($mode = 'user') {
    $db = getDb();
    $query = "SELECT menu_name, menu_position
              FROM " . DB_PRE . "pages";
    if ($mode === 'user'){
        $query .= " WHERE visible = '1'";
    }
    $query .= " ORDER BY menu_position ASC";
    $result = mysqli_query($db, $query);
    $menu = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $menu[$row['menu_position']] = $row['menu_name'];
    }
    return $menu;
}