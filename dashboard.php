
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/global.css">
</head>

<body>
<h1> <?php echo $_SESSION["path"];?> </h1>
<ul>
<li><a href="index.php">File Manager</a>
<li><a href="drive-settings.php">Settings</a>
<li><a href="main.php">Back To Main Menu</a>
</ul>

</body>
</html>
