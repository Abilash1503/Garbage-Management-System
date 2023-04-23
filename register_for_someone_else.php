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
    $garbage_type = $_POST["garbage_type"];
    $weight=$_POST["weight"];
    $permission=$_POST["permission"];
    $fname=$_POST["fname"];
    $service_date=$_POST["service_date"];
	$route_name=$_POST["route_name"];
	$stop=$_POST["stop"];
    $address=$_POST["address"];
    $state=$_POST["state"];
    $city=$_POST["city"];
    $zip=$_POST["zip"];
    
   

        // $exists = false; 
     
            
        date_default_timezone_set('Asia/Kolkata');
        $service_date = date("Y-m-d", time() + 86400);
            $sql = "INSERT INTO `application_request`(`garbage_type`,`weight`, `login_username`, `permission`, `fname`, `service_date`,`route_name`,`stop`,`address`,`state`,`city`,`zip`) values('$garbage_type','$weight' ,'$login_username', '2', '$fname','$service_date','$route_name','$stop','$address','$state','$city','$zip')";
            
            $result = mysqli_query($conn, $sql);
           
				

			

				

				
            echo 'successfull';
			header('location:Requested_applications_user.php');
            
            
		}
		else{
                echo 'username doesnt exist';
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
					
						
						
						<div class="card-body">
							<form action="view_application_details.php" method="POST">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">garbage type</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                <select name="garbage_type" class="form-control" id="garbage_type" required="required">
                                	<?php 
									$sql_option1="select distinct garbage_type from garbage_category where service_available='available'  ;";
									$select_sql3 = mysqli_query($conn,$sql_option1);
									while($row2 = mysqli_fetch_assoc($select_sql3)){?>
										 <option value= "<?php echo $row2['garbage_type']?>"><?php echo $row2['garbage_type']?></option>;
									
									<?php
									}
									?>
								
         							</select>
								</div>
							</div>

							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">weight</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control"   name="weight" id="weight" placeholder="weight"   required>
								</div>
							</div>



							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">full name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" name="fname" id="fname"  placeholder="enter the name of your friend"  >
								</div>
							</div>

                            

							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">service date</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="date" class="form-control"   name="service_date" id="service_date" value="<?php echo  $service_date = date("Y-m-d", time() + 86400);?>"   readonly>
								</div>
							</div>
							
							
                            
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">route name</h6>
								</div>
							 	<div class="col-sm-9 text-secondary">
                                 <select name="route_name" class="form-control" id="route_name" required="required">
                                	<?php 
									$sql_option3="select distinct route_name from schedule";
									$select_sql5 = mysqli_query($conn,$sql_option3);
									while($row4 = mysqli_fetch_assoc($select_sql5)){
                                        $route_name=$row4['route_name'];
                                       ?>
										 <option value= "<?php  echo $route_name ?>"><?php  echo $route_name; ?></option>;
									
									<?php
									}
									?>
								
         							</select>
								</div>
							</div>
                            
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">stop</h6>
								</div>
							 	<div class="col-sm-9 text-secondary">
                                 <select name="stop" class="form-control" id="stop" required="required">
                                	<?php 
									$sql_option3="select distinct route_name,stop from schedule order by stop";
									$select_sql5 = mysqli_query($conn,$sql_option3);
									while($row4 = mysqli_fetch_assoc($select_sql5)){
                                        $route_name=$row4['route_name'];
                                        $stop=$row4['stop'];?>
										 <option value= "<?php  echo $stop ?>"><?php  echo $route_name.' '.$stop ; ?></option>;
									
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
								<input type="text" class="form-control" value="enter the address" name="address"id="address" required >
								</div>
							</div>
                            
                            
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">State</h6>
								</div>
							<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" placeholder="enter the state" name="state" id="state" required> 
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">City</h6>
								</div>
							<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" placeholder="enter the city" name="city" id="city" required>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">zip</h6>
								</div>
							<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" placeholder="enter the zip" name="zip" id="zip" required>
								</div>
							</div>

                            

             
							
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" class="btn btn-primary px-4" value="send request">
								</div>
							</div>
						</div>
						</form>
                        <p class="text-muted font-size-sm">&nbsp;&nbsp;please enter the full name for the registering person and address</p>
						
						
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