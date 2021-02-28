<?php

session_start();

if( $_SESSION['user_id']=='') {

    header("Location:index.php?msg=2");
}
else{

session_start();

require_once("conf.php");

$id = $_POST['id'];

$updated_by = $_SESSION['user_id'];

$mobile=$_POST['mobile'];
$email=$_POST['email'];
$address=$_POST['address'];
$state=$_POST['state'];
$district=$_POST['district'];


$update = " UPDATE patient_details SET `mobile` = '".$mobile."' , `email` = '".$email."' , `address` = '".$address."' , `state` = '".$state."', 
`district` = '".$district."' , `updated_by` = '".$updated_by."' WHERE id = '$id' ";

mysqli_query($conn,$update);
header("Location:patient_view.php");

}?>