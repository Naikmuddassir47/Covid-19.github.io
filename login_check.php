<?php

require_once("conf.php");

$u_email = $_POST['u_email'];
$u_pass = $_POST['u_pass'];
    
$select = "SELECT * FROM am_login WHERE `email`='".$u_email."' ";

$query=mysqli_query($conn,$select);
$res=mysqli_fetch_assoc($query); 
if($res){
$hash = $res['password'];

if (password_verify($u_pass, $hash)) {
  session_start();
    
  $_SESSION['user_id'] = $res['email'];
  $_SESSION['user_name'] = $res['email'];
      
  header("Location:admin.php");
}
else {
    header("Location:index.php?msg=1");
}
}
else{
  header("Location:index.php?msg=2");
}

?>