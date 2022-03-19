 <?php include 'header.php' ;?>


 <section id="main-content">
          <section class="wrapper site-min-height">

<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Form validations
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                  <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="">
                                      
                                       <div class="form-group ">
                                          <label class="control-label col-md-3">Number of Shares</label>
                                          <div class="col-md-9">
                                              <div id="spinner4">
                                                  <div class="input-group" >
                                                    
                                                      <input type="text" class="spinner-input form-control" maxlength="2" value="5" id="num" oninput="calc()">
                                                      
                                                  </div>
                                              </div>
                                             <span class="help-block">
                                                with step: 5
                                             </span>
                                          </div>
                                         </div>
                                       
                                         <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-3">Test Shares </label>
                                          <div class="col-lg-9">
                                              <input class="form-control" type="text" value="" />
                                          </div>
                                          <p>Price Per ticket : $<span id="ticket_price">10</span></p>
                                          </div>
                                           

                                         <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-3">Amount </label>
                                          <div class="col-lg-9">
                                            <p>Subtotal : <b>$<span id="total">0</span></b></p>
                                          </div>
                                          </div>
                                          <div class="form-group">
                                          <label class="control-label col-md-3">Maturity Date 3</label>
                                          <div class="col-md-9">
                                          <select class="form-control input-lg m-bot15" id="mydropbox" onchange="copyValue()" name="">
                                              <option value="1">One Day</option>
                                              <option value="2">Two Days</option>
                                              <option value="3">Three Days</option>
                                              <option value="4">Four Days</option>
                                              <option value="5">Five Days</option>
                                              <option value="6">Six Days</option>
                                              <option value="7">Seven Days</option>
                                          </select>
                                          </div>
                                         </div>
                                          <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-3">Intreast</label>
                                           <script>
function copyValue() {
    var dropboxvalue = document.getElementById('mydropbox').value;
    document.getElementById('qnt_1').value = dropboxvalue;
}
</script>
                                          <div class="col-lg-9">
                                              <input class="form-control"   minlength="2" type="text"  id="qnt_1" onkeyup="CalculateItemsValue()"/>
                                          </div>
                                          </div>
                                          <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-3">Total Amount</label>
                                          <div class="col-lg-9">
                                              <input class="form-control" id="cname" name="name" minlength="2" type="text"  />
                                          </div>
                                          </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-danger" type="submit">Save</button>
                                              <button class="btn btn-default" type="button">Cancel</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>

                          </div>
                      </section>
                  </div>
              </div>              
                              </form>
                          </div>
                      </section>
                  </div>
              </div>
          </section>
      </section>






      <script language="javascript">
var total_items = 2;

function CalculateItemsValue() {
  var total = 0;
  for (i=1; i<=total_items; i++) {
    
    itemID = document.getElementById("qnt_"+i);
    if (typeof itemID === 'undefined' || itemID === null) {
      alert("No such item - " + "qnt_"+i);
    } else {
      total = total + parseInt(itemID.value) * parseInt(itemID.getAttribute("data-price"));
    }
    
  }
  document.getElementById("ItemsTotal").innerHTML = "$" + total;
  
}
</script>
<script type="text/javascript">
  function calc() 
{
  var price = document.getElementById("ticket_price").innerHTML;
  var noTickets = document.getElementById("num").value;
  var total = parseFloat(price) * noTickets
  if (!isNaN(total))
    document.getElementById("total").innerHTML = total
}
</script>


<script type="text/javascript">
window.setInterval(function() {
    $.ajax({      
      url: "http://yourdomain/updateLastactive/?uid=" + User_ID,
      success: function(data) {

      }
    }); 
}, 5000); // 5 seconds 
</script>



<?php
 $query = "UPDATE user_meta SET active = '0' WHERE user_id = '125'";
$mysqli->query($query);

if($mysqli->affected_rows == 0){
    $query = "INSERT INTO user_meta (user_id, active) VALUES ('125', 0)";
    $mysqli->query($query);
 }
 ?>
       <?php include 'footer.php' ;?>
