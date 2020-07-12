<?php
session_start();
require_once "../config.php";

$hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO user (user_name, user_password) VALUES (?, ?)";
$stmt = $link->prepare($sql);
$stmt->bind_param('ss', $_POST['username'], $hashedPassword);

if ($stmt->execute()) {
  // add permissions here
  $sql = "SELECT * FROM drive";
  $stmt = $link->query($sql);
  $drives = count($tmt);
  // sort permission
  for ($i = 0; $i <= $drives; $i++) {
    $read =  $_GET[$drives["drive_name"] . "_read"];
    $write = $_GET[$drives["drive_name"] . "_write"];
    $sql = "INSERT INTO permission (drive_name, user_name, permission_read, permission_write) VALUES (?, ?, ?, ?)";
    $stmt = $link->prepare($sql);
    $stmt->bind_param('ssii', $drives["dride_name"], $_POST['username'], $read, $write);
  }
  if($stmt->execute()){
    //shell_exec('/var/www/html/shell-scripts/test.sh');
    header("location: ../user-management.php");
  }else{
    echo "Error: " . $link->error;
  }
} else {
  echo "Error: " . $link->error;
}
mysqli_close($link);

