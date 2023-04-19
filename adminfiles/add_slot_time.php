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
 $admin_username=$row1[5];
 }

 if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    
	$vehicle_unique_id = $_POST["vehicle_unique_id"];
	
  
    $day=$_POST["day"];
    $start_time=$_POST["start_time"];
    $end_time=$_POST["end_time"];
	
   

        // $exists = false; 
     
		
            
            
            $sql = "INSERT INTO `slot_timetable`( `vehicle_unique_id`, `day`, `start_time`, `end_time`) VALUES ('$vehicle_unique_id','$day','$start_time','$end_time')";
            
            $result = mysqli_query($conn, $sql);
            if($result){
				$select_garbage_type= "select * from vehicle where vehicle_unique_id='$vehicle_unique_id'";
				$result4 = mysqli_query($conn, $select_garbage_type);
				while($row5=mysqli_fetch_assoc($result4)){
       
        
					$garbage_type=$row5['garbage_type'];
					$vehicle_unique_id=$row5['vehicle_unique_id'];
				}
			

				$sql_update = "UPDATE `slot_timetable` SET `garbage_type`='$garbage_type'  WHERE `vehicle_unique_id`='$vehicle_unique_id'";
            
				$result = mysqli_query($conn, $sql_update);
                
            echo 'successfull';
            }
            else{
                echo 'username doesnt exist';
            }
			     
   

}
?>




<!DOCTYPE html>
<html>



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
							<form action="add_slot_time.php" method="POST">


							
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Vehicle Unique id Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
      								<select name="vehicle_unique_id" class="form-control" id="vehicle_unique_id" required="required">
                                	<?php 
									$sql_option1="select * from vehicle where vehicle_available='enabled' order by vehicle_id";
									$select_sql3 = mysqli_query($conn,$sql_option1);
									while($row2 = mysqli_fetch_assoc($select_sql3)){?>
										 <option value= "<?php echo $row2['vehicle_unique_id']?>"><?php echo $row2['vehicle_unique_id']?></option>;
									
									<?php
									}
									?>
								
         							</select>
           
								</div>
							</div>
							<!---->
							
							<!---->

							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Day</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control"   name="day" id="day" placeholder="Monday"   required>
								</div>
							</div>

							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Start Time</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="time" class="form-control"   name="start_time" id="start_time" required>
								</div>
							</div>

							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">End Time</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="time" class="form-control"   name="end_time" id="end_time" required>
								</div>
							</div>



							<!---->
							
							
						
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" class="btn btn-primary px-4" value="Add time slot">
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
</div>


        
	

   
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    
 
</body>

</html>