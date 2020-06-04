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
                        <a href="user-profile.php?user_name=<?php echo $row['user_name']; ?> & user_id=<?php echo $row['user_id']; ?>">
                            <?php echo $row['user_name']; ?>
                        </a>
                    </li>
                <?php
            }
                ?></ul><?php
                } else {
                    ?>
            <p class="text-center">No users to add!</p>
        <?php
                }
        ?>
    </div>
    <div id="adduser-modal">
        <button id="close-adduser-modal">Close</button>
    </div>
    <div id="overlay"></div>
</body>

</html>