<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
include "dbconnect.php";
$admin_username=$_SESSION['admin_username'];

$select_display= "select * from admin where admin_username='$admin_username'" ;
$select_sql1 = mysqli_query($conn,$select_display);
while($row1 = mysqli_fetch_array($select_sql1)){
$admin_username=$row1[1];

}


if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    $driver_unique_id = $_POST["driver_unique_id"];
    $driver_name=$_POST["driver_name"];
    $email=$_POST["email"];
    $Mno=$_POST["Mno"];
    $age=$_POST["age"];
    $vehicle_unique_id=$_POST["vehicle_unique_id"];
    $date_of_joining=$_POST["date_of_joining"];
    
   

        // $exists = false; 
     
            
            
            $sql = "INSERT INTO `driver`(`driver_unique_id`, `driver_name`, `email`, `Mno`, `age`,`vehicle_unique_id`,`date_of_joining`) values('$driver_unique_id', '$driver_name', '$email', '$Mno','$age','$vehicle_unique_id','$date_of_joining')";
            
            $result = mysqli_query($conn, $sql);
            if($result){

				$sql_profile ="INSERT INTO driver_admin (`driver_unique_id`,`driver_name`, `email`,`vehicle_unique_id`) SELECT `driver_unique_id`,`driver_name`, `email`,`vehicle_unique_id` from driver WHERE NOT EXISTS (SELECT `driver_unique_id` FROM driver_admin WHERE driver_admin.driver_unique_id= driver.driver_unique_id) LIMIT 1";
				$result = mysqli_query($conn, $sql_profile);
                
            echo 'successfull';
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
					
						<div class="card-body ml-2">
							<div class="d-flex flex-column align-items-center text-left">
								<div class="col-lg-12 mt-5">
								<img src="Admission-open-min.jpg" alt="Admin" class="rounded-circle  bg-transparent" height="200" width="200">
								
							</div>
						</div>
							
							
						</div>
					
				
				<!--card style ended-->
				<div class="col-lg-9 mt-5 pl-5">
					<!--card form-->
					<div class="card"  style="width:95%; background: rgba( 255, 255, 255, 0.25 );box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );backdrop-filter: blur( 4px );
					-webkit-backdrop-filter: blur( 40px );border-radius: 10px;border: 1px solid rgba( 255, 255, 255, 0.18 );" >
					
						
						
						<div class="card-body">
							<form action="add_driver.php" method="POST">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Driver unique id</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" placeholder="driver unique  id" name="driver_unique_id" id="driver_unique_id" required>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control"   name="driver_name" id="driver_name"  placeholder="enter driver name"   required>
								</div>
							</div>

                            

							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="email" class="form-control"   name="email" id="email" placeholder="enter  email"   required>
								</div>
							</div>
							
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Mobile Number</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control"   name="Mno" id="Mno" required>
								</div>
							</div>

                            

                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Age</h6>
								</div>
							 	<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control"   name="age" id="age" required>
								</div>
							</div>
                            

                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Assign truck</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                <select name="vehicle_unique_id" class="form-control" id="vehicle_unique_id" required="required">
                                	<?php 
									$sql_option1="select * from vehicle  where vehicle_available='enabled' order by vehicle_id asc";
									$select_sql3 = mysqli_query($conn,$sql_option1);
									while($row2 = mysqli_fetch_assoc($select_sql3)){?>
										 <option value= "<?php echo $row2['vehicle_unique_id']?>"><?php echo $row2['vehicle_unique_id']?></option>;
									
									<?php
									}
									?>
								
         							</select>
								</div>
							</div>
                            
                            
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Date of Joining</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="date" class="form-control"   name="date_of_joining" id="date_of_joining" required>
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