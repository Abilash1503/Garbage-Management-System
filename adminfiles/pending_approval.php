<?php
$showAlert=false;
$showError=false;
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:login.php");
    exit;
}
else{
    include 'dbconnect.php';


    $application_request_id=$_GET['application_request_id'];

   $update_disabled="update application_request  SET permission=1 where application_request_id='$application_request_id'";


	  $sql3=mysqli_query($conn,$update_disabled);
if($sql3)
	  { 
        $select_display7="select  * from application_request,schedule where  application_request.stop=schedule.stop and application_request_id='$application_request_id' and schedule.vehicle_unique_id in (SELECT schedule.vehicle_unique_id from schedule where application_request.stop=schedule.stop and application_request.garbage_type=schedule.garbage_type )" ;
                   $sql2 = mysqli_query($conn,$select_display7);
                   while($row=mysqli_fetch_assoc($sql2)){

                    $application_request_id=$row['application_request_id'];
                    $garbage_type=$row['garbage_type'];
                    $service_date=$row['service_date'];
                    $weight=$row['weight'];  
                    $route_name=$row['route_name'];
                    $stop=$row['stop'];
                    $vehicle_unique_id=$row['vehicle_unique_id'];
                    $permission=$row['permission'];
                    $update_vehicle=" UPDATE application_request SET `vehicle_unique_id`='$vehicle_unique_id' where  application_request_id='$application_request_id'";
                    $sql4=mysqli_query($conn,$update_vehicle);
                
		  $showAlert=true;
		  header("location:manage_service_request.php");
      
		 
	  }
    }
	  else
	  {
		  //$showError=true;
		 
	  }
}



?>

<?php
if($showAlert){
                echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Account Enabled successfully</strong> '. $showAlert.'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> ';
                }
				?>