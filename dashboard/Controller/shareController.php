  <?php
  require_once("../includes/connection.php");
  if (isset($_POST['manage_share'])) { // if save button on the form is clicked
$share_price =$_POST['share_price'];
$available_shares =$_POST['available_shares'];
$id = $_POST['id'];

 mysqli_query($conn,"UPDATE shares SET share_price= '$share_price',available_shares= '$available_shares' WHERE  id='$id'")or die(mysqli_error($conn));
            
                   echo  "<meta http-equiv=\"refresh\"content=\"0;URL=../shareholders.php\">";
}

if (isset($_POST['manage_bidding'])) { // if save button on the form is clicked
$lower_limit =$_POST['lower_limit'];
$upper_limit =$_POST['upper_limit'];
$daily_limit =$_POST['daily_limit'];
$id = $_POST['id'];

 mysqli_query($conn,"UPDATE shares SET lower_limit= '$lower_limit',upper_limit= '$upper_limit',daily_target='$daily_limit'  WHERE  id='$id'")or die(mysqli_error($conn));
            
                   echo  "<meta http-equiv=\"refresh\"content=\"0;URL=../share_buying.php\">";
}




if (isset($_POST['deactive_shares'])) { 
$shares_id=$_POST['shares_id'];
//$shares=$_POST['shares'];
$available_shares=$_POST['available_shares'];


$sql="UPDATE share_transactions SET is_active='0' WHERE id='$shares_id'";
 if (mysqli_query($conn, $sql)) {
     mysqli_query($conn,"UPDATE shares SET available_shares='$available_shares' WHERE status='1'")or die(mysqli_error($conn));
 echo '
                     <script type = "text/javascript">
                    window.location = "../deactivate_shares.php";
                </script>';
 }
}


if(isset($_POST['delete_trans'])){
$shares_id=$_POST['shares_id'];
$user_id=$_POST['user_id'];
$rem_shares=$_POST['rem_shares'];

mysqli_query($conn,"UPDATE shares SET available_shares=$rem_shares WHERE status='1'")or die(mysqli_error($conn));
  
  $sql1 = "delete from share_transactions where id='$shares_id'";
            if (mysqli_query($conn, $sql1)) {
                   echo '
                     <script type = "text/javascript">
                    window.location = "../dashboard.php";
                </script>';
                mysqli_query($conn,"INSERT INTO transaction_logs (user_id,transaction_id,details) VALUES ('$user_id','5','Deleted share')")or die(mysqli_error($conn));

              }
              else {
                   echo '
                     <script type = "text/javascript">
                     alert("failed to delete for now");
                    window.location = "../dashboard.php";
                </script>';

              }
}







if (isset($_POST['reconcile_account'])) { 
$user=$_POST['user'];
$user_id=$_POST['user_id'];
$maturity=$_POST['maturity'];
$pay_id=$_POST['pay_id'];
mysqli_query($conn,"UPDATE login_user SET share_update='$maturity' Where user_id='$user_id'")or die(mysqli_error($conn));

mysqli_query($conn,"UPDATE transaction_logs SET status='0' Where id='$pay_id'")or die(mysqli_error($conn));
        echo '
          <script type = "text/javascript">
                    window.location = "../recvoncile_shares.php";
                </script>';
}
?>