<?php  

require_once('conf.php');
require_once("header.php");
require_once("a_sidebar.php"); 
?>

<!DOCTYPE html>
<html>
<head>
<title>Password Change</title>

</head>
<body>
<div id="hero_banner">
    
            <!-- form that will be show on the right -->
<div class="container1">
<h4 style="text-align:center;"><span style=" font-family: Open Sans, sans-serif;" >Change Password</span> </h4>
<hr>
<br>
<div><?php if(isset($message)) { echo $message; } ?></div>
<form method="post" action="password_changed.php" align="center">
<?php if (isset($_GET['msg']) && $_GET['msg']==3){ ?>
                <p style = "color:red">New password and Confirm Password Doesn't match</p>

                <?php } ?>

                <?php if (isset($_GET['msg']) && $_GET['msg']==4){ ?>
                <p style = "color:red"> Current Password Not Correct</p>

                <?php } ?>

                <?php if (isset($_GET['msg']) && $_GET['msg']==6){ ?>
                <p style = "color:red"> New Password can not be blank</p>

                <?php } ?>

                <div class="form-group">
                                        <label>Current Password </label>
                                        <input type="password" id="currentPassword" name="currentPassword" value=""  placeholder="" class="input-box">
                                        <div id="divchg1"></div>
                                    </div>

                                    <br>
                                   
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" id="newPassword" name="newPassword" value=""  placeholder="" class="input-box">
                                    </div>

                                    <br>
                                 
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" id="confirmPassword" name="confirmPassword" value=""  placeholder="" class="input-box">
                  
                                        <div id="divchg2"></div>
                                    </div>
<br><br>
<button type="submit" class="submit-button"> Submit </button>
</form>
<br>
</div>

<br>
</body>
</html>
