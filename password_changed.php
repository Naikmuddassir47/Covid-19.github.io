<?php

require_once("conf.php");

session_start();

$u_email = $_SESSION['user_id'];

if(count($_POST)>0) {

$select = "SELECT * FROM am_login WHERE `email`='".$u_email."'";

    $query=mysqli_query($conn,$select);
    $res=mysqli_fetch_assoc($query); 
    
if($_POST["newPassword"] != ""){
       

    if (password_verify($_POST["currentPassword"], $res["password"])) {
        if( $_POST["newPassword"] == $_POST["confirmPassword"] ) {
            $hashedpassword = password_hash($_POST["newPassword"], PASSWORD_DEFAULT);
            mysqli_query($conn,"UPDATE am_login set password='" . $hashedpassword . "' WHERE email='" . $u_email . "'");
            header("Location:admin.php?msg=5");
    
        } 
    
        else{
        header("Location:changepassword.php?msg=3");

            }
    }
    else{
    header("Location:changepassword.php?msg=4");
    }
}
else{
header("Location:changepassword.php?msg=6");
}

}

?>


