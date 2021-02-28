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

$select_state = "SELECT * FROM states ";
$query_state = mysqli_query($conn,$select_state);

?>


<div class="col-10">
    <div class="cat-form text-center my-3">
        <form method="post"  action="filter_by_state_view.php">

            <div class="form-group">
            <label> Select State </label>
                
                <select  name="state" id = "state">                                                 
                     <?php while($states=mysqli_fetch_assoc($query_state)) { ?>
                                                        
                        <option value="<?php echo $states['states_name']?>"><?php echo $states['states_name']?> </option>
                                                
                    <?php } ?>
                </select>&nbsp&nbsp
                &nbsp&nbsp
                <button type="submit" value="submit" class="btn btn-success btn-sm"><i class="fa fa-filter" aria-hidden="true"></i>   Filter</button>
                <div id = "26"></div>
            </div>

        </form>
    </div>

    
<!-- Adds scripts to page -->
<?php require_once("footer.php");} ?>
