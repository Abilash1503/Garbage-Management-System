<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
include "dbconnect.php";
$login_username=$_SESSION['login_username'];
$application_request_id=$_GET['application_request_id'];

$select_display= "select * from users where login_username='$login_username'" ;
$select_sql1 = mysqli_query($conn,$select_display);
while($row1 = mysqli_fetch_array($select_sql1)){
$login_username=$row1[2];

}
$select_profile= "select login_username,email,Mno,fname,address,state,city,zip from profile where login_username='$login_username'" ;
 $sql_profile = mysqli_query($conn,$select_profile);
 while($row2 = mysqli_fetch_array($sql_profile)){
  
 $email=$row2[1];
 $Mno=$row2[2];
 $fname=$row2[3];
 $address=$row2[4];
 $state=$row2[5];
 $city=$row2[6];
 $zip=$row2[7];
 }


if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    $vehicle_unique_id = $_POST["vehicle_unique_id"];
    $slot_time = $_POST["slot"];
   
    
   

        // $exists = false; 
     
            
        date_default_timezone_set('Asia/Kolkata');
        $service_date = date("Y-m-d", time() + 86400);
            $sql = "UPDATE application_request set application_request.vehicle_request_id=schedule.vehicle_request_id where application_request.application_request_id='$application_request_id' and application_request.stop=schedule.stop and application_request.garbage_type=schedule.garbage_type";
            
            $result = mysqli_query($conn, $sql);
            if($result){
				
			

			
                
            echo 'successfull';
			header('location:Requested_applications_user.php');
            }
            else{
                echo 'username doesnt exist';
            }
			     
   

}
    
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<!-- fontawesome icons
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src="https://kit.fontawesome.com/2715ab056d.js" crossorigin="anonymous"></script>

</head>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>

<body>

<div class="wrapper">
<?php include 'nav.php';?>

        
	<!--container start-->
<div class="container ">
		<div class="main-body">
			<div class="row">
				
					<!--card image card -->
					
					<div class="col-lg-4">
					<div class="card" style="width:95%; background: rgba( 255, 255, 255, 0.25 );box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );backdrop-filter: blur( 4px );
-webkit-backdrop-filter: blur( 40px );border-radius: 10px;border: 1px solid rgba( 255, 255, 255, 0.18 );">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
								<div class="mt-3">
		
									 <h4>time details</h4>
									<p class="text-secondary mb-1">vehicle details</p>
								<p class="text-muted font-size-sm">will be shared to you once the application will be approved</p>
				
									
								</div>
							</div>
							
						</div>
					</div>
</div>
					
				
				<!--card style ended-->
				<div class="col-lg-8">
					<!--card form-->
					<div class="card"  style="width:95%; background: rgba( 255, 255, 255, 0.25 );box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );backdrop-filter: blur( 4px );
					-webkit-backdrop-filter: blur( 40px );border-radius: 10px;border: 1px solid rgba( 255, 255, 255, 0.18 );" >
					
						
						
						
						

							
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">vehicle request id</h6>
								</div>
							 	<div class="col-sm-9 text-secondary">
                                 <select name="route_name" class="form-control" id="route_name" required="required">
                                	<?php 
									$sql_option3="select distinct route_name,stop from schedule order by stop";
									$select_sql5 = mysqli_query($conn,$sql_option3);
									while($row4 = mysqli_fetch_assoc($select_sql5)){
                                        $route_name=$row4['route_name'];
                                        $stop=$row4['stop'];?>
										 <option value= "<?php  echo $route_name.' '.$stop ?>"><?php  echo $route_name.' '.$stop ; ?></option>;
									
									<?php
									}
									?>
								
         							</select>
								</div>
							</div>
                            

                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">address</h6>
								</div>
								<div class="col-sm-9 text-secondary">
								<input type="text" class="form-control" value="<?php echo $address?>" name="address"id="address" >
								</div>
							</div>
                            
                            
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">State</h6>
								</div>
							<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $state?>" name="state" id="state" required> 
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">City</h6>
								</div>
							<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $city?>" name="city" id="city" required>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">zip</h6>
								</div>
							<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $zip?>" name="zip" id="zip" required>
								</div>
							</div>

                            

             
							
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" class="btn btn-primary px-4" value="add driver">
								</div>
							</div>
						</div>
						</form>
						
					</div>
					
				</div>
			</div>
			<!--row ended-->
		</div>
	</div>

</div>
<br><br>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

 
</body>

</html>