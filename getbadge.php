<?php
header('Content-Type: image/jpeg');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(!empty($_SERVER['HTTP_REFERER'])) {
    echo $_SERVER['HTTP_REFERER'];
}
else {
    defaultBadge();
}
function defaultBadge() {
    echo file_get_contents("https://github.com/FRC2713/Robot2023/actions/workflows/gradle.yml/badge.svg?branch=main");
    exit();
}
//https://github.com/FRC2713/Robot2023/actions/workflows/gradle.yml/badge.svg?branch=main