 <?php
require_once("includes/connection.php");

session_start();
if(!isset($_SESSION["email_address"])){
    header("location:/../index.php");

} else{
    $admin = $_SESSION['email_address'];
}
?>
 <?php require_once 'header.php';?>
 <section id="main-content">
          <section class="wrapper site-min-height">

               <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="manageusers.php"><i class="fa fa-home"></i>Manage Users</a></li>
                          <li><a href="admin_shares.php">Manage Shares</a></li>
                           <li><a href="deactivate_shares.php">Deactivate Shares</a></li>
                          <li><a href="shareholders.php">Manage SharesHolders</a></li>
                            <li><a href="share_pay.php">Arrange Sellers</a></li>
                             <li><a href="share_buying.php">Share Buying</a></li>
                          <li ><a href="chat_user.php">Chat </a></li>
                          <li ><a href="user_logs.php">Activities </a></li>
                           <li ><a href="referal_shares.php">Referal_shares </a></li>
                          <li>General Information</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
               </div>


              

               <div class="row state-overview">
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="fa fa-user"></i>
                          </div>
                          <div class="value">
                              <h1 class="count">
                                  <?php
   $q="select * from login_user where active_status='1'";
$res=mysqli_query($conn,$q);
echo mysqli_num_rows($res);
?>
                              </h1>
                              <p>Total users</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="fa fa-tags"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count2">
                                 <?php
$query="SELECT * FROM shares where status='1'";
$result_set=mysqli_query($conn,$query);
            while($row=mysqli_fetch_object($result_set)){
              echo $row->shares_limit-$row->available_shares;
}
?>
                              </h1>
                              <p>Bought Shares</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="fa fa-shopping-cart"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count3">
                               <?php 
require_once("includes/connection.php");
$sqi="select * from shares order by date_created desc";
                  $record=mysqli_query($conn,$sqi);
                  while ($row=mysqli_fetch_array($record,MYSQLI_BOTH))
                  {
                    $cat=$row["share_price"];
                    $cat1=$row["available_shares"];
                  }
echo "$cat1";
?>           

                              </h1>
                              <p>Revenue Gained</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="fa fa-bar-chart-o"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count4">
                                  0
                              </h1>
                              <p>My Wallet</p>
                          </div>
                      </section>
                  </div>
              </div>
                   


                  </div>
              </div>
          </section>
          
          
          
          
          
          
         <div class="panel-body">
                   <div class="btn-group">
                                  <button id="editable-sample_new" class="btn green" data-toggle="modal" href="#myModal">
                                      Add Shares <i class="fa fa-plus"></i>
                                  </button>
                                    
                              </div>
          
          
          
          
          
          
          
      </section>
       <?php include 'footer.php' ;?>
