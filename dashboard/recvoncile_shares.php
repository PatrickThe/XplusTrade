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
                  <th>Shareholder</th>
                  <th>Maturity</th>
                  <th>ACTION</th>
                  
              </tr>
              </thead>
              <tbody>
             
              <?php
              //require_once 'includes/connection.php';
              date_default_timezone_set("Africa/Nairobi");
              $today = date("Y-m-d H:i:s",strtotime("+0 HOURS"));

$query="SELECT * FROM login_user WHERE share_update>'1' order by share_update desc";
$result_set=mysqli_query($conn,$query);
            while($row=mysqli_fetch_object($result_set)){
          $profit=$row->expected_bal+$row->expected_bal1;
            echo "<tr class='gradeX'>
                  <td></br>$row->name</br>
                $row->phone</td>
                  <td>$row->share_update</td>
                  <td>
                  <form action='Controller/shareController.php' method='POST'>
                  <input type='hidden' name='user_id' value='$row->user_id'>
                   <input type='hidden' name='user' value='$user_id'>
                   <input type='hidden' name='pay_id' value=''>
                   <input type='hidden' name='maturity' value=''>
                  <button class='btn btn-warning btn-xs' name='reconcile_account'>Reconcile</button>

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
              
              <!-- page end-->
          </section>
      </section>
      <?php include 'footer.php' ;?>