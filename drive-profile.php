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
            $drive = "'" . $_GET["drive_name"] . "'";
            $sql = "SELECT * FROM permission WHERE drive_name = $drive";
            $permissionList = $link->query($sql);
            echo $sql;
            if ($permissionList->num_rows > 0) {
            ?><ul><?php
                while ($row = $permissionList->fetch_assoc()) {
                ?>
                        <li>
                            <label> <?php echo $row["user_name"] ?> </label>
                            <input type="checkbox" name=<?php echo $row["user_name"] . "_read" ?> <?php echo ($row['permission_read']==1 ? 'checked' : '') ?>>
                            <input type="checkbox" name=<?php echo $row["user_name"] . "_write"?> <?php echo ($row['permission_write']==1 ? 'checked' : '') ?>>
                        </li>
                    <?php
                }
                    ?></ul><?php
                    } else {
                        ?>
                <p class="text-center">Error please go back to the dashboard</p>
            <?php
                    }
            ?>
        </div>

</body>

</html>