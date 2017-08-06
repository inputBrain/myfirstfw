<?php
include_once '_behaviors/menu.php';

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

function editPage($page) {
    $db = getDb();
    $page['visible'] = intval($page['visible']);
    if ($page['visible'] !== 1) {
        $page['visible'] = 0;
    }
    //Валидируем позицию в меню
    $page['menu_position'] = intval($page['menu_position']);
    $mPositions = getListOfMenuPositions();
    if (!in_array($page['menu_position'], $mPositions)) {
        return false;
    }
        // Готовим позиции в меню, сдвигая их вверх или вниз, для того, чтобы можно было
        // применить новую позицию из $_POST данных
        $currentPosition = $mPositions[$page['id']];
        $postPositions = $page['menu_position'];
        if ($currentPosition > $postPositions) {
            $update = "UPDATE " . DB_PRE . "pages
                SET menu_positions = menu_position + 1
                WHERE menu_position >=" . mysqli_real_escape_string($db, $postPositions) . "
                AND menu_position < " . mysqli_real_escape_string($db, $currentPositions);
            mysqli_query($db, $update);
        } elseif ($currentPosition < $postPositions) {
            $update = "UPDATE " . DB_PRE . "pages
                SET menu_positions = menu_position - 1
                WHERE menu_position >" . mysqli_real_escape_string($db, $currentPosition) . "
                AND menu_position <= " . mysqli_real_escape_string($db, $postPositions);
            mysqli_query($db, $update);
        }
        // изменяем запись в соответствии с пришедшими ПОСТ данными
        $update = "UPDATE " . DB_PRE . "pages
                   SET keywords = '" . mysqli_real_escape_string($db, $page['keywords']) . "',
                   description = '" . mysqli_real_escape_string($db, $page['description']) . "',
                   menu_name = '" . mysqli_real_escape_string($db, $page['menu_name']) . "',
                   menu_position = " . mysqli_real_escape_string($db, $page['menu_position']) . ",
                   title = '" . mysqli_real_escape_string($db, $page['title']) . "',
                   content = '" . mysqli_real_escape_string($db, $page['content']) . "'
                   visible = '" . mysqli_real_escape_string($db, $page['visible']) . "'
                 WHERE id = " . mysqli_real_escape_string($db, $page['id']) ;
        $result = mysqli_query($db, $update);
        return $result;
    }

function deletePage($mPos) {
    $db = getDb();
    $query = "DELETE FROM " . DB_PRE. "pages "
            . "WHERE menu_position='" . ((int) $mPos) . '\' LIMIT 1';
    $result = mysqli_query($db, $query);
    if (mysqli_affected_rows($db) < 1) {
        return false ;
    }
    $update = "UPDATE " . DB_PRE . "pages
              SET menu_position = menu_position - 1
              WHERE menu_position = " . ((int) $mPos);
    if ($result) {
        $result = mysqli_query($db, $update);
        return  $result;
    }
}

//еще одна Вспомогательная ф-ция для addPage задача её состоит в том, чтобы сдвигать позиции меню вниз:
function incMenuPositions($start) {
    $db = getDb();
    $start = mysqli_real_escape_string($db, $start);
    $update = "UPDATE " . DB_PRE . "pages
              SET menu_position = menu_position + 1
              WHERE menu_position >= {$start}";
    mysqli_query($db, $update);
}

// Максимальное значение в menu_position(Вспомогательная ф-ция для addPage) :
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


function getListOfMenuPositions() {
    $db = getDb();
    $menu_positions = array();
    $select = "SELECT id , menu_position FROM " . DB_PRE . "pages ORDER BY menu_position";
    $result = mysqli_query($db, $select);
    while ($row = mysqli_fetch_assoc($result)) {
        $menu_positions[(int) $row['id']] = $row['menu_position'];
    }
    return $menu_positions;
}
