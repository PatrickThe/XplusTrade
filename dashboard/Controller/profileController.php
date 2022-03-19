  <?php
  require_once("../includes/connection.php");
  if (isset($_POST['edit_prof'])) { // if save button on the form is clicked
$name =$_POST['name'];
$userid =$_POST['userid'];
$phone = $_POST['phone'];
$filename = $_FILES['myfile']['name'];

    $destination = '../img/' . $filename;
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];


 if (move_uploaded_file($file, $destination)) {
 mysqli_query($conn,"UPDATE login_user SET name= '$name',phone='$phone',size= '$size',avarta= '$filename' WHERE  email_address='$userid'")or die(mysqli_error($conn));
            
                   echo  "<meta http-equiv=\"refresh\"content=\"0;URL=../profile.php\">";
}
else{
 mysqli_query($conn,"UPDATE login_user SET name= '$name',phone= '$phone' WHERE  email_address='$userid'")or die(mysqli_error($conn));
            
                   echo  "<meta http-equiv=\"refresh\"content=\"0;URL=../profile.php\">";

}
}
?>