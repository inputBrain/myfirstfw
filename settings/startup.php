<?php
include_once 'settings/settings.php';



function getDb(){
    $db = mysqli_connect(DB_HOST,DB_USER,DB_PASS) OR
            die('DB connect error');
    @mysqli_select_db($db, DB_NAME) OR
            die('DB select error');
    @mysqli_query($db, 'SET NAMES UTF8') OR
            die('DB encoding error');
    return $db;
}