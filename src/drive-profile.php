<?php
session_start();
require_once "config.php";
?>

<!DOCTYPE hml>
<html>

<head>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/user-management.css">
    <script type="text/javascript" src="javascript/user-management.js"></script>
</head>

<body>
    <div id="main-content">
        <header>
            <nav>
                <h1> <?php echo $_GET["drive_name"] ?> </h1>
            </nav>
        </header>

        <div id="permission-table">
        <?php
        $drive = $_GET["drive-name"];
        $sql = "SELECT * FROM permission WHERE drive_name = $drive";
        $permissionList = $link->query($sql);

        if ($permissionList->num_rows > 0) {
        ?><ul><?php
                while ($row = $userList->fetch_assoc()) {
                ?>
                    <li>
                        <a href="drive-profile.php?drive_name=<?php echo $row['drive_name']; ?> & drive_id=<?php echo $row['drive_id']; ?>">
                            <?php echo $row['drive_name']; ?>
                        </a>
                    </li>
                <?php
                }
                ?></ul><?php
                    } else {
                        ?>
            <p class="text-center">No drives to manage go to the add drive page to add an new drive</p>
        <?php
                    }
        ?>
        </div>

</body>

</html>