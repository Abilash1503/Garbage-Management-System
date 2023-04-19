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

   $update_disabled="update application_request SET permission=0 where application_request_id='$application_request_id'";


	  $sql3=mysqli_query($conn,$update_disabled);
if($sql3)
	  { 
		  $showAlert=true;
		  header("location:manage_service_request.php");
      
		 
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