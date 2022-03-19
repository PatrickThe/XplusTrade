<?php
  require_once("../includes/connection.php");
if (isset($_POST['harvest_referal'])) { 
$points=$_POST['points'];
$user_id=$_POST['user_id'];
$share_id=$_POST['share_id'];
$email=$_POST['email'];


$check_email = mysqli_query($conn, "SELECT email FROM referal where email='$email' And status='1'");
if(mysqli_num_rows($check_email) > 0){
mysqli_query($conn,"UPDATE referal SET points='$points' WHERE email='$email'")or die(mysqli_error($conn));
mysqli_query($conn,"UPDATE share_transactions SET is_harv='1' WHERE id='$share_id'")or die(mysqli_error($conn));
  echo '<script type = "text/javascript">
    window.location = "../referal_shares.php";
    </script>';
    	
}else{
    mysqli_query($conn,"UPDATE share_transactions SET is_harv='1' WHERE id='$share_id'")or die(mysqli_error($conn));
 echo '<script type = "text/javascript">
    window.location = "../referal_shares.php";
    </script>';


}
    
}







if (isset($_POST['harvest_ref'])) { 
$ref_id=$_POST['ref_id'];
$expected_bal=$_POST['expected_bal'];
$user_id=$_POST['user_id'];

$sql="UPDATE login_user SET expected_bal='$expected_bal' WHERE user_id='$user_id'";
 if (mysqli_query($conn, $sql)) {
     mysqli_query($conn,"UPDATE referal SET status='0' WHERE id='$ref_id'")or die(mysqli_error($conn));
     
 echo '
                     <script type = "text/javascript">
                    window.location = "../harvest_referal.php";
                </script>';
 }
}
?>