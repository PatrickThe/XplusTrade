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
                                      Add Shares <i class="fa fa-plus"></i>
                                  </button>
                                    
                              </div>
              <div class="adv-table">
              <table  class="display table table-bordered table-striped" id="dynamic-table">
              <thead>
              <tr>
                  <th>NAMES</th>
                  <th>Email</th>
                  <th>Account Balance</th>
                  <th>Shares</th>
                  <th>ACTION</th>
                  
              </tr>
              </thead>
              <tbody>
             
              <?php
               $query="SELECT * FROM login_user  order by expected_bal desc ";
$result_set=mysqli_query($conn,$query);
            while($row=mysqli_fetch_object($result_set)){
            echo "<tr class='gradeX'>
                  <form action='Controller/basicController.php' method='POST'>
                  <td>ID:$row->user_id</br>$row->name</td>
                  <td>$row->email_address</td>
                  <td><input type='text' name='bal' value='$row->account_bal'?></td></td> 
                  <td><input type='text' name='share' value='$row->expected_bal'?></td>  
                  <td>
                  <input type='hidden' name='user_id' value='$row->user_id'>
                  <button class='btn btn-warning btn-xs' name='edit_shares'>Edit User</button>

                  </form>
                  </td>  
              </tr>";
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
$sqi="select * from shares order by date_created desc";
                  $record=mysqli_query($conn,$sqi);
                  while ($row=mysqli_fetch_array($record,MYSQLI_BOTH))
                  {
                    $cat=$row["share_price"];
                    $cat1=$row["available_shares"];
                    $cat3=$row["id"];
                  }

?>           
              
              
              
              
              
              
              
              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                              <h4 class="modal-title">Share Details Form</h4>
                                          </div>
                                          <div class="modal-body">

                                              <form class="form-horizontal" role="form" action="Controller/shareController.php" method="POST">
                                                   <div class="form-group">
                                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Price per Share</label>
                                                      <div class="col-lg-10">
                                                          <input type="text" class="form-control" id="" value="<?php echo $cat;?>" name="share_price">
                                                           <input type="hidden"  name="id" value="<?php echo $cat3;?>">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Available Shares</label>
                                                      <div class="col-lg-10">
                                                          <input type="text" class="form-control" id="" value="<?php echo $cat1;?>" name="available_shares">
                                                      </div>
                                                  </div>
                                                 
                                                 
                                                 
                                                  <div class="form-group">
                                                      <div class="col-lg-offset-2 col-lg-10">
                                                          <button type="submit" class="btn btn-default" name="manage_share">Update Shares</button><button aria-hidden="true" data-dismiss="modal" class="btn btn-close" type="submit">Cancel</button>
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