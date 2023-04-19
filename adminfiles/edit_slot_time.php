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
    $select_display= "select * from slot_timetable where slot_id='$slot_id'" ;
 $sql2 = mysqli_query($conn,$select_display);
 while($row1 = mysqli_fetch_array($sql2)){
    $slot_id=$row1[0];
    $vehicle_unique_id=$row1[1];
    $day=$row1[2];
    $garbage_type=$row1[3];
 
 }

  
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $slot_id=$_GET['slot_id'];

  
    $start_time=$_POST['start_time'];
    $end_time=$_POST['end_time'];
   $update_student="UPDATE slot_timetable SET start_time='$start_time',end_time='$end_time' where slot_id='$slot_id'";


	  $sql3=mysqli_query($conn,$update_student);
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
}



?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap\css\bootstrap.css">


  </head>
  <body>
   















	
<?php
    

    if($showAlert){
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Student Details Inserted</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> ';
        }
        if($showError){
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Something went Wrong</strong> '. $showError.'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> ';
            }
         
    ?>
    
<br><br><br>

<div class="wrapper">
<?php include 'nav.php';?>

<div class="container">
		<div class="main-body">
			<div class="row">
				<div class="col-lg-8">
					<div class="card" style="box-shadow: 0 0 0px rgb(0 0 0) !important;">
						<div class="card-body">
							<form action="" method="POST">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">vehicle unique id </h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value=<?php echo $vehicle_unique_id?> name="vehicle_unique_id"id="vehicle_unique_id" disabled>
								</div>
		
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Day</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control"   name="day" id="day" placeholder="Monday"   disabled>
								</div>
							</div>

							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Start Time</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="time" class="form-control"   name="start_time" id="start_time" >
								</div>
							</div>

							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">End Time</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="time" class="form-control"   name="end_time" id="end_time" >
								</div>
							</div>
							
                            
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" class="btn btn-primary px-4" value="update changes" >
								</div>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
        </div>

<style type="text/css">
body{
    background: #f7f7ff;
    margin-top:20px;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}
.me-2 {
    margin-right: .5rem!important;
}
</style>

<script type="text/javascript">

</script>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
