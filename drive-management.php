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
                <button><a href="new-drive-selector.php">Add new Drive</a></button>
            </nav>
        </header>



        <h1>Drive Management</h1>
        <?php
        $sql = "SELECT * FROM addedDrive";
        $userList = $link->query($sql);

        if ($userList->num_rows > 0) {
        ?><ul><?php
                while ($row = $userList->fetch_assoc()) {
                ?>
                    <li>
                        <a href="drive-profile.php?drive_name=<?php echo $row['addedDrive_name']; ?> & drive_id=<?php echo $row['addedDrive_id']; ?>">
                            <?php echo $row['addedDrive_name']; ?>
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
    <div id="adduser-modal">
        <button id="close-adduser-modal">Close</button>
        <form action="/db-functions/add-drive.php" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <p1>Give your new drive a name</p1>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group" id="center_buttons">
                <input type="submit" class="btn btn-primary" value="Add user">
            </div>
        </form>
    </div>
    <div id="overlay"></div>
</body>

</html>