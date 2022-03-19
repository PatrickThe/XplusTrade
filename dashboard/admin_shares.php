<?php
require_once("includes/connection.php");

session_start();
if(!isset($_SESSION["email_address"])){
    header("location:../index.php");

} else{
    $admin = $_SESSION['email_address'];
}
?>
         <?php require_once 'header.php';?>
           <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                <div class="col-sm-12">
              <section class="panel">
              <header class="panel-heading">
                  Admin Share Confirmation Table
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
              </header>
              <div class="panel-body">
              <div class="adv-table">
              <table  class="display table table-bordered table-striped" id="dynamic-table">
              <thead>
              <tr>
                  <th>Seller Details</th>
                  <th>Amount</th>
                  <th>Status</th>
                  <th>ACTION</th>
                  
              </tr>
              </thead>
              <tbody>
             
              <?php
        

$query="SELECT * FROM share_transactions left join login_user on login_user.user_id=share_transactions.buyer_id Where status='2' order by id desc";
$result_set=mysqli_query($conn,$query);
            while($row=mysqli_fetch_object($result_set)){
             

             if($row->status=='1'){
               echo " <tr class='gradeX'>
                                 <td>Name:$row->name</br>
                                 Phone:$row->phone</br>Invoice No:$row->id</td>
                                  <td>$row->amount</td>
                                  <td>
                                  <span class='label label-warning label-mini'>not confirmed</span>
                                  </td>
                                  <td><span class='label label-warning label-mini'>Unpaid</span></td>
                              </tr>";
             }
              if($row->status=='2'){
                   $bal=$row->expected_bal-$row->amount;
                   $tota_bal=$row->amount+$row->account_bal;
                   if($row->is_subsequent=='1'){
                                echo " <tr class='gradeX'>
                                  <td>Name:$row->name</br>
                                 Phone:$row->phone</br>Invoice No:$row->id</td>
                                  <td>$row->subsequent_amount</td>
                                    <td><span class='label label-info label-mini'>Inprogress</span></td>
                                  <td>
                                  <form action='Controller/basicController.php' method='post'>
                                  <input type='hidden' name='shares_id' value='$row->id' />
                                   <input type='hidden' name='buyer_id' value='$row->buyer_id' />
                                   <input type='hidden' name='account_bal' value='$tota_bal' />
                                   <input type='hidden' name='user_id' value='$user_id' />
                                   <input type='hidden' name='expected_bal' value='$bal' />
                                    <input type='hidden' name='amount' value='$row->amount' />
                                      <button class='btn btn-success btn-xs' name='share_confirm_sub12'>Continue Confirm</button>
                                </form>
                                  </td>
                              </tr>";
                   }if($row->is_subsequent=='0'){
                       
                                echo " <tr class='gradeX'>
                                  <td>Name:$row->name</br>
                                 Phone:$row->phone</br>Invoice No:$row->id</td>
                                  <td>$row->amount</td>
                                    <td><span class='label label-info label-mini'>Inprogress</span></td>
                                  <td>
                                  <form action='Controller/basicController.php' method='post'>
                                  <input type='hidden' name='shares_id' value='$row->id' />
                                   <input type='hidden' name='buyer_id' value='$row->buyer_id' />
                                   <input type='hidden' name='account_bal' value='$tota_bal' />
                                   <input type='hidden' name='user_id' value='$user_id' />
                                   <input type='hidden' name='expected_bal' value='$bal' />
                                      <button class='btn btn-success btn-xs' name='share_confirm1'>Click Confirm</button>
                                </form>
                                  </td>
                              </tr>";
                       }
             }
            if($row->status=='3'){
                               echo " <tr class='gradeX'>
                                   <td>Name:$row->name</br>
                                 Phone:$row->phone</br>Invoice No:$row->id</td>
                                  <td>$row->amount</td>
                                    <td><span class='label label-success label-mini'>Paid</span></td>
                                  <td>
                                  </td>
                              </tr>";
             }
                            
                            }
                              ?>
              </tfoot>
              </table>
              </div>
              </div>
              </section>
              </div>
              </div>
              
              <!-- page end-->
          </section>
      </section>
      <?php include 'footer.php' ;?>