<?php
function signup($username, $password) {
    $db = getDb();
    $insert = "INSERT INTO " .DB_PRE. "users 
               SET username = '" . mysqli_real_escape_string($db ,$username) . "',
               password = '" .sha1(SECURITY_SALT . $password) . "'";
    mysqli_query($db, $insert);
}