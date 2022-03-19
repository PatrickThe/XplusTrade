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
                   <div class="btn-group">
                                  <button id="editable-sample_new" class="btn green" data-toggle="modal" href="#myModal">
                                      Manage bidding <i class="fa fa-plus"></i>
                                  </button>
                                    
                              </div>
              <div class="panel-body">
              <div class="adv-table">
              <table  class="display table table-bordered table-striped" id="dynamic-table">
              <thead>
              <tr>
                  <th>Bidder Details</th>
                  <th>Maturity</th>
                  <th>Status</th>
                  <th>ACTION</th>
                  
              </tr>
              </thead>
              <tbody>
             
              <?php
        

$query="SELECT * FROM share_transactions left join login_user on login_user.user_id=share_transactions.user_id where is_active='1' order by id desc";
$result_set=mysqli_query($conn,$query);
            while($row=mysqli_fetch_object($result_set)){
             
         $start=$row->date;
         $today = date("Y-m-d H:i:s");
         //$datecomp=date('Y-m-d H:i',strtotime('+2 hour +00 minutes',$start));
          $datecomp=date('Y-m-d H:i',strtotime('+2 hour +00 minutes',strtotime($start)));
         if($row->status=='1'){
             $total_shares=$dat+$row->shares;
               echo " <tr class='gradeX'>
                                 <td>Invoice No:$row->id</br>$row->name</br>
                                 $row->phone</br>$row->amount</td>
                                  <td>$row->maturity_date</td>
                                   <td>
                                  <span class='label label-warning label-mini'>Unpaid Shares</span>
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
                            if($row->status=='2'){
                               echo" <tr class='gradeX'>
                                 <td>Invoice No:$row->id</br>$row->name</br>
                                 $row->phone</br>Amount:$row->amount</td>
                                  <td>$row->maturity_date</td>
                                  <td>
                                  <span class='label label-success label-mini'>in progress</span>
                                  </td>
                                  <td><form action='Controller/shareController.php' method='POST'>
                                  <input type='hidden' name='shares_id' value='$row->id' />
                                    <input type='hidden' name='available_shares' value='$total_shares' />
                                  <button name='deactive_shares' ><span class='label label-info label-mini'>Deactivate</span></button>
                                  </form></td>
                              </tr>";
                                
                            }
                           if($row->status=='3'){
                               
                               echo" <tr class='gradeX'>
                                 <td>Invoice No:$row->id</br>$row->name</br>
                                 $row->phone</br>Amount:$row->amount</td>
                                  <td>$row->maturity_date</td>
                                  <td>
                                  <span class='label label-success label-mini'>Paid</span>
                                  </td>
                                  <td><form action='Controller/shareController.php' method='POST'>
                                  <input type='hidden' name='shares_id' value='$row->id' />
                                    <input type='hidden' name='available_shares' value='$total_shares' />
                                  <button name='deactive_shares' ><span class='label label-info label-mini'>Deactivate</span></button>
                                  </form></td>
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
                <?php 
require_once("includes/connection.php");
$sqi="select * from shares where status='1' order by date_created desc";
                  $record=mysqli_query($conn,$sqi);
                  while ($row=mysqli_fetch_array($record,MYSQLI_BOTH))
                  {
                    $cat=$row["daily_target"];
                    $cat1=$row["upper_limit"];
                    $cat2=$row["lower_limit"];
                    $cat3=$row["id"];
                  }

?>           
              
              
              
              
              
              
              
              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                              <h4 class="modal-title">Bidding Details Form</h4>
                                          </div>
                                          <div class="modal-body">

                                              <form class="form-horizontal" role="form" action="Controller/shareController.php" method="POST">
                                                   <div class="form-group">
                                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Lower-Limit Shares</label>
                                                      <div class="col-lg-10">
                                                          <input type="text" class="form-control" id="" value="<?php echo $cat2;?>" name="lower_limit">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Upper-Limit Shares</label>
                                                      <div class="col-lg-10">
                                                          <input type="text" class="form-control" id="" value="<?php echo $cat1;?>" name="upper_limit">
                                                      </div>
                                                  </div>
                                                 
                                                  <div class="form-group">
                                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Daily Limit</label>
                                                      <div class="col-lg-10">
                                                          <input type="text" class="form-control" id="" value="<?php echo $cat;?>" name="daily_limit">
                                                           <input type="hidden"  name="id" value="<?php echo $cat3;?>">
                                                      </div>
                                                  </div>
                                                 
                                                  <div class="form-group">
                                                      <div class="col-lg-offset-2 col-lg-10">
                                                          <button type="submit" class="btn btn-default" name="manage_bidding">Update Bidding</button><button aria-hidden="true" data-dismiss="modal" class="btn btn-close" type="submit">Cancel</button>
                                                      </div>
                                                      
                                                  </div>
                                              </form>

                                          </div>

                                      </div>
                                  </div>
                              </div>
              
              
              
              <!-- page end-->
          </section>
      </section>
      <?php include 'footer.php' ;?>