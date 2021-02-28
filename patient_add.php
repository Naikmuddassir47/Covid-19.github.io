<?php 

session_start();

if( $_SESSION['user_id']=='') {

    header("Location:index.php?msg=2");
}
else{

session_start();

require_once("conf.php");

$filename = $_FILES["uploadfile"]["name"]; 
$tempname = $_FILES["uploadfile"]["tmp_name"];     
$folder = "uploads/".$filename;

$created_by = $_SESSION['user_id'];

$select = "SELECT * FROM patient_details ORDER BY id DESC LIMIT 1";
$query = mysqli_query($conn,$select);

$res = mysqli_fetch_assoc($query);
if ($res)
{
    $pid = $res['id'];
    $f_pid = $pid + 1;
}
else{
    $f_pid = 1;
}

$patient_id = $f_pid;  

$firstname = $_POST['firstname'];
$lastname =$_POST['lastname'];
$gender= $_POST['gender'];
$dob=date('Y-m-d', strtotime($_POST['dateofbirth']));
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$bloodgroup=$_POST['bloodgroup'];
$nationality=$_POST['nationality'];
$age = $_POST['age'];
$address=$_POST['address'];
$state='Telangana';
$district=$_POST['district'];
$comorbidity = $_POST['comorbidity'];
$dot=date('Y-m-d', strtotime($_POST['dateoftest']));
$dotr=date('Y-m-d', strtotime($_POST['dateoftestresults']));
$active = 'Y';

$insert ="INSERT INTO patient_details
    (`id`,`first_name`,`last_name`,`gender`,`date_of_birth`,`email`,`mobile`,`blood_group`,`nationality`,
    `age`,`address`,`state`,`district`,`has_comorbidity`,`date_tested`,`test_result_date`,`is_active`,`image`,`created_by`) VALUES
    ('".$patient_id."','".$firstname."','".$lastname."','".$gender."','".$dob."','".$email."','".$mobile."','".$bloodgroup."','".$nationality."','".$age."','".$address."','".$state."','".$district."','".$comorbidity."','".$dot."','".$dotr."','".$active."','".$filename."','".$created_by."')";

        
mysqli_query($conn,$insert);

if (move_uploaded_file($tempname, $folder))  { 
    $msg = "Image uploaded successfully"; 
}else{ 
    $msg = "Failed to upload image"; 
}

header("Location:patient_view.php");  

}?>