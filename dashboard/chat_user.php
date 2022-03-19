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
                  <div class="op-form-group op-row">
      <div class="col-sm-12">
        <label class="text-muted">User</label>
        <select  id="task_id" onchange="task(this);enableButton()" value="" name="username" required   >
           <option > select user</option>
          <?php 
                  $sqi="SELECT * FROM login_user Where active_status='1' order by user_id desc";
                  $record=mysqli_query($conn,$sqi);
                  
                  while ($row=mysqli_fetch_array($record,MYSQLI_BOTH))
                  {
                    $cat=$row["name"];
                    $cat2=$row["email_address"];
                    echo "<option value='$cat2'>$cat</option>";

                  }
                  ?>
        </select><button class='btn btn-success btn-xs' name='chat_writer' onclick='openForm2()'  id="seedoc" disabled>Chat User</button>
      </div>
    </div>
              <header class="panel-heading">
                  User Message Table
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
               $query="SELECT * FROM chat where status='1' order by chat_date desc ";
$result_set=mysqli_query($conn,$query);
            while($row=mysqli_fetch_object($result_set)){
            

            echo "<tr class='gradeX'>
                  <td>$row->username</td>
                  <td>$row->chat_msg</td>
                  <td>$row->chat_date</td>  
                  <td>
                <input type='hidden' id='input' value='$row->username' name='username'/>
                 
                  </td>  
              </tr>";




         
          
            }
             ?>

<script type="text/javascript">  
    function enableButton()
{
    var selectelem = document.getElementById('task_id');
    var btnelem = document.getElementById('seedoc');
    btnelem.disabled = !selectelem.value;
}                                  
</script>
              </tfoot>
              </table>
              </div>
              </div>
              </section>
              </div>
              </div>
               <?php include 'customer_chat.php'; ?>
              <!-- page end-->
          </section>
      </section>
      <?php include 'footer.php' ;?>