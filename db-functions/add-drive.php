<?php
session_start();
  require_once "/var/www/html/config.php";

  $userSQL = "SELECT * FROM user";
  $stmtUsers = $link->query($driveSQL);
  $users = $stmtDrives->num_rows;
  
  $newPath = "/home/pi/nas-mount/" . $_POST["drive-name"];

  $sql = "INSERT INTO drive (drive_name, drive_path) VALUES (?, ?)";
  $stmt = $link->prepare($sql);
  $stmt->bind_param('ss', $_POST['drive-name'], $newPath);

  if ($stmt->execute()) {
    // add permissions here
    // sort permission
    foreach ($stmtUsers as $user) {
      $read = is_null($_POST[$user["user_name"] . "_read"]  ) ? false : true;
      $write = is_null($_POST[$user["user_name"] . "_write"]  ) ? false : true;
  
      $sql = "INSERT INTO permission (drive_name, user_name, permission_read, permission_write) VALUES (?, ?, ?, ?)";
      $stmt = $link->prepare($sql);
      $stmt->bind_param('ssii', $POST["drive-name"], $user['user_name'], $read, $write);
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