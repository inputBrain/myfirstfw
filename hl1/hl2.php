<?php
function showText1($text) {
    echo "{$text}";;
}
function showText2(&$text) {
    echo "{$text}<br />";
}
$txt = "hello";
