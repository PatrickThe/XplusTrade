<?php
require_once("../includes/connection.php");
if (isset($_POST['share_trans'])) { 
$user_id=$_POST['user_id'];
$shares=$_POST['shares'];
$amount=$_POST['amount'];
$maturity=$_POST['maturity'];
$intreast=$_POST['intreast'];
$gross_amount=$_POST['gross_amount'];
//$status=$_POST['status'];
$maturity_time=$_POST['maturity_time'];
date_default_timezone_set("Africa/Nairobi");
$date = date("M-d-Y h:i A",strtotime("+0 HOURS"));
$maturity_date=date('Y-m-d H:i',strtotime($maturity_time,strtotime($date)));
$remaining_shares=$_POST['remaining_shares'];

 date_default_timezone_set("Africa/Nairobi");
$today = date("Y-m-d H:i:s",strtotime("+0 HOURS"));


if($maturity_date<$today){
     echo'<script type = "text/javascript">
                     alert("There was a problem with your timer...fill every detail correctly please")
                    window.location = "../dashboard.php";
                </script>';
    
}
else{
$check_email = mysqli_query($conn,"SELECT *FROM share_transactions where user_id='$user_id' And status!='3'");
if(mysqli_num_rows($check_email) > 0){
echo '
                     <script type = "text/javascript">
                     alert("There was another bidded share that is unpaid..complete pay then proceed")
                    window.location = "../dashboard.php";
                </script>';
//out put error..cant bids
}else{
     // execute
     if($shares<='70'){
     mysqli_query($conn,"UPDATE shares SET available_shares=$remaining_shares-$shares WHERE status='1'")or die(mysqli_error($conn));
  
  $sql1 = "INSERT INTO share_transactions (user_id,shares,amount,maturity,intreast,gross_amount,status,maturity_date) VALUES ('$user_id','$shares','$amount','$maturity_time','$intreast','$gross_amount','1','$maturity_date')";
            if (mysqli_query($conn, $sql1)) {
                   echo '
                     <script type = "text/javascript">
                    window.location = "../dashboard.php";
                </script>';
                mysqli_query($conn,"INSERT INTO transaction_logs (user_id,transaction_id,details) VALUES ('$user_id','1','amount:$amount,maturity:$maturity_time,')")or die(mysqli_error($conn));

              }
}else{
      echo '<script type = "text/javascript">
                     alert("you have exceeded the maximum bidable of 7000..try again")
                    window.location = "../buy_shares.php";
                </script>';
    
}

}
}
}


if (isset($_POST['share_confirm'])) { 
$shares_id=$_POST['shares_id'];
$buyer_id=$_POST['buyer_id'];
$account_bal=$_POST['account_bal'];
$expected_bal=$_POST['expected_bal'];
$user_id=$_POST['user_id'];

$sql="UPDATE share_transactions SET status='3' WHERE id='$shares_id' and status='2'";
 if (mysqli_query($conn, $sql)) {
     mysqli_query($conn,"UPDATE login_user SET account_bal='$account_bal',expected_bal='$expected_bal',is_queud='$shares_id' WHERE user_id='$buyer_id'")or die(mysqli_error($conn));
     
       mysqli_query($conn,"INSERT INTO transaction_logs (user_id,transaction_id,details) VALUES ('$user_id','3','confirmed')")or die(mysqli_error($conn));
 echo '
                     <script type = "text/javascript">
                    window.location = "../admin_shares.php";
                </script>';
 }
}

if (isset($_POST['share_confirm_sub12'])) { 
$shares_id=$_POST['shares_id'];
$buyer_id=$_POST['buyer_id'];
$account_bal=$_POST['account_bal'];
$expected_bal=$_POST['expected_bal'];
$user_id=$_POST['user_id'];

$sql="UPDATE share_transactions SET status='1',is_subsequent='1' WHERE id='$shares_id'";
 if (mysqli_query($conn, $sql)) {
     mysqli_query($conn,"UPDATE login_user SET account_bal='$account_bal',expected_bal='$expected_bal',is_queud='$shares_id' WHERE user_id='$buyer_id'")or die(mysqli_error($conn));
     
       mysqli_query($conn,"INSERT INTO transaction_logs (user_id,transaction_id,details) VALUES ('$user_id','3','confirmed subsequent')")or die(mysqli_error($conn));
 echo '
     <script type = "text/javascript">
window.location = "../admin_shares.php";
</script>';
 }
}
if (isset($_POST['share_confirm_sub'])) { 
$shares_id=$_POST['shares_id'];
$buyer_id=$_POST['buyer_id'];
$account_bal=$_POST['account_bal'];
$expected_bal=$_POST['expected_bal'];
$user_id=$_POST['user_id'];

$sql="UPDATE share_transactions SET status='1',buyer_id='NULL',is_subsequent='0' WHERE id='$shares_id' and status='2'";
 if (mysqli_query($conn, $sql)) {
     mysqli_query($conn,"UPDATE login_user SET account_bal='$account_bal',expected_bal='$expected_bal',is_queud='$shares_id' WHERE user_id='$buyer_id'")or die(mysqli_error($conn));
     
       mysqli_query($conn,"INSERT INTO transaction_logs (user_id,transaction_id,details) VALUES ('$user_id','3','confirmed')")or die(mysqli_error($conn));
 echo '
     <script type = "text/javascript">
window.location = "../admin_shares.php";
</script>';
 }
}

if (isset($_POST['share_confirm1'])) { 
$shares_id=$_POST['shares_id'];
$user_id=$_POST['user_id'];
$buyer_id=$_POST['buyer_id'];
$expected_bal=$_POST['expected_bal'];
$amount=$_POST['amount'];

$sql="UPDATE share_transactions SET status='3' WHERE id='$shares_id'";
 if (mysqli_query($conn, $sql)) {
     mysqli_query($conn,"UPDATE login_user SET expected_bal='$expected_bal',is_queud='$shares_id' WHERE user_id='$user_id'")or die(mysqli_error($conn));
 echo '
                     <script type = "text/javascript">
                    window.location = "../shares.php";
                </script>';
                 mysqli_query($conn,"INSERT INTO transaction_logs (user_id,transaction_id,details) VALUES ('$user_id','3','confirmation')")or die(mysqli_error($conn));
                  mysqli_query($conn,"INSERT INTO payment_table (user_id,buyer_id,amount) VALUES ('$user_id','$buyer_id','$amount')")or die(mysqli_error($conn));
                 
                 
 }
}
if(isset($_POST['share_confirm2'])) { 
$shares_id=$_POST['shares_id'];
$user_id=$_POST['user_id'];
$buyer_id=$_POST['buyer_id'];
$expected_bal=$_POST['expected_bal'];
$amount=$_POST['amount'];
$sub_bal=$_POST['sub_bal'];

$sql="UPDATE share_transactions SET status='1' WHERE id='$shares_id'";
 if (mysqli_query($conn, $sql)) {
     mysqli_query($conn,"UPDATE login_user SET expected_bal='$expected_bal' WHERE user_id='$user_id'")or die(mysqli_error($conn));
 echo '
                     <script type = "text/javascript">
                    window.location = "../shares.php";
                </script>';
                 mysqli_query($conn,"INSERT INTO transaction_logs (user_id,transaction_id,details) VALUES ('$user_id','3','confirmation subsequent')")or die(mysqli_error($conn));
                  mysqli_query($conn,"INSERT INTO payment_table (user_id,buyer_id,amount) VALUES ('$user_id','$buyer_id','$amount')")or die(mysqli_error($conn));
                 
                 
 }
}
if (isset($_POST['paying'])) { 
$pay_id=$_POST['pay_id'];
$buyer_id=$_POST['buyer_id'];
$account_bal=$_POST['account_bal'];
mysqli_query($conn,"UPDATE share_transactions SET buyer_id='$buyer_id',is_subsequent='0', status='2' WHERE id='$pay_id' and status='1'")or die(mysqli_error($conn));
mysqli_query($conn,"UPDATE login_user SET account_bal='$account_bal',is_queud='0' Where user_id='$buyer_id' ")or die(mysqli_error($conn));
 echo '
          <script type = "text/javascript">
                    alert("Your payment will be confirmed by the shareholder shortly");
                    window.location = "../dashboard.php";
                </script>';
                 mysqli_query($conn,"INSERT INTO transaction_logs (user_id,transaction_id,details) VALUES ('$user_id','2','waiting for confirmation')")or die(mysqli_error($conn));
}
if (isset($_POST['paying_subsequent'])) { 
$pay_id=$_POST['pay_id'];
$amount=$_POST['amount'];
$buyer_id=$_POST['buyer_id'];
$account_bal=$_POST['account_bal'];
mysqli_query($conn,"UPDATE share_transactions SET buyer_id='$buyer_id',amount='$amount',status='2',is_subsequent='1' WHERE id='$pay_id' and status='1'")or die(mysqli_error($conn));
mysqli_query($conn,"UPDATE login_user SET account_bal='$account_bal',is_queud='0' Where user_id='$buyer_id' ")or die(mysqli_error($conn));
 echo '
          <script type = "text/javascript">
                    alert("You may have been paired to more than one seller...please be patient throughout the process...");
                    window.location = "../dashboard.php";
                </script>';
                 mysqli_query($conn,"INSERT INTO transaction_logs (user_id,transaction_id,details) VALUES ('$user_id','2','waiting for confirmation')")or die(mysqli_error($conn));
}

if (isset($_POST['paying_subsequent_repair'])) { 
$pay_id=$_POST['pay_id'];
$buyer_id=$_POST['buyer_id'];
$user_id=$_POST['user_id'];
mysqli_query($conn,"UPDATE login_user SET is_queud='0' Where user_id='$buyer_id' ")or die(mysqli_error($conn));
 echo '
          <script type = "text/javascript">
                    alert("You will be paired to another seller");
                    window.location = "../dashboard.php";
                </script>';
                 mysqli_query($conn,"INSERT INTO transaction_logs (user_id,transaction_id,details) VALUES ('$user_id','2','removed from queue')")or die(mysqli_error($conn));
}


if (isset($_POST['reselling'])) { 
$pay_id=$_POST['pay_id'];
$user_id=$_POST['user_id'];
$expected_bal=$_POST['expected_bal'];
date_default_timezone_set("Africa/Nairobi");
$date = date("Y-M-d h:i A",strtotime("+0 HOURS"));
mysqli_query($conn,"delete from share_transactions  WHERE id='$pay_id' and status='3'")or die(mysqli_error($conn));
mysqli_query($conn,"UPDATE login_user SET expected_bal='$expected_bal',is_queud='1',share_update='$date' Where user_id='$user_id'")or die(mysqli_error($conn));
 echo '
          <script type = "text/javascript">
                    alert("Your are now a shareholder.You will be paired with a buyer shortly!!");
                    window.location = "../dashboard.php";
                </script>';
                 mysqli_query($conn,"INSERT INTO transaction_logs (user_id,transaction_id,details) VALUES ('$user_id','4','$expected_bal')")or die(mysqli_error($conn));
}

if (isset($_POST['block_user'])) { 
$user_id=$_POST['user_id'];
mysqli_query($conn,"UPDATE login_user SET active_status='0' WHERE user_id='$user_id'")or die(mysqli_error($conn));

 echo '
          <script type = "text/javascript">
                    window.location = "../manage_users.php";
                </script>';
}
if (isset($_POST['unblock_user'])) { 
$user_id=$_POST['user_id'];
mysqli_query($conn,"UPDATE login_user SET active_status='1' WHERE user_id='$user_id'")or die(mysqli_error($conn));

 echo '
          <script type = "text/javascript">
                    window.location = "../manage_users.php";
                </script>';
}
if (isset($_POST['make_admin'])) { 
$user_id=$_POST['user_id'];
mysqli_query($conn,"UPDATE login_user SET user_status='1' WHERE user_id='$user_id'")or die(mysqli_error($conn));

 echo '
          <script type = "text/javascript">
                    window.location = "../manage_users.php";
                </script>';
}
if (isset($_POST['remove_admin'])) { 
$user_id=$_POST['user_id'];
mysqli_query($conn,"UPDATE login_user SET user_status='0' WHERE user_id='$user_id'")or die(mysqli_error($conn));

 echo '
          <script type = "text/javascript">
                    window.location = "../manage_users.php";
                </script>';
}

if (isset($_POST['delete_user'])) {
$user_id=$_POST['user_id'];
 mysqli_query($conn,"delete from `login_user` where `user_id`='$user_id'")or die(mysqli_error($conn));
                   echo  "<meta http-equiv=\"refresh\"content=\"0;URL=../manage_users.php\">";
            
            
          }
          
if (isset($_POST['edit_shares'])) { 
$user_id=$_POST['user_id'];
$share=$_POST['share'];
$bal=$_POST['bal'];
mysqli_query($conn,"UPDATE login_user SET expected_bal='$share',account_bal='$bal' WHERE user_id='$user_id'")or die(mysqli_error($conn));

 echo '
          <script type = "text/javascript">
                    window.location = "../shareholders.php";
                </script>';
}
if (isset($_POST['pay_shares'])) { 
$user_id=$_POST['user_id'];
$share_status=$_POST['share_status'];

mysqli_query($conn,"UPDATE login_user SET share_status='$share_status' WHERE user_id='$user_id'")or die(mysqli_error($conn));

 echo '
          <script type = "text/javascript">
                    window.location = "../share_pay.php";
                </script>';
}
?>