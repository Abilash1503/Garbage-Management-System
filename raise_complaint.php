<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
include "dbconnect.php";
$login_username=$_SESSION['login_username'];
$application_request_id=$_GET['application_request_id'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
 
    $service_date=$_POST["service_date"];
	$application_request_id=$_POST["application_request_id"];
    $comment_box=$_POST["comment_box"];

            $sql = "INSERT INTO `raise_complaint`(`application_request_id`,`service_date`, `login_username`,`comment_box`) values('$application_request_id','$service_date' ,'$login_username','$comment_box')";
            
            $result = mysqli_query($conn, $sql);
           
				
            $yesterday = date("Y-m-d", time() - 86400);
			

				

				
            echo 'successfull';
			header('location:view_raise_complaint.php');
            
            
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
					
			
				
				<!--card style ended-->
				<div class="col-lg-8">
					<!--card form-->
					<div class="card"  style="width:95%; background: rgba( 255, 255, 255, 0.25 );box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );backdrop-filter: blur( 4px );
					-webkit-backdrop-filter: blur( 40px );border-radius: 10px;border: 1px solid rgba( 255, 255, 255, 0.18 );" >
					
						
						
						<div class="card-body">
							<form action="raise_complaint.php" method="POST">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">application_request_id</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                <select name="application_request_id" class="form-control" id="application_request_id" required="required">
                                	<?php 
                                    
									$sql_option1="select application_request_id from application_request where login_username='$login_username' and  application_request_id='$application_request_id'";
									$select_sql3 = mysqli_query($conn,$sql_option1);
									while($row2 = mysqli_fetch_assoc($select_sql3)){?>
										 <option value= "<?php echo $row2['application_request_id']?>"><?php echo $row2['application_request_id']?></option>;
									
									<?php
									}
									?>
								
         							</select>
								</div>
							</div>




                            

							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">service date</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="date" class="form-control" name="service_date" id="service_date" value="<?php echo  $service_date = date("Y-m-d", time() - 86400);?>"   readonly>
								</div>
							</div>
							
							
                            
							
                            
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">comment box</h6>
								</div>
							 	<div class="col-sm-9 text-secondary">
                                 <input type="text" class="form-control" name="comment_box" id="comment_box" placeholder="complaint issue" required>
								</div>
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