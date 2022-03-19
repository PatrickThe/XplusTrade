<?php
require_once("includes/connection.php");

//session_start();
if(!isset($_SESSION["email_address"])){
    header("location:/../index.php");

} else{
    $admin = $_SESSION['email_address'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">
<?php 

     require_once("includes/connection.php");


   $userid = mysqli_real_escape_string($conn,$_SESSION['email_address']);


  $r = mysqli_query($conn,"SELECT * FROM login_user where email_address = '$userid'") or die (mysqli_error($con));

  $row = mysqli_fetch_array($r);

   $email_address=$row['email_address'];
   $avarta=$row['avarta'];
   $user_id=$row['user_id'];
   $name =$row['name'];
   $phone =$row['phone'];
   $date_joined =$row['date_joined'];
   $last_seen_noti=$row['last_seen_noti'];
   $account_bal=$row['account_bal'];
   $user_status = $row['user_status'];
?>
    <title>Alphaactions -<?php echo $name; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="functions/css/bootstrap.min.css" rel="stylesheet">
    <link href="functions/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="functions/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!--right slidebar-->
    <link href="functions/css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    
    <link href="functions/css/font-awesome.css" rel="stylesheet">
    <link href="functions/css/style.css" rel="stylesheet">
    <link href="functions/css/style-responsive.css" rel="stylesheet" />
    <script src="functions/js/fontawesome.js" ></script>
    <script src="js/jquery-3.1.1.js"></script> 
    <script src="jquery-3.1.1.js"></script> 

   
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <header class="header green-bg">
          <div class="sidebar-toggle-box">
              <i class="fa fa-bars"></i>
          </div>
          <!--logo start-->
          <a href="index.html" class="logo" >Xplus<span>Trade</span></a>
          <!--logo end-->
          <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
              <!-- settings start -->
              <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                      <i class="fa fa-tasks"></i>
                      <span class="badge bg-success">6</span>
                  </a>
                  <ul class="dropdown-menu extended tasks-bar">
                      <div class="notify-arrow notify-arrow-green"></div>
                      <li>
                          <p class="green">You have 6 pending tasks</p>
                      </li>
                      <li>
                          <a href="#">
                              <div class="task-info">
                                  <div class="desc">Dashboard v1.3</div>
                                  <div class="percent">40%</div>
                              </div>
                              <div class="progress progress-striped">
                                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                      <span class="sr-only">40% Complete (success)</span>
                                  </div>
                              </div>
                          </a>
                      </li>
                      <li>
                          <a href="#">
                              <div class="task-info">
                                  <div class="desc">Database Update</div>
                                  <div class="percent">60%</div>
                              </div>
                              <div class="progress progress-striped">
                                  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                      <span class="sr-only">60% Complete (warning)</span>
                                  </div>
                              </div>
                          </a>
                      </li>
                      
                      <li class="external">
                          <a href="#">See All Tasks</a>
                      </li>
                  </ul>
              </li>
              <!-- settings end -->
              <!-- inbox dropdown start-->
              <li id="header_inbox_bar" class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                      <i class="fa fa-envelope-o"></i>
                      <span class="badge bg-important">5</span>
                  </a>
                  <ul class="dropdown-menu extended inbox">
                      <div class="notify-arrow notify-arrow-red"></div>
                      <li>
                          <p class="red">You have 5 new messages</p>
                      </li>
                      <li>
                          <a href="#">
                              <span class="photo"><img alt="avatar" src="./img/avatar-mini.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Jonathan Smith</span>
                                    <span class="time">Just now</span>
                                    </span>
                                    <span class="message">
                                        Hello, this is an example msg.
                                    </span>
                          </a>
                      </li>
                     
                      <li>
                          <a href="#">See all messages</a>
                      </li>
                  </ul>
              </li>
              <!-- inbox dropdown end -->
              <!-- notification dropdown start-->
              <li id="header_notification_bar" class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                      <i class="fa fa-bell-o"></i>
                      <span class="badge bg-warning">7</span>
                  </a>
                  <ul class="dropdown-menu extended notification">
                      <div class="notify-arrow notify-arrow-yellow"></div>
                      <li>
                          <p class="yellow">You have 7 new notifications</p>
                      </li>
                      <li>
                          <a href="#">
                              <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                              Server #3 overloaded.
                              <span class="small italic">34 mins</span>
                          </a>
                      </li>
                     
                      <li>
                          <a href="#">See all notifications</a>
                      </li>
                  </ul>
              </li>
              <!-- notification dropdown end -->
          </ul>
          </div>
          <div class="top-nav ">
              <ul class="nav pull-right top-menu">
                  <li>
                      <input type="text" class="form-control search" placeholder="Search">
                  </li>
                  <!-- user login dropdown start-->
                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <img alt="" src="img/avatar1_small.jpg">
                          <span class="username">Welcome,<?php echo ucwords(htmlentities($name)); ?></span>
                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu extended logout">
                          <div class="log-arrow-up"></div>
                          <li><a href="profile.php"><i class=" fa fa-suitcase"></i>Profile</a></li>
                          <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                          <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>
                          <li><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>
                      </ul>
                  </li>

                  <!-- user login dropdown end -->
                  
              </ul>
          </div>
      </header>
      <!--header end-->
      <!--sidebar start-->
       <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              <?php if($user_status=='3'){
                ?>
                <li>
                     <a href="super_dashboard.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Super Dashboard</span>
                      </a>
                  </li>
                  <li>
                      <a href="admin_dashboard.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Admin Dashboard</span>
                      </a>
                      
                  </li>
                   <li>
                      <a href="manager_dashboard.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Manager Dashboard</span>
                      </a>
                      
                  </li>
                <?php }
                if($user_status=='2'){?>
                  <li>
                      <a href="admin_dashboard.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Admin Dashboard</span>
                      </a>
                      
                  </li>
                   <li>
                      <a href="admin_dashboard.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Manager Dashboard</span>
                      </a>
                      
                  </li>
               <?php }
                if($user_status=='1'){
                ?>
                 <li>
                      <a href="admin_dashboard.php">
                          <i class="fa fa-laptop"></i>
                          <span>Admin Dashboard</span>
                      </a>
                      
                  </li>
                  <?php }?>
                  <li>
                      <a href="dashboard.php">
                          <i class="fa fa-marker"></i>
                          <span>User Dashboard</span>
                      </a>
                  </li>
                  <li>
                  <li>
                      <a href="buy_shares.php" >
                           <i class="fa fa-map-bank"></i>
                          <span>Buy/sell Shares </span>
                      </a>
                  </li>  
                  <li>
                      <a  href="logout.php">
                          <i class="fa fa-user"></i>
                          <span>logout Page</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      
      
      
      
      
      <script type="text/javascript">
    var IDLE_TIMEOUT = 10 * 60;  // 10 minutes of inactivity
    var _idleSecondsCounter = 0;
    document.onclick = function() {
        _idleSecondsCounter = 0;
    };
    document.onmousemove = function() {
        _idleSecondsCounter = 0;
    };
    document.onkeypress = function() {
        _idleSecondsCounter = 0;
    };
    window.setInterval(CheckIdleTime, 100000);
    function CheckIdleTime() {
        _idleSecondsCounter++;
        var oPanel = document.getElementById("SecondsUntilExpire");
        if (oPanel)
            oPanel.innerHTML = (IDLE_TIMEOUT - _idleSecondsCounter) + "";
        if (_idleSecondsCounter >= IDLE_TIMEOUT) {
            // destroy the session in logout.php 
            document.location.href = "logout.php";
        }
    }
</script>