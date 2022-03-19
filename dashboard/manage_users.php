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
                  <th>NAMES</th>
                  <th>Email</th>
                  <th>Date Joined</th>
                  <th>ACTION</th>
                  
              </tr>
              </thead>
              <tbody>
             
              <?php
              //require_once 'includes/connection.php';
               $query="SELECT * FROM login_user order by user_id desc ";
$result_set=mysqli_query($conn,$query);
            while($row=mysqli_fetch_object($result_set)){
            if($row->status=='0'){

            echo "<tr class='gradeX'>
                  <td>$row->name</td>
                  <td>$row->email_address</td>
                  <td>$row->date</td>  
                  <td>
                  <form action='Controller/basicController.php' method='POST'>
                  <input type='hidden' name='user_id' value='$row->user_id'>
                  <button class='btn btn-warning btn-xs' name='unblock_user'>unBlock User</button>

                  </form>
                  </td>  
              </tr>";
            }
            else{
              if($row->user_status=='0'){
           echo "<tr class='gradeX'>
                  <td>$row->name</td>
                  <td>$row->email_address</td>
                  <td>$row->date</td>  
                  <td>
                  <form action='Controller/basicController.php' method='POST'>
                  <input type='hidden' name='user_id' value='$row->user_id'>
                  <button class='btn btn-warning btn-xs' name='block_user'>Block User</button>
                   <button class='btn btn-warning btn-xs' name='delete_user'>Delete</button>
                  </form>
                  </td>  
              </tr>";
            }
            if($row->user_status=='1'){

             echo "<tr class='gradeX'>
                  <td>$row->name</td>
                  <td>$row->email_address</td>
                  <td>$row->date</td>  
                  <td>
                  <form action='Controller/basicController.php' method='POST'>
                  <input type='hidden' name='user_id' value='$row->user_id'>
                  <button class='btn btn-warning btn-xs' name='block_user'>Bloc User</button>
                  <button class='btn btn-warning btn-xs' name='delete_user'>Delete</button>
                  </form>
                  </td>  
              </tr>";
             }
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