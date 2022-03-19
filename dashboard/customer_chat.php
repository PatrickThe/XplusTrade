

<style>
.open-button2 {
  cursor: pointer;
}

/* The popup chat - hidden by default */
.chat-popup2 {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 5px solid #E7EEEC;
  z-index: 9;
}

/* Add styles to the form container */
.form-container2 {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */


/* Set a style for the submit/send button */
.form-container2 .btn {
  background-color:#4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container2.cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container2 .btn:hover, .open-button2:hover {
  opacity: 1;
}
</style>




<div class="chat-popup2" id="essay">
  



 
 <div  style="height:30px; width: 300px; background-color:#5A6C69;" ><span style="color:#D7DED3 " class="logo"><b> <span>Customer Name:<input type="text" id="chatid" name="name" value="" style="background-color:#666363" /></span></b></a></span>
 
 
 <button type="button" class="close" aria-label="Close" onclick="closeForm2()">
  <span aria-hidden="true" height="20px"><i class="fa fa-close" style="font-size:20px;color:red"></i></span>
  
</button></div>
  <div id="chatwriter" style="overflow-y:scroll; height:300px; width: 300px; background-color:#FFFFFF ;" id="essay"></div>
        <div class="form-container2">
          <!--<input type="text" id="msg">--><br/>
          <textarea id="messo" rows="2" cols="37" style="background-color:#D7DED3" height="10px"></textarea><br/>



          <input type="text" id="username" name="task_id" value=""/>
  <script type="text/javascript">
    function task(thisObj)
{

  document.getElementById('chatid').value = thisObj.options[thisObj.selectedIndex].text;
   document.getElementById("chatid").innerHTML=document.getElementById("task_id").value
   
   var n1 = document.getElementById('task_id');
  var n2 = document.getElementById('username');
  n2.value = n1.value;

}

 function showSelected(thisObj)
{

  document.getElementById('show2').value = thisObj.options[thisObj.selectedIndex].text;

}
  </script>
          <input type="text" id="chatid" name="to_user" value="" />
          <input type="text" value="Admin"  id="sender" />
       
            <button type="submit" id="send" style="background-color:#68D5BC;padding: 15px 130px;" width="80">Send</button></br>
    
    
     
        </div>
       
</div>


<script>
function openForm2() {
  document.getElementById("essay").style.display = "block";
}

function closeForm2() {
  document.getElementById("essay").style.display = "none";
}
</script>

<script type="text/javascript">

$(document).keypress(function(s){ //using keyboard enter key
  
  /* Send Message */  
    if(s.which === 13){ 
        if($('#messo').val() == ""){
        //alert('Please write message first');
      }else{
        $messo = $('#messo').val();
        $chatid= $('#chatid').val();
         $sender = $('#sender').val();
        $.ajax({
          type: "GET",
          url: "chat_usercontroller.php",
          data: {
            messo: $messo,
            chatid: $chatid,
            sender: $sender,
          },
          success: function(){
            Result();
            $('#messo').val(''); //clears the textarea after submit
          }
        });
      } 

      /* $("form").submit(); 
       alert('You press enter key!'); */
    }
  }
); 


$(document).ready(function(writing){ //using send button
  Result();
  /* Send Message */  
    
    $('#send').on('click', function(writing){
      if($('#messo').val() == ""){
        alert('Please write message first ');
      }else{
        $messo = $('#messo').val();
        $chatid = $('#chatid').val();
        $sender = $('#sender').val();
        $.ajax({
          type: "GET",
          url: "chat_usercontroller.php",
          data: {
            messo: $messo,
            chatid: $chatid,
            sender: $sender,
          },
          success: function(){
            Result();
            $('#messo').val(''); //clears the textarea after submit
          }
        });
      } 
    });
  /* END */
  });
  
  function Result(){
    $chatid = $('#chatid').val();
    $.ajax({
      url: 'chat_usercontroller.php',
      type: 'GET',
      //async: false,
      data:{
        chatid: $chatid,
        res: 1,
      },
      success: function(response){
        $('#chatwriter').html(response);
      }
    });
  }
  setInterval('Result()' ,450);
</script>


