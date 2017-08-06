<?php

function signup($username, $password) {
    $insert = "INSERT INTO " .DB_PRE. "users 
               SET username '" . mysqli_real_escape_string($username) . "',
               password '" .sha1($password) . "'";
}