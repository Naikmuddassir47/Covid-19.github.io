<?php 

    session_start();

    if( $_SESSION['user_id']=='') {

        header("Location:index.php?msg=2");
    }
    else{

    //Database connectivity
    require_once("conf.php");
    //Header 
    require_once("header.php");
    //Dashboard
    require_once("a_sidebar.php");

    $state = $_POST['state'];

    $select = "SELECT * FROM patient_details where L_del = '' AND state = '$state' ";
    $query = mysqli_query($conn,$select);

?>
<div class="col-10">

    <div class="cat-table p-3">
        
        <table class = "my_style" id="catTable">
            
            <thead class="text-center">
                <th>ID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Date of birth</th>
                <th>Phone number</th>
                <th>Email</th>
                <th>Actions</th>
            </thead>
            
            <tbody>
                <?php 
                    $i= 0; while($res=mysqli_fetch_assoc($query))
                    {
                 ?>
                <tr>
                    <td>
                        <?php echo $res['id'];?>
                    </td>
                    
                    <td>
                        <?php echo $res['first_name'];?>
                    </td>

                    <td>
                        <?php echo $res['last_name'];?>
                    </td>

                    <td>
                        <?php echo $res['date_of_birth'];?>
                    </td>

                    <td>
                        <?php echo $res['mobile'];?>
                    </td>

                    <td>
                        <?php echo $res['email'];?>
                    </td>

                    <td>
                        <button type="button" class="btn btn-primary btn-sm rounded-1" data-toggle="modal" data-target="#patient_image_view<?php echo $res['id']; ?>" title="Image">
                            <i class="fa fa-file-image-o" aria-hidden="true"></i>
                        </button>
                           
                        <button type="button" class="btn btn-success btn-sm rounded-1" data-toggle="modal" data-target="#patient_detailed_view<?php echo $res['id']; ?>" title="View">
                            <i class="fa fa-eye text-white" aria-hidden="true"></i>
                        </button>
                    </td>

                    
                    <!-- Image View Modal -->
                <div class="modal fade bd-example-modal-lg" id="patient_image_view<?php echo $res['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Image of Patient ID : <?php echo $res['id']; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <?php
                                        $id = $res['id'];
                                        $select_image= " SELECT * FROM patient_details WHERE id = '$id' ";
                                        $query_image = mysqli_query($conn,$select_image);
                                        $res_image=mysqli_fetch_assoc($query_image);
                                    ?>

                                    <div style = "text-align:center;">
                                        <!-- <label> Image </label><br> -->
                                        <img src="uploads\<?php echo $res_image['image']; ?>" width="200" height="200">
                                    </div>

                                    <div class="modal-footer">                                          
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Patient Detailed View Modal -->
                <div class="modal fade bd-example-modal-lg" id="patient_detailed_view<?php echo $res['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Details of Patient ID :<?php echo $res['id']; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <?php
                                        $id = $res['id'];
                                        $select_all= " SELECT * FROM patient_details WHERE id = '$id' ";
                                        $query_all = mysqli_query($conn,$select_all);
                                        $res_all=mysqli_fetch_assoc($query_all);
                                    ?>

                                    <form>
                                       
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label> Firstname </label>
                                                    <input type="text" class="form-control"  value="<?php echo  $res_all['first_name']?>" disabled>
                                                </div>

                                                <div class="col-md-4">
                                                    <label> Lastname </label>
                                                    <input type="text" class="form-control"  value="<?php echo $res_all['last_name']?>"disabled>
                                                </div>

                                                <div class="col-md-4">
                                                    <label> Gender </label>
                                                    <input type="text" class="form-control"  value="<?php echo  $res_all['gender']?>" disabled>
                                                </div>
                                            </div>
                                        </div><hr>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label> Date of birth </label>
                                                    <input type="text" class="form-control"  value="<?php echo  $res_all['date_of_birth']?>" disabled>
                                                </div>

                                                <div class="col-md-6">
                                                    <label> Email </label>
                                                    <input type="text" class="form-control"  value="<?php echo $res_all['email']?>"disabled>
                                                </div>

                                                <div class="col-md-3">
                                                    <label> Phone number </label>
                                                    <input type="text" class="form-control"  value="<?php echo $res_all['mobile']?>"disabled>
                                                </div>                                               
                                            </div>
                                        </div><hr>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label> Blood group </label>
                                                    <input type="text" class="form-control"  value="<?php echo $res_all['blood_group']?>"disabled>
                                                </div>

                                                <div class="col-md-4">
                                                    <label> Nationality </label>
                                                    <input type="text" class="form-control"  value="<?php echo $res_all['nationality']?>"disabled>
                                                </div>

                                                <div class="col-md-4">
                                                    <label> Age </label>
                                                    <input type="text" class="form-control"  value="<?php echo  $res_all['age']?>" disabled>
                                                </div>
                                            </div>
                                        </div><hr>

                                        <div class="form-group">
                                            <label> Address </label>
                                            <textarea class="form-control" disabled><?php echo $res_all['address']?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label> State </label>
                                                    <input type="text" class="form-control"  value="<?php echo  $res_all['state']?>" disabled>
                                                </div>

                                                <div class="col-md-4">
                                                    <label> District </label>
                                                    <input type="text" class="form-control"  value="<?php echo $res_all['district']?>"disabled>
                                                </div>

                                                <div class="col-md-4">
                                                    <label> Comorbidity History </label>
                                                    <input type="text" class="form-control"  value="<?php echo $res_all['has_comorbidity']?>"disabled>
                                                </div>
                                            </div>
                                        </div><hr>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label> Test date </label>
                                                    <input type="text" class="form-control"  value="<?php echo  $res_all['date_tested']?>" disabled>
                                                </div>

                                                <div class="col-md-6">
                                                    <label> Test results date </label>
                                                    <input type="text" class="form-control"  value="<?php echo $res_all['test_result_date']?>"disabled>
                                                </div>                                              
                                            </div>
                                        </div><hr>

                                        <div class="modal-footer">                                          
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                    <?php 
                        }
                    ?>
                </tr>

            </tbody>
        </table>
    </div>
<!-- Adds scripts to page -->
<?php require_once("footer.php");}?>