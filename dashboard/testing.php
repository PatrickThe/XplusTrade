<?php

function writeMsg() {
require_once("includes/connection.php");
$time = date('Y/m/d h:i:s a', time());
mysqli_query($conn,"UPDATE notifications SET status = '3'  WHERE date <'$time'");
}
writeMsg();
nextCount();
function nextCount(){
$query = "UPDATE user_meta SET active = '0' WHERE user_id = '125'";
$mysqli->query($query);

if($mysqli->affected_rows == 0){
    $query = "INSERT INTO user_meta (user_id, active) VALUES ('125', 0)";
    $mysqli->query($query);
 }
}




?>

