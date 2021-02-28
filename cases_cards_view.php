<?php
require_once('conf.php');
require_once("header.php");
require_once("a_sidebar.php");

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

<div class="card" style="margin-left:2vw;margin-top:13vh;width:18vw;height:30vh;max-height:400px">
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


<div class="card" style="margin-left:2vw;margin-top:13vh;width:18vw;height:30vh;max-height:400px">
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


<div class="card" style="margin-left:2vw;margin-top:13vh;width:18vw;height:30vh;max-height:400px">
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

<div class="card" style="margin-left:2vw;margin-top:13vh;width:18vw;height:30vh;max-height:400px">
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

<?php require_once("footer.php"); ?>