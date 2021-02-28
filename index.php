<?php include("header.php"); 
require_once('conf.php');

$select_confirmed = " SELECT COUNT(id) AS ConfirmedCount FROM patient_details ";
$query_confirmed = mysqli_query($conn,$select_confirmed);
$res_confirmed = mysqli_fetch_assoc($query_confirmed);

$select_active = " SELECT COUNT(id) AS ActiveCount FROM patient_details WHERE is_active = 'Y' ";
$query_active = mysqli_query($conn,$select_active);
$res_active = mysqli_fetch_assoc($query_active);

$select_recovered = " SELECT COUNT(id) AS RecoveredCount FROM patient_details WHERE is_recovered = 'Y' ";
$query_recovered = mysqli_query($conn,$select_recovered);
$res_recovered = mysqli_fetch_assoc($query_recovered);

$select_dead = " SELECT COUNT(id) AS DeadCount FROM patient_details WHERE is_dead = 'Y' ";
$query_dead = mysqli_query($conn,$select_dead);
$res_dead = mysqli_fetch_assoc($query_dead);

?>

<div class = "row" style = "margin-left:8%;">
<div class="card" style="margin-left:2vw;margin-top:5vh;width:18vw;height:30vh;max-height:400px">
    <div class="card-body" style="padding-left:1vw;"><div class="container" style="padding-left:0px">
        <h5 style="text-align: center; color:red;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp Confirmed Cases</h5>  
        <div style="width:22vw; height:50vh;max-height:300px">     

            <div style = "font-size:50px; text-align:center;">
                <?php echo $res_confirmed['ConfirmedCount']; ?>
            </div>
            
        </div> 
    </div>
</div>
</div>


<div class="card" style="margin-left:2vw;margin-top:5vh;width:18vw;height:30vh;max-height:400px">
    <div class="card-body" style="padding-left:1vw;"><div class="container" style="padding-left:0px;">
        <h5 style="text-align: center; color:blue;"><i class="fa fa-shield" aria-hidden="true"></i>&nbsp Active Cases</h5>  
        <div style="width:22vw; height:50vh;max-height:300px" >   

            <div style = "font-size:50px; text-align:center;">
                <?php echo $res_active['ActiveCount']; ?>
            </div>    
            
        </div> 
    </div>
</div>
</div>


<div class="card" style="margin-left:2vw;margin-top:5vh;width:18vw;height:30vh;max-height:400px">
    <div class="card-body" style="padding-left:1vw;"><div class="container" style="padding-left:0px;">
        <h5 style="text-align: center; color:green;"><i class="fa fa-heartbeat" aria-hidden="true"></i>&nbsp Recovered Cases</h5>  
        <div style="width:22vw; height:50vh;max-height:300px">  

            <div style = "font-size:50px; text-align:center;">
                <?php echo $res_recovered['RecoveredCount']; ?>
            </div>     
            
        </div> 
    </div>
</div>
</div>

<div class="card" style="margin-left:2vw;margin-top:5vh;width:18vw;height:30vh;max-height:400px">
    <div class="card-body" style="padding-left:1vw;"><div class="container" style="padding-left:0px">
        <h5 style="text-align: center; color:grey;"><i class="fa fa-ambulance" aria-hidden="true"></i>&nbsp Deceased Cases</h5>  
        <div style="width:22vw; height:50vh;max-height:300px">   

            <div style = "font-size:50px; text-align:center;">
                <?php echo $res_dead['DeadCount']; ?>
            </div>    
            
        </div> 
    </div>
</div>
</div>
</div>



<div id="hero_banner">
    <div class="background-content row">
        <div class="reg_form text-center px-2 col-5">
            <!-- form that will be show on the right -->

            <h3 class="" style="
                    font-size: 30px; 
                    ">
                    <span style=" font-family: Open Sans, sans-serif;" >Login</span> 
                <div class="logo">
                          
                    <h1>Covid-19 Patient Management</h1>                                          
                </div>
            </h3>
            <form method="POST" onsubmit = "return LoginValidation()" action="login_check.php">
            <?php if (isset($_GET['msg']) && $_GET['msg']==1){ ?>
                <p><span style=" font-family: Abel, sans-serif; color:red" > Invalid Password</span></p>
                <?php } ?>

                <?php if (isset($_GET['msg']) && $_GET['msg']==2){ ?>
                <p><span style=" font-family: Abel, sans-serif; color:red" > Invalid Email ID</span></p>
                <?php } ?>
            
                <div class="form-group col-9 mx-auto py-2">
                    <label for="usernameofEmployee"><span style=" font-family: Open Sans, sans-serif;" >Email </span></label>
                    <input style="width:13vw; box-sizing: border-box;" type="text" id = "loginemail" name="u_email" value=""  placeholder="Email" class="input-box">
                    <div id = "emaildiv"></div>
                </div>

                <div class="form-group  col-9 mx-auto py-2">
                    <label for="passwordofEmployee"><span style=" font-family: Open Sans, sans-serif;" >Password </span></label>
                    
                    <input style="width:13vw;" type="password" id = "loginpass" name="u_pass" value=""  placeholder="Password" class="input-box">
                    <div id = "passdiv"></div>
                </div>
                <button  type="submit" class="submit-button"><i class="fa fa-sign-in" aria-hidden="true"></i><span style=" font-family: Open Sans, sans-serif;" >  Login</span> </button><br><br>
                <div class="text-center"><span style=" font-family: Open Sans, sans-serif;" >New User ? </span>
                <a href="registration_form.php"><span style=" font-family: Open Sans, sans-serif;" >Register Here</span></a></div>

            </form>



        </div>

    </div>

</div>

</div>

</body>

</html>
