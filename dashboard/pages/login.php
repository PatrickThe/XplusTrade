<?php 
	session_start();

	// variable declaration
	require_once("../includes/connection.php");
   
  if (isset($_POST['reg_user'])) {
		date_default_timezone_set("asia/manila");
        $date = date("M-d-Y h:i A",strtotime("+0 HOURS"));
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$email_address = mysqli_real_escape_string($conn, $_POST['email_address']);
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT, array('cost' => 12));
		//$password_2 = password_hash($_POST['password_2'],PASSWORD_DEFAULT, array('cost' => 12));
		$user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $remarks="Has LoggedIn the system at";   
        $ip = $_SERVER["REMOTE_ADDR"];
        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);

		// form validation: ensure that the form is correctly filled
		if (empty($name)) { array_push($errors, "Username is required"); }
		if (empty($email_address)) { array_push($errors, "Email is required"); }
		if (empty($password)) { array_push($errors, "Password is required"); }

		
		// register user if there are no errors in the form
		
			$query = "INSERT INTO login_user (name, email_address, user_password,ip,host) 
					  VALUES('$name', '$email_address', '$password','$ip','$host')";
			mysqli_query($conn, $query);

  mysqli_query($conn,"INSERT INTO history_log(id,email_address,action,ip,host,login_time) VALUES('0','$email_address','$remarks','$ip','$host','$date')")or die(mysqli_error($conn));
 mysqli_query($conn,"INSERT INTO referal(user_id,email) VALUES('$user_id','$email_address')")or die(mysqli_error($conn));
			$_SESSION['email_address'] = $email_address;
			$_SESSION['success'] = "You are now logged in";
			header('location: ../dashboard.php');
		

	}




	if(isset($_POST["logIn"])){

  date_default_timezone_set("asia/manila");
  $date = date("M-d-Y h:i A",strtotime("+0 HOURS"));

 $email_address = mysqli_real_escape_string($conn, $_POST["email_address"]);  
 $user_password = mysqli_real_escape_string($conn, $_POST["user_password"]);


$query=mysqli_query($conn,"select * from login_user where email_address='$email_address'");
$row=mysqli_fetch_array($query);
	
	if (mysqli_num_rows($query)<1){
	
		echo "<script>window.alert('Login Error. No such account .')</script>";
		echo "<script>window.location.href='../../register.php'</script>";
	
	}
	else
			  {
			  if(password_verify($user_password, $row["user_password"]))  
                 {
				  //$_SESSION['email_address']=$row['email_address'];	
			
                        if (!empty($_SERVER["HTTP_CLIENT_IP"]))
							{
							 $ip = $_SERVER["HTTP_CLIENT_IP"];
							}
							elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
							{
							 $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
							}
							else
							{
							 $ip = $_SERVER["REMOTE_ADDR"];
							}

							$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);


                           $remarks="Has LoggedIn the system at";  
                      
                          mysqli_query($conn,"INSERT INTO history_log(id,email_address,action,ip,host,login_time) VALUES('0','$email_address','$remarks','$ip','$host','$date')")or die(mysqli_error($conn));
                              session_start();
 $_SESSION['email_address'] = $email_address;
			header('location: ../dashboard.php');
	}else{

		echo "<script>window.alert('Login Error. Wrong credentials.')</script>";
		echo "<script>window.location.href='../../login.php'</script>";
	}
}
}


?>