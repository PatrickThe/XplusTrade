<?php

require_once("includes/connection.php");
// this is logout page when user click button logout in system page

session_start();
  date_default_timezone_set("Africa/Nairobi");
  $time = date("M-d-Y h:i A",strtotime("+0 HOURS"));

 $email_address = $_SESSION['email_address'];
  

mysqli_query($conn,"UPDATE history_log SET `logout_time` = '$time'  WHERE `email_address` = '$email_address'");

$_SESSION = NULL;
$_SESSION = [];
session_unset();
session_destroy();

echo  "<meta http-equiv=\"refresh\"content=\"0;URL=../login.php\">";
?>

