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
         <?php 
require_once("includes/connection.php");
$sqi="select *from shares where status='1'";
                  $record=mysqli_query($conn,$sqi);
                  while ($row=mysqli_fetch_array($record,MYSQLI_BOTH))
                  {
                    $dat=$row["available_shares"];
                    //$dat1=$row["expected_bal"];
                    
                  }
echo "Ksh:",$dat1;
?>           
         
           <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                <div class="col-sm-12">
              <section class="panel">
              <header class="panel-heading">
                  Users Table
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
                  <th>Bidder Details</th>
                  <th>Amount</th>
                  <th>Status</th>
                  <th>ACTION</th>
                  
              </tr>
              </thead>
              <tbody>
             
              <?php
        

$query="SELECT * FROM share_transactions left join login_user on login_user.user_id=share_transactions.user_id where status!='3' and is_active='1'";
$result_set=mysqli_query($conn,$query);
            while($row=mysqli_fetch_object($result_set)){
             
         $start=$row->date;
         $today = date("Y-m-d H:i:s");
         //$datecomp=date('Y-m-d H:i',strtotime('+2 hour +00 minutes',$start));
          $datecomp=date('Y-m-d H:i',strtotime('+2 hour +00 minutes',strtotime($start)));
         if($today>=$datecomp){
             $total_shares=$dat+$row->shares;
               echo " <tr class='gradeX'>
                                 <td>$row->name</br>
                                 $row->phone</td>
                                  <td>$row->amount</td>
                                  <td>
                                  <span class='label label-warning label-mini'>Overstayed Shares</span>
                                  </td>
                                  <td>
                                  <form action='Controller/shareController.php' method='POST'>
                                  <input type='hidden' name='shares_id' value='$row->id' />
                                    <input type='hidden' name='available_shares' value='$total_shares' />
                                  <button name='deactive_shares' ><span class='label label-info label-mini'>Deactivate</span></button>
                                  </form>
                                  </td>
                              </tr>";
                            }
                            else{
                               echo" <tr class='gradeX'>
                                 <td>$row->name</br>
                                 $row->phone</td>
                                  <td>$row->amount</td>
                                  <td>
                                  <span class='label label-success label-mini'>Still on time</span>
                                  </td>
                                  <td><form action='Controller/shareController.php' method='POST'>
                                  <input type='hidden' name='shares_id' value='$row->id' />
                                    <input type='hidden' name='available_shares' value='$total_shares' />
                                  <button name='deactive_shares' ><span class='label label-info label-mini'>Deactivate</span></button>
                                  </form></td>
                              </tr>";
                                
                            }}
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