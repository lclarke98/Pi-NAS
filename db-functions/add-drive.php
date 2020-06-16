<?php
session_start();
  require_once "/var/www/html/config.php";
  
  $newPath = "/home/pi/nas-mount/" + $_POST["drive-name"];

  $sql = "INSERT INTO drive (drive_name, drive_path) VALUES (?, ?)";
  $stmt = $link->prepare($sql);
  $stmt->bind_param('ss', $_POST['drive-name'], $newPath);

  if ($stmt->execute()) {
    header("location: ../user-management.php");
  } else {
    echo "Error: " . $link->error;
  }
  mysqli_close($link);

  shell_exec('/var/www/html/shell-scripts/add-drive.sh');

?>