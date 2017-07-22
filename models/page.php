<?php
 
function getPage($id) {
    $db = getDb();
    $id = mysqli_real_escape_string($db, $id);
    $query = "SELECT * FROM k_pages WHERE id = {$id} LIMIT 1";
    $result = mysqli_query($db, $query);
    return mysqli_fetch_assoc($result) ;
}