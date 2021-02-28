<?php include("header.php"); ?>


<div id="hero_banner">
    <div class="background-content row">
        <div class="reg_form text-center px-2 col-5" >
            <!-- form that will be show on the right -->

            <h3 class="" style="font-size: 30px;">
                <span style=" font-family: Open Sans, sans-serif;" >Register</span> 
                <div class="logo">
                         
                    <h1>Covid-19 Patient Management</h1>                                               
                </div>
            </h3>

            <form method="POST" onsubmit = "return RegistrationValidation()" action="add_registered_user.php">

                <?php if (isset($_GET['msg']) && $_GET['msg']==20){ ?>
                <p><span style=" font-family: Open Sans, sans-serif; color:red" >Email ID Already Exists</span></p>
                <?php } ?>

                <?php if (isset($_GET['msg']) && $_GET['msg']==21){ ?>
                <p><span style=" font-family: Kufam, sans-serif; color:red" > Passwords doesn't match.</span></p>
                <?php } ?>
                

                <div class="form-group col-9 mx-auto py-2">
                    <label for="usernameofEmployee"><span style=" font-family: Open Sans, sans-serif;" >Email </span></label>
                    <input style = "width:50%" type="text" id = "regemail" name="u_email" value=""  placeholder="Email" class="input-box">
                    <div id = "emaildivreg"></div>
                </div>

                <div class="form-group  col-9 mx-auto py-2">
                    <label for="passwordofEmployee"><span style=" font-family: Open Sans, sans-serif;" >Password </span></label>
                    <input style = "width:50%" type="password" id = "regpass" name="u_pass" value=""  placeholder="Password" class="input-box">
                    <div id = "passdivreg"></div>
                </div>

                <div class="form-group  col-9 mx-auto py-2">
                    <label for="passwordofEmployee"><span style=" font-family: Open Sans, sans-serif;" >Confirm Password </span></label>
                    <input style = "width:50%" type="password" id = "regrepass" name="u_re_pass" value=""  placeholder="Re-Type Password" class="input-box">
                    <div id = "passdivreg1"></div>
                </div>

                <button type="submit" class="submit-button"><i class="fa fa-user-plus" aria-hidden="true"></i><span style=" font-family: Open Sans, sans-serif;" >  Register</span> </button><br><br>
                <div class="text-center"><span style=" font-family: Open Sans, sans-serif;" >Already Registered ? </span>
                <a href="index.php"><span style=" font-family: Open Sans, sans-serif;" >Login Here</span></a></div>
            </form>

        </div>

    </div>

</div>