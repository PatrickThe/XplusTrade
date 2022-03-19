<?php
require_once("../includes/connection.php");
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
    $subsequent_amount =$_POST['subsequent_amount'];
    $account_bal=$_POST['account_bal'];
    mysqli_query($conn,"UPDATE share_transactions SET buyer_id='$buyer_id',subsequent_amount='$subsequent_amount',amount='$amount',status='2',is_subsequent='1' WHERE id='$pay_id' and status='1'")or die(mysqli_error($conn));
    mysqli_query($conn,"UPDATE login_user SET account_bal='$account_bal',is_queud='0' Where user_id='$buyer_id' ")or die(mysqli_error($conn));
     echo '
              <script type = "text/javascript">
                        alert("You may have been paired to more than one seller...please be patient throughout the process...");
                        window.location = "../dashboard.php";
                    </script>';
                     mysqli_query($conn,"INSERT INTO transaction_logs (user_id,transaction_id,details) VALUES ('$user_id','2','waiting for confirmation')")or die(mysqli_error($conn));
    }


    
if (isset($_POST['reselling'])) { 
    $pay_id=$_POST['pay_id'];
    $user_id=$_POST['user_id'];
    $expected_bal=$_POST['expected_bal'];
    $invoice_no = $_POST['invoice_no'];
    date_default_timezone_set("Africa/Nairobi");
    $date = date("Y-M-d h:i A",strtotime("+0 HOURS"));
    mysqli_query($conn,"delete from share_transactions  WHERE id='$pay_id' and status='3'")or die(mysqli_error($conn));
    mysqli_query($conn,"UPDATE login_user SET expected_bal='$expected_bal',is_queud='$invoice_no',share_update='$date' Where user_id='$user_id'")or die(mysqli_error($conn));
     echo '
              <script type = "text/javascript">
                        alert("Your are now a shareholder.You will be paired with a buyer shortly!!");
                        window.location = "../dashboard.php";
                    </script>';
                     mysqli_query($conn,"INSERT INTO transaction_logs (user_id,transaction_id,details) VALUES ('$user_id','4','$expected_bal')")or die(mysqli_error($conn));
                     mysqli_query($conn,"INSERT INTO transaction_queue (user_id) VALUES ('$user_id')")or die(mysqli_error($conn));
    }



    if (isset($_POST['share_confirm1'])) { 
        $shares_id=$_POST['shares_id'];
        $is_queue = $_POST['is_queue'];
        $user_id=$_POST['user_id'];
        $buyer_id=$_POST['buyer_id'];
        $expected_bal=$_POST['expected_bal'];
        $amount=$_POST['amount'];
        
        $sql="UPDATE share_transactions SET status='3' WHERE id='$shares_id'";
         if (mysqli_query($conn, $sql)) {
             mysqli_query($conn,"UPDATE login_user SET expected_bal='$expected_bal',is_queud='$is_queue' WHERE user_id='$user_id'")or die(mysqli_error($conn));
         echo '
                             <script type = "text/javascript">
                            window.location = "../shares.php";
                        </script>';
                         mysqli_query($conn,"INSERT INTO transaction_logs (user_id,transaction_id,details) VALUES ('$user_id','3','confirmation')")or die(mysqli_error($conn));
                          mysqli_query($conn,"INSERT INTO payment_table (user_id,buyer_id,amount) VALUES ('$user_id','$buyer_id','$amount')")or die(mysqli_error($conn));
                          mysqli_query($conn,"INSERT INTO transaction_queue (user_id) VALUES ('$user_id')")or die(mysqli_error($conn));

                         
         }
        }


        if(isset($_POST['share_confirm2'])) { 
            $shares_id=$_POST['shares_id'];
            $is_queue = $_POST['is_queue'];
            $user_id=$_POST['user_id'];
            $buyer_id=$_POST['buyer_id'];
            $expected_bal=$_POST['expected_bal'];
            $amount=$_POST['amount'];
            $sub_bal=$_POST['sub_bal'];
            
            $sql="UPDATE share_transactions SET status='1' WHERE id='$shares_id'";
             if (mysqli_query($conn, $sql)) {
                 mysqli_query($conn,"UPDATE login_user SET expected_bal='$expected_bal',is_queud='$is_queue' WHERE user_id='$user_id'")or die(mysqli_error($conn));
             echo '
                                 <script type = "text/javascript">
                                window.location = "../shares.php";
                            </script>';
                             mysqli_query($conn,"INSERT INTO transaction_logs (user_id,transaction_id,details) VALUES ('$user_id','3','confirmation subsequent')")or die(mysqli_error($conn));
                              mysqli_query($conn,"INSERT INTO payment_table (user_id,buyer_id,amount) VALUES ('$user_id','$buyer_id','$amount')")or die(mysqli_error($conn));
                              mysqli_query($conn,"INSERT INTO transaction_queue (user_id) VALUES ('$user_id')")or die(mysqli_error($conn));
                             
             }
            }
?>