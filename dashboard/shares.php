<?php
require_once("includes/connection.php");

session_start();
if(!isset($_SESSION["email_address"])){
    header("location:/index.php");

} else{
    $admin = $_SESSION['email_address'];
}
?>
<?php include 'header.php' ;?>
   <section id="main-content">
          <section class="wrapper site-min-height">
<script src="js/js-jquery.min.js"></script>
<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
  <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Share Bidded Table
                          </header>
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                            <th><i class="fa fa-bullhorn"></i>Bidder Details</th>
                                  <th><i class=" fa fa-edit"></i> Status</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                                   <?php 
                                     
$sqi="select * from login_user where user_id='$user_id'";
                  $record=mysqli_query($conn,$sqi);
                  while ($row=mysqli_fetch_array($record,MYSQLI_BOTH))
                  {
                    $pat=$row["phone"];
                    $pat1=$row["user_id"];
                     $pat2=$row["name"];
                      $pat3=$row["account_bal"];
                       $pat4=$row["expected_bal"];
                  }?>
                                 <?php
        
        $sqi="select * from transaction_queue where status='1' order by id desc limit 1";
        $record=mysqli_query($conn,$sqi);
        while ($row=mysqli_fetch_array($record,MYSQLI_BOTH))
        {
          $qat1=$row["id"];
         // $qat1=$row["user_id"];
           $qat=($qat1+1);
            
        }
$query="SELECT * FROM share_transactions left join login_user on login_user.user_id=share_transactions.user_id Where buyer_id='$user_id' order by id desc";
$result_set=mysqli_query($conn,$query);
            while($row=mysqli_fetch_object($result_set)){
             if($row->status=='1'){
                 if($row->is_subsequent=='1'){
               echo " <tr>
                                 <td>$row->name</br>$row->phone</br>$row->amount</td>
                                    <td><span class='label label-warning label-mini'>paid</span></td>
                                  <td>
                                  <span class='label label-warning label-mini'>confirmed subsequent</span>
                                  </td>
                              </tr>
                              <tr>";
             }else{
                 
                 
                  echo " <tr>
                                 <td>$row->name</br>$row->phone</br>$row->amount</td>
                                    <td><span class='label label-warning label-mini'>Unpaid</span></td>
                                  <td>
                                  <span class='label label-warning label-mini'>not confirmed</span>
                                  </td>
                              </tr>
                              <tr>";
                 
             }
                 
             }
              if($row->status=='2'){
                  $bal=$pat4-$row->amount;
                  $ac_bal=$row->account_bal+$row->amount;
                  if($row->is_subsequent=='0'){
                              echo " <tr>  
                              <td>$row->name </br>$row->phone</br>$row->amount</td>
                                    <td><span class='label label-info label-mini'>Inprogress</span></td>
                                  <td>
                                  <form action='Controller/PaymentController.php' method='post'>
                                  <input type='hidden' name='shares_id' value='$row->id' />
                                  <input type='hidden' name='user_id' value='$user_id' />
                                  <input type='hidden' name='buyer_id' value='$row->user_id' />
                                  <input type='hidden' name='amount' value='$row->amount' />
                                   <input type='hidden' name='account_bal' value='$ac_bal' />
                                   <input type='hidden' name='expected_bal' value='$bal' />
                                   <input type='text' name='is_queue' value='$qat' />
                                  <button class='label label-primary' name='share_confirm1'>Click Confirm</button>
                                </form>
                                  </td>
                              </tr>
                              <tr>";
                                }
                            else{
                 
                                  echo"<tr>
                                   <td>$row->name </br>$row->phone</br>$row->amount</td>
                                    <td><span class='label label-info label-mini'>Inprogress</span></td>
                                  <td>
                                  <form action='Controller/basicController.php' method='post'>
                                  <input type='hidden' name='shares_id' value='$row->id' />
                                  <input type='hidden' name='user_id' value='$user_id' />
                                  <input type='hidden' name='buyer_id' value='$row->user_id' />
                                  <input type='hidden' name='amount' value='$row->amount' />
                                   <input type='hidden' name='account_bal' value='$ac_bal' />
                                   <input type='hidden' name='expected_bal' value='$bal' />
                                   <input type='hidden' name='sub_bal' value='$bal' />
                                   <input type='text' name='is_queue' value='$qat' />
                                     <button class='label label-primary' name='share_confirm2'>Click Confirm 1</button>
                                </form>
                                  </td>
                              </tr>
                              <tr>";
             }}
            if($row->status=='3'){
               echo " <tr>
                                   <td>$row->name </br>$row->phone</br>$row->amount</td>
                                    <td><span class='label label-success label-mini'>Paid</span></td>
                                  <td>
                                  </td>
                              </tr>
                              <tr>";
             }}?>
                              </tbody>
                          </table>
                      </section> 
                  </div>
              </div>
                </section>
      </section>
              <?php include 'footer.php' ;?>