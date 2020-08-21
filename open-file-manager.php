<?php
session_start();
require_once "config.php";

//set selected path as session path
$_SESSION["path"] = $_GET["drive_path"];

//determin the r+w permissions for user

$sql = "SELECT * FROM permission WHERE user_name ='$_SESSION[username]' AND drive_name = '$_GET[drive_name]'";
$result = $link->query($sql);
$permission = $result->fetch_assoc();
$drives = $result->num_rows;
//redirect to correct file manager
//echo '<script type="text/javascript">alert("' . $permission["permission_write"] . '")</script>';

if($permission["permission_write"] == true){
    header("location: ./file-manager.php");
}elseif ($permission["permission_write"] == false && $permission["permission_read"] == false) {
    echo '<script type="text/javascript">alert("You do not have permission to access this drive")</script>';
    header("location: ./file-manager-selector.php");
}else{
    header("location: ../file-manager-read.php");
}

?>