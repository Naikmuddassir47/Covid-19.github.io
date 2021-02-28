<?php


require_once("conf.php");

$email = $_POST['u_email'];
$password = $_POST['u_pass'];

$hash = password_hash($password, PASSWORD_DEFAULT);

$repassword = $_POST['u_re_pass'];

$select = " SELECT * FROM am_login where email = '$email' ";
$query = mysqli_query($conn,$select);
$res=mysqli_fetch_assoc($query);

if($res)
{
    header("Location:registration_form.php?msg= 20");
}

else if ($password == $repassword)
{
    $select1 = " INSERT INTO am_login (`email` , `password`) VALUES ('".$email."','".$hash."') ";
    $query1 = mysqli_query($conn,$select1);
    $res1 = mysqli_fetch_assoc($query1);

    header("Location:index.php");
    
}

else
{
    header("Location:registration_form.php?msg= 21");
}

// else{
//     echo "Passwords do not match, Please try again.";
// }

?>