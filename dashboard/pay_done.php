 <?php
require_once("includes/connection.php");

session_start();
if(!isset($_SESSION["email_address"])){
    header("location:/index.php");

} else{
    $admin = $_SESSION['email_address'];
}
?>
  <?php require_once 'header.php';?>
  <?php
include('includes/connection.php');
if (isset($_POST['paynow'])) { 
$id = mysqli_real_escape_string($conn, $_POST["id"]); 
 $query="SELECT * FROM share_transactions where id = '$id'";
$result_set=mysqli_query($conn,$query);
            while($row=mysqli_fetch_array($result_set)){
             $order_amount=$row['order_amount'];
              $id=$row['id'];
              $user_id = $row['user_id'];
              //$phone = $row['phone'];
              $shares=$row['shares'];
              $amount =$row['amount'];
              $maturity=$row['maturity'];
              $intreast =$row['intreast'];
              $gross_amount=$row['gross_amount'];
              $date = $row['date'];
              $maturity_date=$row['maturity_date'];
              $status = $row['status'];
               //$expected_bal=$row['expected_bal'];
              }
            
                                                    } ?>
                                                    
                                                    
<style type="text/css">
    #loader{
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('../Loader/Loader.gif') 50% 50% no-repeat rgb(249,249,249);
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
          <section class="wrapper">
              <!-- invoice start-->
              <section>
                  <div class="panel panel-primary">
                      <!--<div class="panel-heading navyblue"> INVOICE</div>-->
                      <div class="panel-body">
                          <div class="row invoice-list">
                              <div class="text-center corporate-id">
                                  <img src="img/vector-lab.jpg" alt="">
                              </div>
                              
                              
                              <?php if($status=='3'){

                              ?>
                               <div class="col-lg-4 col-sm-4">
                                  <h4>You are the share owner</h4>
                                  
                              </div>
                              <div class="col-lg-4 col-sm-4">
                                  <h4>Alpha Auctions </h4>
                                  <p>
                                      
                                      you have paid :<strong><?php echo $amount;?></strong><br>
                                      to share owner<br>
                                     
                                  </p>
                              </div>
                              <div class="col-lg-4 col-sm-4">
                                  <h4>INVOICE INFO</h4>
                                  <ul class="unstyled">
                                      <li>Invoice Number    : <strong><?php echo $id;?></strong></li>
                                      <li>Invoice Date    : <?php echo $date;?></li>
                                      <li>Due Date      : <?php echo $maturity_date;?></li>
                                      <i>Total Amount expecting : <?php echo $gross_amount;?></li>
                                      <li>Invoice Status    : unPaid</li>
                                  </ul>
                              </div>
                          </div>
                  
                       

                    
                      
                      <?php }?>
                          <table class="table table-striped table-hover">
                              <thead>
                              <tr>
                                  <th>TransNumber</th>
                                  <th>Shares</th>
                                  <th class="">Unit Cost</th>
                                   <th class="">Maturity Countdown</th>
                                  
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td><?php echo $id;?></td>
                                  <td><?php echo $shares;?></td>
                                  <?php 
                  //query for courses
                  $sqi="SELECT * FROM shares Where status='1'";
                  $record=mysqli_query($conn,$sqi);
                  
                  while ($row=mysqli_fetch_array($record,MYSQLI_BOTH))
                  {
                    $cat=$row["share_price"];
                    //$cat2=$row["order_id"];
                     
                  }

                  ?>
                                  <td class=""><?php echo $cat;?></td>
                                  <td class=""><div id="countdown" class='badge bg-important'></td>
                              </tr>
                              
                              </tbody>
                          </table>
                          <div class="row">
                              <div class="col-lg-4 invoice-block pull-right">
                                  <ul class="unstyled amounts">
                                      <li><strong>Sub - Total amount(Ksh):</strong> <?php echo $amount;?></li>
                                      <li><strong>Intreast:</strong> <?php echo $intreast-'100';?>%</li>
                                      <li><strong>VAT :</strong> -----</li>
                                      <li><strong>Grand Total :</strong> (ksh)<?php echo $gross_amount;?></li>
                                  </ul>
                                   <ul class="unstyled amounts">
                                      <li><strong>Maturity countdown :</strong> <div id="countdown1" class='badge bg-important'></div></li>
                                      <li><strong>Discount :</strong> 0%</li>
                                      <li><strong>VAT :</strong>0%</li>
                                      <li>

                                        <script>
      function countdownTimer() {
        const difference = +new Date("<?php echo $maturity_date ;?>") - +new Date();
        let remaining = "Share Matured!";

        if (difference > 0) {
          const parts = {
            days: Math.floor(difference / (1000 * 60 * 60 * 24)),
            hours: Math.floor((difference / (1000 * 60 * 60)) % 24),
            minutes: Math.floor((difference / 1000 / 60) % 60),
            seconds: Math.floor((difference / 1000) % 60)
          };

          remaining = Object.keys(parts)
            .map(part => {
              if (!parts[part]) return;
              return `${parts[part]} ${part}`;
            })
            .join(" ");
        }

        document.getElementById("countdown").innerHTML = remaining;
        document.getElementById("countdown1").innerHTML = remaining;
      }

      countdownTimer();
      setInterval(countdownTimer, 1000);
    </script></li>
                                  </ul>
                              </div>
                          </div>
                          <div class="text-center invoice-btn">
                            <?php 
                             
                              ?>
                           
                            <?php 
                            ?>
                            
                            
                            
                            
                                
                               
                        <?php
                            
                            $sqi="select * from login_user where user_id='$user_id'";
                  $record=mysqli_query($conn,$sqi);
                  while ($row=mysqli_fetch_array($record,MYSQLI_BOTH))
                  {
                    $pat=$row["phone"];
                    $pat1=$row["user_id"];
                     $pat2=$row["name"];
                      $pat3=$row["account_bal"];
                       $pat4=$row["expected_bal"];
                       $pat5=$row["expected_bal1"];
                  }
                            
                            if($status='3'){
                                date_default_timezone_set("Africa/Nairobi");
$today = date("Y-m-d H:i:s",strtotime("+0 HOURS"));
                               $profit=$pat5*0.2;
                                $ex_bal=$pat4+$gross_amount;
                                if($maturity_date<$today){
                                $ex_bal=$pat4+$gross_amount;
                            
                $sqi="select * from transaction_queue where status='1' order by id desc limit 1";
                  $record=mysqli_query($conn,$sqi);
                  while ($row=mysqli_fetch_array($record,MYSQLI_BOTH))
                  {
                    $qat1=$row["id"];
                   // $qat1=$row["user_id"];
                     $qat=($qat1+1);
                      
                  }
                  ?>
                           
                            <form action="Controller/PaymentController.php" method="POST">
                              <input type="text" name="pay_id" value="<?php echo $id;?>">
                             <input type="text" name="user_id" value="<?php echo $user_id;?>">
                             <input type="text" name="expected_bal" value="<?php echo $ex_bal;?>">
                             <input type="text" name="shares" value="<?php echo $ex_bal;?>">
                              <input type="text" name="invoice_no" value="<?php echo $qat;?>">
                              <button class="btn btn-info btn-lg" name="reselling" > <i class="fa fa-check"></i> Resel my share</button>
                              
                            </form>
                            
                            
                            
                            <?php }}?>
                          </div>
                            
                      </div>
                      
                  </div>
              </section>
              <!-- invoice end-->
          </section>
           <script>
    function terms_changed(termsCheckBox){
    //If the checkbox has been checked
    if(termsCheckBox.checked){
        //Set the disabled property to FALSE and enable the button.
        document.getElementById("submit_button").disabled = false;
    } else{
        //Otherwise, disable the submit button.
        document.getElementById("submit_button").disabled = true;
    }
}
</script>
  
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