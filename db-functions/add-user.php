<?php
session_start();
require_once "../config.php";

$driveSQL = "SELECT * FROM drive";
$stmtDrives = $link->query($driveSQL);
$drives = $stmtDrives->num_rows;

$hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO user (user_name, user_password) VALUES (?, ?)";
$stmt = $link->prepare($sql);
$stmt->bind_param('ss', $_POST['username'], $hashedPassword);

if ($stmt->execute()) {
  // add permissions here
  // sort permission
  foreach ($stmtDrives as $drive) {
    $read = is_null($_POST[$drive["drive_name"] . "_read"]  ) ? false : true;
    $write = is_null($_POST[$drive["drive_name"] . "_write"]  ) ? false : true;

    $sql = "INSERT INTO permission (drive_name, user_name, permission_read, permission_write) VALUES (?, ?, ?, ?)";
    $stmt = $link->prepare($sql);
    $stmt->bind_param('ssii', $drive["drive_name"], $_POST['username'], $read, $write);
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

?>