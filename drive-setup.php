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
            </div>
            <div class="form-group" id="center_buttons">
                <input type="submit" class="btn btn-primary" value="Add Drive">
            </div>
        </form>
    </div>

</body>

</html>