<!DOCTYPE hml>
<html>

<head>
   <link rel="stylesheet" href="css/global.css">
</head>

<body>
   <?php
   //Get a list of file paths using the glob function.
   $fileList = glob("C:\Users\Leo\Desktop\pi\*");
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