<?php

function getPage($mPos, $mode = 'user') {
    $db = getDb();
    $mPos = mysqli_real_escape_string($db, $mPos);
    $query = "SELECT *
              FROM " . DB_PRE . "pages
              WHERE menu_position = {$mPos}";
    if ($mode === 'user') {
        $query .= " AND visible = '1'";
        $query .= "LIMIT 1";
    }
    $result = mysqli_query($db, $query);
    return mysqli_fetch_assoc($result);
}

function addPage($post) {
    $db = getDb();
    $visible = (intval($post['visible']) === 1) ? 1 : 0;
    $menu_position = intval($post['menu_position']);
    $mmp = maxMenuPosition();
    if ($menu_position < 1 OR $menu_position > ($mmp + 1)) {
        $menu_position = $mmp + 1;
//1.array($menu_position => $mmp) ;
    }
    if ($menu_position <= $mmp) {
        incMenuPositions($menu_position);
    }
    $keywords = mysqli_real_escape_string($db, $post['keywords']);
    $description = mysqli_real_escape_string($db, $post['description']);
    $menu_name = mysqli_real_escape_string($db, $post['menu_name']);
    $menu_position = mysqli_real_escape_string($db, $menu_position);
    $title = mysqli_real_escape_string($db, $post['title']);
    $content = mysqli_real_escape_string($db, $post['content']);
    $visible = mysqli_real_escape_string($db, $visible);
    $insert = "INSERT INTO " . DB_PRE . "pages
               SET keywords = '{$keywords}', 
               description = '{$description}', 
               menu_name = '{$menu_name}', 
               menu_position = '{$menu_position}', 
               title = '{$title}', 
               content = '{$content}', 
               visible = '{$visible}'";
    $result = mysqli_query($db, $insert);
    return $result;
}

//еще одна спомогательная ф-ция для addPage задача её состоит в том, чтобы сдвигать позиции меню вниз:
function incMenuPositions($start) {
    $db = getDb();
    $start = mysqli_real_escape_string($db, $start);
    $update = "UPDATE " . DB_PRE . "pages
              SET menu_positions = menu_positions + 1 
              WHERE menu_positions >= {$start}";
    mysqli_query($db, $update);
}

// Максимальное значение в menu_positions(спомогательная ф-ция для addPage) :
function maxMenuPosition() {
    $db = getDb();
    $select = "SELECT MAX(menu_position)
               AS mmp FROM " . DB_PRE . "pages";
    $result = mysqli_query($db, $select);
    $auxReturn = mysqli_fetch_assoc($result);
    return intval($auxReturn[mmp]);
    //1.return mysqli_fetch_assoc($result);
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
