<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/global.css">
</head>

<body>
    <h1> <?php echo $_SESSION["username"]; ?> </h1>
    <ul>
        <li><a href="file-manager.php">File Manager</a>
        <li><a href="drive-management.php">Drive Management</a>
        <li><a href="user-management.php">User Management</a>
        <li><a href="logout.php">Logout</a>
    </ul>

</body>

</html>