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
                <button><a href="new-drive-selector.php">Cancel</a></button>
            </nav>
        </header>



        <h1>Setup <?php echo $_GET['path']; ?> </h1>
        <form action="/db-functions/add-drive.php" method="post">
            <div class="form-group <?php echo (!empty($drive_name_err)) ? 'has-error' : ''; ?>">
                <p1>Give your new drive a name</p1>
                <input type="hidden" name="path" value="<?php echo $_GET['path']; ?>">
                <input type="text" name="drive-name" class="form-control" value="<?php echo $drive_name; ?>">
                <span class="help-block"><?php echo $drive_name_err; ?></span>

                //permissions here
                <h2> Please assign users read and write permissions</h2>

                <div class="form-group">
                <?php
                $sql = "SELECT * FROM user";
                $permissionList = $link->query($sql);
                echo $sql;
                if ($permissionList->num_rows > 0) {
                ?><ul><?php
                        while ($row = $permissionList->fetch_assoc()) {
                        ?>
                            <li>
                                <label> <?php echo $row["user_name"] ?> </label>
                                <input type="checkbox" value = 1 name=<?php echo $row["user_name"] . "_read" ?>>
                                <input type="checkbox" value = 1 name=<?php echo $row["user_name"] . "_write" ?>>
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

            </div>
            <div class="form-group" id="center_buttons">
                <input type="submit" class="btn btn-primary" value="Add Drive">
            </div>
        </form>
    </div>

</body>

</html>