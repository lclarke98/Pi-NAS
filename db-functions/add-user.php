<?php
session_start();
  require_once "../config.php";
  
  $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT); 

  $sql = "INSERT INTO user (user_name, user_password) VALUES (?, ?)";
  $stmt = $link->prepare($sql);
  $stmt->bind_param('ss', $_POST['username'], $hashedPassword);

  if ($stmt->execute()) {
    header("location: ../user-management.php");
  } else {
    echo "Error: " . $link->error;
  }
  mysqli_close($link);
  shell_exec('/var/www/html/shell-scripts/test.sh');