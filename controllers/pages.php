<?php
include_once 'models/page.php';

function showPage($id) {
    $page = getPage($id) ;
    include_once 'views/pages/showPage.php';
}