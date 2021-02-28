<?php 

session_start();

if( $_SESSION['user_id']=='') {

    header("Location:index.php?msg=2");
}
else{
require_once("conf.php");
$updated_by = $_SESSION['user_id'];

$id = $_GET['id'];


$logical_delete= " UPDATE patient_details SET is_dead = 'Y', is_active = '', updated_by = '".$updated_by."' WHERE id = '$id' ";


mysqli_query($conn,$logical_delete);


header("Location:patient_dead.php");

}?>