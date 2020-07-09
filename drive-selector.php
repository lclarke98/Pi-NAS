<!DOCTYPE hml>
<html>

<head>
   <link rel="stylesheet" href="css/global.css">
</head>

<body>
<h1>Welcome</h1>
   <?php
   //Get a list of file paths using the glob function.
   $fileList = glob('/home/pi/nas-mount/*');

   //Loop through the array that glob returned.
   foreach ($fileList as $filename) {
      ?>
      <a href="openDashboard.php?path=<?php echo $filename; ?>">
         <?php echo $filename; ?>
      </a>
   <?php
   };
   ?>
</body>

</html> 