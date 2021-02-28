<?php  

session_start();

if( $_SESSION['user_id']=='') {

    header("Location:index.php?msg=2");
}
else{

require_once('conf.php');
require_once("dash_header.php");
require_once("a_sidebar.php");
include("header.php"); 
require_once("a_sidebar.php");?>

<!DOCTYPE html>
<html>
<head>
<title>Forgot Password</title>

</head>
<body>
<?php if (isset($_GET['msg']) && $_GET['msg']==7){ ?>
                <p>User Doesn't Exists</p>

                <?php } ?>

<h3 align="center">Forgot Password</h3>
<div><?php if(isset($message)) { echo $message; } ?></div>
<form method="post" action="resetpassword.php" align="center">
Enter your Email:<br>
<input type="email" name="email"><span id="email" class="required"></span>
<br>
<input type="submit">
</form>
<br>
<br>
</body>
</html>
<?php }?>

