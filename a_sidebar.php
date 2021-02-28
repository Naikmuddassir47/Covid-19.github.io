<!DOCTYPE html>  
<html>  
<head>  
<style>  
.error {color: #FF0001;}  
</style>  
</head>  
<body>   


<?php 


include("header.php"); 
  

$select_state = "SELECT * FROM states ";
$query_state = mysqli_query($conn,$select_state);

?>


<div id="nav_bar">
    <div class="container-fluid p-0">
        <div class="row justify-content-between position-relative p-0 no-gutters" id="border-style">
            <div class="col-md-3">
                
                    <a href="admin.php"><div style = "color:black; font-size:150%; margin-top:4%; font-family:Aldrich; text-align:center;">Covid-19 Patient Management</div></a>
                
            </div>
            <div class="col-md-6">
                <div class="login-form  p-2 text-right" style = "margin-top:1%;">                    
                    <a href="logout.php" > <button type="submit" title="Logout" class="submit-button"><i class="fa fa-power-off" aria-hidden="true"></i> </button></a>
                    <a href="changepassword.php"><button type="submit" title="Change Password" class="submit-button"><i class="fa fa-key" aria-hidden="true"></i> </button></a>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="container-fluid p-0">
    <div class="row no-gutters p-0">
        <div class="col-2 p-0 emp_style">
            <br>

            <ul class="emp_nav" style="">


                <li class="side-menu ml-1 dropdown">
                    <span class="fa fa-wheelchair p-2 icon-color"></span><a data-toggle="collapse" href="#assets_av" role="button" aria-controls="assets_av" class="link-menu"><span style=" font-family: Open Sans, sans-serif;">Patient</span></a>

                    <ul class="emp_nav ml-3 collapse" id="assets_av">
                        <li class="link">
                            <span class="fa fa-plus p-2 icon-color"></span><a href="#add_patient_form" class="link-menu" data-toggle="modal" role="button"><span style=" font-family: Open Sans, sans-serif;">Add</span></a>
                        </li>
                        <li>
                            <span class="fa fa-eye p-1 icon-color"></span> <a href="patient_view.php" class="link-menu"><span style=" font-family: Open Sans, sans-serif;">View All Patients</span></a>
                        </li>
                        <li>
                            <span class="fa fa-heartbeat p-1 icon-color"></span> <a href="recovered_patient_view.php" class="link-menu"><span style=" font-family: Open Sans, sans-serif;">View Recovered Patients</span></a>
                        </li>
                        <li>
                            <span class="fa fa-ambulance p-1 icon-color"></span> <a href="dead_patient_view.php" class="link-menu"><span style=" font-family: Open Sans, sans-serif;">View Deceased Patients</span></a>
                        </li>
                    </ul>
                </li>

               

                <li class="side-menu ml-1 dropdown">
                    <span class="fa fa-refresh p-2 icon-color"></span><a data-toggle="collapse" href="#assets_av1" role="button" aria-controls="assets_av" class="link-menu"><span style=" font-family: Open Sans, sans-serif;">Change Status</a>

                    <ul class="emp_nav ml-3 collapse" id="assets_av1">
                        <li class="link">
                            <span class="fa fa-heartbeat p-2 icon-color"></span><a href="patient_recovered.php" class="link-menu" ><span style=" font-family: Open Sans, sans-serif;">Patient Recovered</a>
                        </li>
                        <li>
                            <span class="fa fa-ambulance p-1 icon-color"></span> <a href="patient_dead.php" class="link-menu"><span style=" font-family: Open Sans, sans-serif;">Patient Deceased</a>
                        </li>
                    </ul>
                </li>


                <li class="side-menu ml-1 dropdown">
                    <span class="fa fa-filter p-2 icon-color"></span><a data-toggle="collapse" href="#assets_av2" role="button" aria-controls="assets_av" class="link-menu"><span style=" font-family: Open Sans, sans-serif;">Filter By</a>

                    <ul class="emp_nav ml-3 collapse" id="assets_av2">
                        
                        <li>
                            <span class="fa fa-venus-mars p-1 icon-color"></span> <a href="filter_by_gender.php" class="link-menu"><span style=" font-family: Open Sans, sans-serif;">Gender</a>
                        </li>
                        <li>
                            <span class="fa fa-globe p-1 icon-color"></span> <a href="filter_by_state.php" class="link-menu"><span style=" font-family: Open Sans, sans-serif;">State</a>
                        </li>
                        
                    </ul>
                </li>

            </ul>
            


        </div>
 
        <!-- change password modal  -->

        <div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body"> 
                                <form method="post" action="password_changed.php" id="log" enctype="multipart/form-data">
                                        <?php if (isset($_GET['msg']) && $_GET['msg']==3){ ?>
                                                <p>New password and Confirm Password Doesn't match</p>

                                         <?php } ?>

                                        <?php if (isset($_GET['msg']) && $_GET['msg']==4){ ?>
                                                <p> Current Password Not Correct</p>

                                        <?php } ?>

                                    <div class="form-group">
                                        <label>Current Password</label>
                                        <input type="password"  class="form-control" name="currentPassword" required><span id="currentPassword" class="required"></span>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password"  class="form-control" name="newPassword" required><span id="newPassword" class="required"></span>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password"  class="form-control" name="confirmPassword" required><span id="confirmPassword" class="required"></span>
                                    </div>
                                           
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure, you want to change password ?')">Submit</button>
                                    </div>

                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>



            <!-- Add Patient Modal-->

            <div class="modal fade bd-example-modal-lg" id="add_patient_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document" >
                    <div class="modal-content" >
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" >Add Patient</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row justify-content-center my-2">
                                    <div class="product_style col-12">

                                        <form method="post"  action="patient_add.php" id="log" enctype="multipart/form-data" >
                                                                                                                                  
                                            <div class="form-group">
                                                <div class = "row">
                                                    <div class="col-md-4">
                                                        <label>Firstname</label>                                                
                                                        <input type="text" class="form-control" id="firstname" value="" name="firstname" placeholder="">
                                                        <div id="div1"></div>
                                                    </div>
                                                    
                                                    <div class="col-md-4">
                                                        <label> Lastname </label>
                                                        <input type="text"  class="form-control" id="lastname" value="" name="lastname" placeholder="">
                                                        <div id="div2"></div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label> Gender </label>
                                                        <select class="form-control" name="gender" id = "gender">                                                 
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class=" form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label> Date of birth </label>
                                                        <input type="date" class="form-control" id="dob" value="" name="dateofbirth" placeholder="Date of Birth">
                                                        <div id="div3"></div>
                                                    </div>

                                                    <div class="col-md-4">                                               
                                                        <label> Email </label>
                                                        <input type="text" class="form-control" id="email" value="" name="email" placeholder="">
                                                        <div id="div5"></div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label> Phone number </label>
                                                        <input type="text" class="form-control"  id = "phonenumber" value="" name="mobile" placeholder="">
                                                        <div id="div4"></div>
                                                    </div>                                                        
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class = "row">
                                                    <div class="col-md-4">
                                                        <label> Blood group </label>
                                                        <input type="text" class="form-control" id="bloodgroup" value="" name="bloodgroup" placeholder="">
                                                        <div id="div8"></div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label> Nationality </label>
                                                        <input type="text" class="form-control" id="nationality" value="" name="nationality" placeholder="">
                                                        <div id="div6"></div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label> Age </label>
                                                        <input type="text" class="form-control" id="age" value="" name="age" placeholder="">
                                                        <div id="div6"></div>
                                                    </div>
                                                </div>
                                            </div><hr>
                                                   
                                            <div class="form-group">
                                                <div class = "row">
                                                    <div class="col-md-12">
                                                        <label> Address </label>
                                                        <textarea name="address" class="form-control" id="address" placeholder="" ></textarea>
                                                        <div id="div7"></div>
                                                    </div>
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <div class = "row">
                                                    <div class="col-md-4">
                                                    <label> State </label>
                                                        <select class="form-control" name="state" id = "state">                                                 
                                                            <?php while($states=mysqli_fetch_assoc($query_state)) { ?>
                                                        
                                                                <option value="<?php echo $states['states_name']?>"><?php echo $states['states_name']?> </option>
                                                
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label> District </label>
                                                        <input type="text" class="form-control" id="nationality" value="" name="district" placeholder="">
                                                        <div id="div6"></div>
                                                    </div>

                                                    <div class="col-md-4">
                                                    <label> Has Comorbidity </label>
                                                        <select class="form-control" name="comorbidity" id = "comorbidity">                                                 
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                        <div id="div6"></div>
                                                    </div>
                                                </div>
                                            </div>                              

                                            <div class="form-group">
                                                <div class = "row">
                                                    <div class="col-md-4 ">
                                                        <label> Test date </label>
                                                        <input type="date" class="form-control" id="testdate" value="" name="dateoftest" placeholder="Date of Joining">
                                                        <div id="div10"></div>
                                                    </div>

                                                    <div class="col-md-4 ">
                                                        <label> Test results date </label>
                                                        <input type="date" class="form-control" id="testresultdate" value="" name="dateoftestresults" placeholder="Date of Joining">
                                                        <div id="div10"></div>
                                                    </div>

                                                    <div class="col-md-4 ">
                                                        <label> Picture </label>
                                                        <input type="file" name="uploadfile" id="uploadfile">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success"><i class="fa fa-plus-square" aria-hidden="true"></i>   Add</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php include("footer.php");?>