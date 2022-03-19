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
                  Activity Log Table
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
                  <th>Email</th>
                  <th>Device Name</th>
                  <th>Login</th>
                  <th>Logout</th>
                  
              </tr>
              </thead>
              <tbody>
             
              <?php
              //require_once 'includes/connection.php';
               $query="SELECT * FROM history_log  order by login_time desc";
$result_set=mysqli_query($conn,$query);
            while($row=mysqli_fetch_object($result_set)){
            echo "<tr class='gradeX'>
                  <td>$row->email_address</td>
                  <td>$row->host</td>
                  <td>$row->login_time</td>
                  <td>$row->logout_time</td>    
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