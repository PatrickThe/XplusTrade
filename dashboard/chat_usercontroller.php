<style type="text/css">
	.right {
  position: relative;
  background: aqua;
  text-align: right;
  min-width: 45%;
  padding: 10px 15px;
  border-radius: 6px;
  border: 1px solid #ccc;
  float: right;
  right: 20px;
}

.right::before {
  content: '';
  position: absolute;
  visibility: visible;
  top: -1px;
  right: -10px;
  border: 10px solid transparent;
  border-top: 10px solid #ccc;
}

.right::after {
  content: '';
  position: absolute;
  visibility: visible;
  top: 0px;
  right: -8px;
  border: 10px solid transparent;
  border-top: 10px solid aqua;
  clear: both;
}



.left {
  position: relative;
  background: lightgreen;
  text-align: left;
  min-width: 45%;
  padding: 10px 15px;
  border-radius: 10px;
  border: 1px solid green;
  float: left;
  left: 20px;
}

.left::before {
  content: '';
  position: absolute;
  visibility: visible;
  top: -2px;
  right: -18px;
  border: 10px solid transparent;
  border-top: 10px solid lightgreen;
}

.left::after {
  content: '';
  position: absolute;
  visibility: visible;
  top: 0px;
  left: -8px;
  border: 10px solid transparent;
  border-top: 10px solid lightgreen;
  clear: both;
}
</style>
<?php
	include ('includes/connection.php');
	session_start();
	if(isset($_POST['msg'])){	
	date_default_timezone_set("Africa/Nairobi");
  $date = date("M-d-Y h:i A",strtotime("+0 HOURS"));
		
		$msg = addslashes($_POST['msg']);
		$id = $_POST['id'];
		$username = $_POST['username'];
		$to_user = $_POST['to_user'];
		mysqli_query($conn,"insert into `chat` (chat_id_admin, chat_msg, username,to_user, chat_date) values ('$id','$msg','admin','$to_user','$date')") or die(mysqli_error());
	}
?>
<?php
	if(isset($_POST['res'])){
		$id = $_POST['id'];
	?>
	<?php
		$query=mysqli_query($conn,"select * from `chat` where chat_id_admin='$id'") or die(mysqli_error());
		while($row=mysqli_fetch_array($query)){
         $username=$row['username'];
         $chat_msg=$row['chat_msg'];
         $chat_date=$row['chat_date'];


	if($username=='admin'){
		$username='ME';
          echo "<div align='left' style='background-color:lightgray' >";
          echo "<table style='background-color:lightgreen' ><tr><td>";
		echo "<strong>$username </strong></br> $chat_msg; <br>";
		echo "<span>$chat_date</span><br>";
		 echo "</td></tr></table>";
		echo "</div>";
		echo"<br>";

	}
	else{
		$username=$username;
		echo "<div align='right' style='background-color:lightblue' >";
		echo "<strong><i>$username </i></strong></br>  $chat_msg; <br>";
		echo "<i><h20>$chat_date</h20></i><br>";
		echo "</div>";
		echo"<br>";
	}
		
	

		

		
	}}?>

