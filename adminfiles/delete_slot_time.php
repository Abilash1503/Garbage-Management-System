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


    $slot_id=$_GET['slot_id'];

   $delete_student="delete from slot_timetable  where slot_id='$slot_id'";


	  $sql3=mysqli_query($conn,$delete_student);
if($sql3)
	  { 
		  $showAlert=true;
      header('location:manage_slot_time.php');
		 
	  }
	  else
	  {
		  //$showError=true;
		 
	  }
}



?>