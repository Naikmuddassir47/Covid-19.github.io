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

?>


<div class="col-10">
    <div class="cat-form text-center my-3">
        <form method="post"  action="filter_by_gender_view.php">

            <div class="form-group"><label><span style = "font-family:Open Sans;"> Select Gender </span></label>

                <select name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>&nbsp&nbsp
                &nbsp&nbsp
                <button type="submit" value="submit" class="btn btn-success btn-sm"><i class="fa fa-filter" aria-hidden="true"></i>   Filter</button>
                <div id = "26"></div>
            </div>

        </form>
    </div>

    
<!-- Adds scripts to page -->
<?php require_once("footer.php");} ?>
