<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo (password_verify($_GET['pass'], $_GET['hash']) ? "1" : "0");