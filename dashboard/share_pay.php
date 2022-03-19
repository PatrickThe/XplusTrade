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
                   
              <div class="adv-table">
              <table  class="display table table-bordered table-striped" id="dynamic-table">
              <thead>
              <tr>
                  <th>NAMES/Email</th>
                  <th>Queueu Date</th>
                  <th>Account Balance</th>
                  <th>ACTION</th>
                  
              </tr>
              </thead>
              <tbody>
             
              <?php
               $query="SELECT * FROM login_user WHERE expected_bal>'1' ORDER BY share_update ASC";
$result_set=mysqli_query($conn,$query);
            while($row=mysqli_fetch_object($result_set)){
            echo "<tr class='gradeX'>
                  <form action='Controller/basicController.php' method='POST'>
                  <td>$row->name</br>$row->email_address</br><input type='text' value='$row->is_queud' /></td>
                  <td><input type='text' name='share_status' value='$row->share_update'></td></td> 
                  <td><input type='text' name='share' value='$row->expected_bal'?></td>  
                  <td>
                  <input type='hidden' name='user_id' value='$row->user_id'>
                  <button class='btn btn-warning btn-xs' name='pay_shares'>Edit User</button>

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