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
                <button id="open-adduser-modal">Add New user</button>
            </nav>
        </header>



        <h1>User Management</h1>
        <?php
        $sql = "SELECT * FROM user";
        $userList = $link->query($sql);

        if ($userList->num_rows > 0) {
        ?><ul><?php
                while ($row = $userList->fetch_assoc()) {
                ?>
                    <li>
                        <a href="user-profile.php?user_name=<?php echo $row['user_name']; ?>">
                            <?php echo $row['user_name']; ?>
                        </a>
                    </li>
                <?php
                }
                ?></ul><?php
                    } else {
                        ?>
            <p class="text-center">No users to manage</p>
        <?php
                    }
        ?>
    </div>
    <div id="adduser-modal">
        <button id="close-adduser-modal">Close</button>
        <form action="./db-functions/add-user.php" method="post">
            <div class="form-group">
                <p1>Enter a username</p1>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <p1>Enter a password</p1>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <?php
                $sql = "SELECT * FROM drive";
                $permissionList = $link->query($sql);
                echo $sql;
                if ($permissionList->num_rows > 0) {
                ?><ul><?php
                        while ($row = $permissionList->fetch_assoc()) {
                        ?>
                            <li>
                                <label> <?php echo $row["drive_name"] ?> </label>
                                <input type="checkbox" value = 1 name=<?php echo $row["drive_name"] . "_read" ?>>
                                <input type="checkbox" value = 1 name=<?php echo $row["drive_name"] . "_write" ?>>
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

            <div class="form-group" id="center_buttons">
                <input type="submit" class="btn btn-primary" value="Add user">
            </div>
        </form>
    </div>
    <div id="overlay"></div>
</body>

</html>