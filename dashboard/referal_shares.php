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
                            <th>Bidder Details</th>
                                  <th> Status</th>
                                  <th>details</th>
                                  <th>excecute</th>
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
        

$query="SELECT * FROM share_transactions left join login_user on login_user.user_id=share_transactions.user_id Where status='3' and is_harv='0' order by id desc";
$result_set=mysqli_query($conn,$query);
            while($row=mysqli_fetch_object($result_set)){
            if($row->date<'2020-12-29 19:01:42'){
           $points=$row->amount*0.1;
           $shares=$row->expected_bal+$points;
               echo " <tr class='gradeX'>
                                   <td>$row->name </br>$row->phone</br>$row->amount</td>
                                    <td><span class='label label-success label-mini'>Paid</span></td>
                                  <td>
                                  <form action='Controller/referalController.php' method='POST'>
                                   <input type='text' name='share_id' value='$row->id'>
                                   <input type='hidden' name='email' value='$row->email_address'>
                                  <input type='hidden' name='user_id' value='$row->user_id'>
                                  <input type='text' name='points' value='$points'>
                                  </td>
                                  <td>
                                  <input type='submit' name='harvest_referal' value='Harvest' />
                                  </form>
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