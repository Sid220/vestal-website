<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function generateRandomString($length = 10) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "root", "", "test");

$stmt = $mysqli->prepare("SELECT * FROM `passwords` WHERE `meeting_id` = ?");
$stmt->bind_param("i", $_GET['room']);
if($stmt->execute()){
    $result = $stmt->get_result();
    if($result->num_rows == 1){
        print_r($result->fetch_assoc()["password"]);
    }else{
      // Hide invalid/non-existant results
      echo password_hash(generateRandomString(10), PASSWORD_DEFAULT);
    }
  }else{
    // Hide errors
    echo password_hash(generateRandomString(10), PASSWORD_DEFAULT);
  }