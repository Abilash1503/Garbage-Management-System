<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    $driver_unique_id = $_POST["driver_unique_id"];
    $password = $_POST["password"]; 




    $sql = "Select * from driver_admin where  driver_unique_id='$driver_unique_id' and verification_status=1 ";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($password, $row['password'])){ 
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['driver_unique_id'] = $driver_unique_id;
                $login = true;
                header("location: view_task.php");

            } 
            else{
                $showError = "Invalid Credentials";
            }
        }

    } 
    else{
		$sql2 = "Select * from driver_admin where  driver_unique_id='$driver_unique_id' AND verification_status=0";
		$result2 = mysqli_query($conn, $sql2);
		$num2 = mysqli_num_rows($result2);
		if($num2==1){
         $showError = "Account not verified yet";
		}
         $showError = "Account not verified yet";

    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>GMS Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</head>


<?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }


    ?>


<body class="mt-5 pt-5 pl-3" style="background-color:#a8f28a">
<!--card started outer 1-->
<div class="card col-lg-11   pb-5 " style="width:95%; background: rgba( 255, 255, 255, 0.25 );box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );backdrop-filter: blur( 4px );
-webkit-backdrop-filter: blur( 40px );border-radius: 10px;border: 1px solid rgba( 255, 255, 255, 0.18 );" >
	<!--container start-->
	<div class="container ">
		<div class="main-body">
			<div class="row">

					<!--card image card -->

						<div class="card-body ml-2">
							<div class="d-flex flex-column align-items-center text-left">
								<div class="col-lg-12 mt-5">
								<img src="logo.jpg" alt="Admin" class="rounded-circle  bg-transparent" height="200" width="200">

							</div>
						</div>


			</div>


				<!--card style ended-->
				<div class="col-lg-9 mt-5 pl-5">
					<!--card form-->
					<div class="card"  style="width:95%; background: rgba( 255, 255, 255, 0.25 );box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );backdrop-filter: blur( 4px );
					-webkit-backdrop-filter: blur( 40px );border-radius: 10px;border: 1px solid rgba( 255, 255, 255, 0.18 );" >



						<div class="card-body">
							<form action="login.php" method="POST">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">driver_unique_id</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="driver-001" name="driver_unique_id" id="driver_unique_id">
								</div>
							</div>


							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">password</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="password" id="password">
								</div>
							</div>


							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" class="btn btn-primary px-4" value="login">
								</div>
							</div>
						</div>
						</form>
						<div class="text-center"><a href="pass1.php">Forgot password?</a></div>
					</div>

				</div>
			</div>
			<!--row ended-->
		</div>
	</div>

</div>
<br><br>


<style type="text/css">
body{

    margin-top:20px;
}


</style>

<script type="text/javascript">

</script>
</body>
</html>
