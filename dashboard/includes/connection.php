<?php 
$conn = mysqli_connect("localhost","root","","alphaactions");

if(!$conn){
	die("Connection error: " . mysqli_connect_error());	
}
?>