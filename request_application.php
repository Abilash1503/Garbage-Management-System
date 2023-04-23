<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
include "dbconnect.php";
$login_username=$_SESSION['login_username'];

$select_display= "select * from users where login_username='$login_username'" ;
$select_sql1 = mysqli_query($conn,$select_display);
while($row1 = mysqli_fetch_array($select_sql1)){
$login_username=$row1[2];

}



    $service_id=$_GET['service_id'];
    $select_service_display= "select * from services where service_id='$service_id'" ;
    $sql1 = mysqli_query($conn,$select_service_display);
    while($row=mysqli_fetch_assoc($sql1)){
       
    $admin_username=$row['admin_username'];
     $service_name=$row['service_name'];
                                                         


}
date_default_timezone_set('Asia/Kolkata');
            $timestamp = date("Y-m-d H:i:s");
     
    $service_request_query = "INSERT INTO `application_request` ( `service_name`,`admin_username`,`login_username`,`permission`) VALUES ('$service_name','$admin_username','$login_username','2') limit 1,1";
    $result = mysqli_query($conn, $service_request_query);


	
if($result)
	  { 
        $showAlert=true;
        header('location:Requested_applications_user.php');
        
	  }
	  else
	  {
		  //$showError=true;
		 
	  }




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>profile </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<?php 
if($showAlert){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Service sent for approval</strong> '. $showAlert.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>
    </html>

