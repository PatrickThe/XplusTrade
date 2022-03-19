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

  <section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              <div class="row">
                  <aside class="profile-nav col-lg-3">
                      <section class="panel">
                          <div class="user-heading round">
                              <a href="#">
                                  <img src="img/<?php echo $avarta;?>" alt="">
                              </a>
                              <h1><?php echo $name ;?></h1>
                              <p><?php echo $userid ;?></p>
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li><a href="profile.html"> <i class="fa fa-user"></i> Profile</a></li>
                          </ul>

                      </section>
                  </aside>
                  <aside class="profile-info col-lg-9">
                      <section class="panel">
                          <div class="bio-graph-heading">
                              Alpha Auctions will need you to provide accurate information at all times.Your Sincerity will be of benefit to you
                          </div>
                          <div class="panel-body bio-graph-info">
                              <h1> Profile Info</h1>
                              <form action="Controller/profileController.php" method="Post" class="form-horizontal" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Names</label>
                                      <div class="col-lg-6">
                                          <input type="text" class="form-control" name="name" value=" <?php echo $name;?>">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Email</label>
                                      <div class="col-lg-6">
                                          <input type="text" class="form-control" name="userid" value="<?php echo $userid;?>" /readonly>
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Registered Date</label>
                                      <div class="col-lg-6">
                                          <input type="text" class="form-control" id="b-day" value="<?php echo $date;?>" /readonly>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Phone</label>
                                      <div class="col-lg-6">
                                          <input type="number" class="form-control"   name="phone" value="<?php echo $phone; ?>">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                          <label  class="col-lg-2 control-label">Change Profile Photo</label>
                                          <div class="col-lg-6">
                                              <input type="file" class="file-pos" name="myfile" id="exampleInputFile">
                                          </div>
                                      </div>
                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                          <button type="submit" name="edit_prof" class="btn btn-success">Save</button>
                                        </form>
                                          <button type="button" class="btn btn-default">Cancel</button>
                                      </div>
                                  </div>
                             
                          </div>
                      </section>
                     
                  </aside>
              </div>

              <!-- page end-->
          </section>
      </section>
      <?php require_once 'footer.php';?>
