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
 <style type="text/css">
    #loader{
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('../Loader/Loading.gif') 50% 50% no-repeat rgb(249,249,249);
        opacity: 1;
    }
       /* jssor slider loading skin spin css */
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }


        .jssorb052 .i {position:absolute;cursor:pointer;}
        .jssorb052 .i .b {fill:#000;fill-opacity:0.3;}
        .jssorb052 .i:hover .b {fill-opacity:.7;}
        .jssorb052 .iav .b {fill-opacity: 1;}
        .jssorb052 .i.idn {opacity:.3;}

        .jssora053 {display:block;position:absolute;cursor:pointer;}
        .jssora053 .a {fill:none;stroke:#fff;stroke-width:640;stroke-miterlimit:10;}
        .jssora053:hover {opacity:.8;}
        .jssora053.jssora053dn {opacity:.5;}
        .jssora053.jssora053ds {opacity:.3;pointer-events:none;}

    p.aaa {
  text-indent: 50px;
}
  </style>
  <div id="loader"></div>
 <section id="main-content">
          <section class="wrapper site-min-height">
              
              
              
              <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="shares.php">Manage Shares</a></li>
                          <li><a href=" harvest_referal.php">Harvest Referal Points</a></li>
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
   $q="select * from referal where user_id='$user_id' AND status='1'";
$res=mysqli_query($conn,$q);
echo mysqli_num_rows($res);
?>
                              </h1>
                              <p>My Referrals</p>
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
   $q="select shares from share_transactions where user_id='$user_id' and status!='0'";
$res=mysqli_query($conn,$q);
echo mysqli_num_rows($res);
?>
                              </h1>
                              
                              <p>number of times bidded</p>
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
require_once("includes/connection.php");
$sqi="select *from login_user where user_id='$user_id' || email_address='userid'";
                  $record=mysqli_query($conn,$sqi);
                  while ($row=mysqli_fetch_array($record,MYSQLI_BOTH))
                  {
                    $dat=$row["account_bal"];
                    $dat1=$row["expected_bal"];
                    
                  }
echo "Ksh:",$dat1;
?>           
                              </h1>
                              <p>my wallet</p>
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
                              <p>Available Shares</p>
                          </div>
                      </section>
                  </div>
                 
              </div>
              <div class="row">
                  <div class="col-lg-12">
                      <!--Pulstate start-->
                      <section class="panel">
                          <div class="panel-body">
                              <a href="buy_shares.php" class="btn btn-default" id="pulsate-regular">Buy Shares</a>
                              <button onclick="myFunction()" class="btn btn-success">+ Copy Referral Link</button>
              <div class="room-box">
           
 <input type="text" value="http://localhost/ben/register.html?<?php echo $name;?>id=<?php echo $user_id;?>" id="myInput" /readonly>
                                        <script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  //alert("Copied the text: " + copyText.value);
}
</script>
                          </div>




                          
                              <div class="alert alert-info fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <strong>Dear <?php echo $name;?>!</strong> This is Urgent.if you have not provided us with your phone number.go to profiles<a href="profile.php"></br>Click me</a>.Please!<p>if you have then cancel this notification
                                  </p>
                              </div>
                          

                           <table class="table table-hover p-table">
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> My Shares</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> AMount</th>
                                  <th><i class="fa fa-bookmark"></i> Gross Profit</th>
                                  <th><i class=" fa fa-edit"></i> Status</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                                 <?php
        

            $query="SELECT * FROM share_transactions Where user_id='$user_id'  and is_active='1' order by id desc ";
$result_set=mysqli_query($conn,$query);
            while($row=mysqli_fetch_object($result_set)){
             

             if($row->status=='1'){
                $rem_shares= $cat1+$row->shares;



                $start=$row->date;
                $today = date("Y-m-d H:i:s");
                //$datecomp=date('Y-m-d H:i',strtotime('+2 hour +00 minutes',$start));
                 $datecomp=date('Y-m-d H:i',strtotime('+12 hour +00 minutes',strtotime($start)));
                if($today<=$datecomp){



               echo " <tr>
                                   <form action='Controller/shareController.php' method='post'>
                                    <input type='hidden' name='shares_id' value='$row->id'>
                                    <input type='hidden' name='user_id' value='$user_id'>
                                  <input type='hidden' name='rem_shares' value='$rem_shares'>
                                  <td><button name='delete_trans' class='btn btn-danger btn-xs'>
                                  Cancel
                              </button></form>
                              $row->shares</td>
                                  <td class='hidden-phone'>$row->amount</td>
                                   <td>$row->gross_amount</td>
                                    <td><span class='label label-warning label-mini'>Unpaid</span></td>
                                  <td> 
                                 <form action='pay_share.php' method='post'>
                                  <input type='hidden' name='id' value='$row->id'>
                                   <input type='hidden' name='shares_id' value='$row->id'>
                                    <input type='hidden' name='user_id' value='$user_id'>
                                  <input type='hidden' name='rem_shares' value='$rem_shares'>
                                      <button name='paynow' class='label label-success label-mini'>
                                  PayNow
                              </button>
                              
                              </form>
                              
                                  </td>
                              </tr>
                              <tr>";

                }else{

                    echo " <tr>
                    <form action='Controller/shareController.php' method='post'>
                     <input type='hidden' name='shares_id' value='$row->id'>
                     <input type='hidden' name='user_id' value='$user_id'>
                   <input type='hidden' name='rem_shares' value='$rem_shares'>
                   <td><button name='delete_trans' class='btn btn-danger btn-xs'>
                   Cancel
               </button></form>
               $row->shares</td>
                   <td class='hidden-phone'>$row->amount</td>
                    <td>$row->gross_amount</td>
                     <td><span class='label label-warning label-mini'>Late</span></td>
                   <td> 
                   <form action='Controller/shareController.php' method='post'>
                   <input type='hidden' name='shares_id' value='$row->id'>
                   <input type='hidden' name='user_id' value='$user_id'>
                 <input type='hidden' name='rem_shares' value='$rem_shares'>
                 <td><button name='delete_trans' class='btn btn-danger btn-xs'>
                 Cancel Share
             </button></form>
               
                   </td>
               </tr>
               <tr>";
                }



             }if($row->status=='2'){
               echo " <tr>
                                  <td>$row->shares</td>
                                  <td class='hidden-phone'>$row->amount</td>
                                   <td>$row->gross_amount</td>
                                    <td><span class='label label-info label-mini'>Inprogress</span></td>
                                  <td> 
                                  <form action='pay_wait.php' method='post'>
                                  <input type='hidden' name='id' value='$row->id'>
                                      <button name='paynow' class='btn btn-danger btn-xs'>
                                  Details
                              </button>
                              </form>
                              
                                  </td>
                              </tr>
                              <tr>";
                            }



           if($row->status=='3'){
               echo " <tr>
                                  <td>$row->shares</td>
                                  <td class='hidden-phone'>$row->amount</td>
                                   <td>$row->gross_amount</td>
                                    <td><span class='label label-success label-mini'>Paid</span></td>
                                  <td>
                                     <form action='pay_done.php' method='post'>
                                  <input type='hidden' name='id' value='$row->id'>
                                      <button name='paynow' class='btn btn-danger btn-xs'>
                                  Details
                              </button>
                              </form>
                                 
                                  </td>
                              </tr>
                              <tr>";
             }
                            
                            }
                              ?>
                              </tbody>
                          </table>
                      </section>
                      <!--Pulstate  end-->
                   


                  </div>
              </div>
          </section>
          
          
          
          
          
          
          
          <script type="text/javascript">
  $(window).on('load', function(){
    //you remove this timeout
    setTimeout(function(){
          $('#loader').fadeOut('slow');  
      });
      //remove the timeout
      //$('#loader').fadeOut('slow'); 
  });
</script>
          
          
          
          
          
          
          
          
      </section>
       <?php include 'footer.php' ;?>
