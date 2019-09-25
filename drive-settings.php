
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
<li><a href="rename.php">Rename</a>
<li><a href="dashboard.php">Back To Dashboard</a>
</ul>

</body>
</html>
