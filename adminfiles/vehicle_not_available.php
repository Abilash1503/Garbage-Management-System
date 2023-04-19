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


    $vehicle_unique_id=$_GET['vehicle_unique_id'];

   $update_disabled="update vehicle  SET vehicle_available= 'enabled' where vehicle_unique_id='$vehicle_unique_id'";


	  $sql3=mysqli_query($conn,$update_disabled);
if($sql3)
	  { 
		  $showAlert=true;
		  header("location:manage_vehicle.php");
      
		 
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