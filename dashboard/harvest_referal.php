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
                      <!--Pulstate start-->
                      <section class="panel">
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
                  }?>

                           <table class="table table-hover p-table">
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i>customer Email</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Points</th>
                                  <th><i class="fa fa-bookmark"></i> date Created</th>
                                  <th><i class=" fa fa-edit"></i> Action</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                                 <?php
        

            $query="SELECT * FROM referal Where user_id='$user_id' and status='1' order by id desc";
$result_set=mysqli_query($conn,$query);
            while($row=mysqli_fetch_object($result_set)){
                $total_share=$pat4+$row->points;
                         echo"<tr>
                              <td>$row->email</td>
                                  <td class='hidden-phone'>$row->points</td>
                                   <td>$row->date_created</td>
                                  <td> 
                                 <form action='Controller/referalController.php' method='post'>
                                  <input type='hidden' name='ref_id' value='$row->id'>
                                   <input type='hidden' name='expected_bal' value='$total_share'>
                                    <input type='hidden' name='user_id' value='$user_id'>
                                      <button name='harvest_ref' class='label label-success label-mini'>
                                  harvest
                              </button>
                              </form>
                                  </td>
                              </tr>
                              <tr>";
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
