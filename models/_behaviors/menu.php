<?php

function getMenu($mode = 'user') {
    $db = getDb();
    $query = "SELECT menu_name, menu_position
              FROM " . DB_PRE . "pages";
    if ($mode === 'user') {
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