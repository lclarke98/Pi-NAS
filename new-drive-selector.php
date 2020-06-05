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
                <h1>Add new drive</h1>
            </nav>
        </header>



        <h1>New Drives to add:</h1>
        <?php
        $dirs = glob("/media/*", GLOB_ONLYDIR);

        echo '<ul>';
        foreach ($dirs as $dir) {
            echo '<li><a href="drive-setup.php?path=' . $dir . '">' . $dir . '</a></li>';
        }
        echo '</ul>';
        ?>
    </div>
    <div id="adduser-modal">
        <button id="close-adduser-modal">Close</button>
        <form action="/db-functions/add-user.php" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <p1>Enter a username</p1>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <p1>Enter a password</p1>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group" id="center_buttons">
                <input type="submit" class="btn btn-primary" value="Add user">
            </div>
        </form>
    </div>
    <div id="overlay"></div>
</body>

</html>