<?php
session_start();
require_once "config.php";
?>

<!DOCTYPE hml>
<html>

<head>
   <link rel="stylesheet" href="css/global.css">
</head>

<body>
<div id="main-content">
        <header>
            <nav>
                
            </nav>
        </header>



        <h1>Select a drive</h1>
        <?php
        $sql = "SELECT * FROM drive";
        $driveList = $link->query($sql);

        if ($driveList->num_rows > 0) {
        ?><ul><?php
                while ($row = $driveList->fetch_assoc()) {
                ?>
                    <li>
                        <a href="open-file-manager.php?drive_path=<?php echo  $row['drive_path']?>&drive_name=<?php echo  $row['drive_name']?>">
                            <?php echo $row['drive_name']; ?>
                        </a>
                    </li>
                <?php
                }
                ?></ul><?php
                    } else {
                        ?>
            <p class="text-center">No drives to view go to the add drive page to add an new drive</p>
        <?php
                    }
        ?>
    </div>
</body>

</html> 