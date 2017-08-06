<?php
include_once '_behaviors/menu.php';

function signup($username, $password) {
    $db = getDb();
    $insert = "INSERT INTO " .DB_PRE. "users 
               SET username = '" . mysqli_real_escape_string($db ,$username) . "',
               password = '" .sha1(SECURITY_SALT . $password) . "'";
    mysqli_query($db, $insert);
}

function login($username, $password) {
    $db = getDb();
    $username = mysqli_real_escape_string($db, $username) ;
    $password = sha1(SECURITY_SALT . $password) ;
    
    $query = "SELECT id FROM " .DB_PRE. "users 
              WHERE username = '{$username}' 
              AND password = '{$password}'" ;
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
         return mysqli_fetch_assoc($result);
    } else {
     return false ;   
    }
}