 <?php include 'header.php' ;?>


 <section id="main-content">
          <section class="wrapper site-min-height">
              <div class="row state-overview">
                  
                  
                
              </div>
              <div class="row">
                  <div class="col-lg-12">
                      <!--Pulstate start-->
                      <section class="panel">
                           <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i>Sender</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Message</th>
                                  <th><i class="fa fa-bookmark"></i>Date</th>
                                  <th><i class=" fa fa-edit"></i></th>
                              </tr>
                              </thead>
                              <tbody>
                                 <?php
        

            $query="SELECT * FROM chat Where status='1' order by chat_date desc ";
$result_set=mysqli_query($conn,$query);
            while($row=mysqli_fetch_object($result_set)){
               echo " <tr>
                                  <td>$row->username</td>
                                  <td class='hidden-phone'>$row->chat_msg</td>
                                  <td>$row->chat_date </td>
                                  <td>
                                  
                                  <input type='hidden' name='chatid' id='chatid' value='$row->chat_id_admin' />
                                      <button class='open-button2' name='chat_writer' onclick='openForm2()''>Chat</button>
                                
                                  </td>
                              </tr>
                              <tr>";
             }
                            
                           
                              ?>
                               
                              </tbody>
                          </table>
                      </section>
                      <!--Pulstate  end-->
                    <?php include 'chat.php' ?>
                              <i class='open-button1 fas fa-comment-dots' style='font-size:75px;color:#BBE36F ' onclick="openForm()"></i>


                  </div>

                  <?php include 'customer_chat.php'; ?>
              </div>
          </section>
      </section>
       <?php include 'footer.php' ;?>
