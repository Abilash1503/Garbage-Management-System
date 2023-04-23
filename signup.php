<?php


$showAlert = false;
$showError = false;
$showAlert1 = false;
$showError1 = false;
$showError2 = false;
$showError3 = false;
$showError4 = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
	$fname = $_POST["fname"];
    $login_username = $_POST["login_username"];
    $email=$_POST["email"];
    $Mno=$_POST["Mno"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    // $exists=false;

    //Check whether this email exists
    $sql_email = "SELECT * FROM `users` WHERE email = '$email'";
    $sql_login_username = "SELECT * FROM `users` WHERE login_username = '$login_username'";
    $sql_Mno = "SELECT * FROM `users` WHERE email = '$Mno'";
    $result_email=mysqli_query($conn, $sql_email) or die (mysqli_error($conn));
    $result_login_username=mysqli_query($conn, $sql_login_username) or die (mysqli_error($conn));
    $result_Mno=mysqli_query($conn, $sql_Mno) or die (mysqli_error($conn));
    $numExistRows = mysqli_num_rows($result_login_username);
    $numExistRows1 = mysqli_num_rows($result_email);
    $numExistRows2 = mysqli_num_rows($result_Mno);

 
    
    if($numExistRows > 0){
        // $exists = true;
        $showError2 = true;
    }
    else if($numExistRows1 > 0){
        // $exists = true;
        $showError3 = true;
    }
    else if($numExistRows2 > 0){
        // $exists = true;
        $showError = true;
    }
    else{
        // $exists = false; 
        if(($password == $cpassword)){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $token= bin2hex(random_bytes(15));
            date_default_timezone_set('Asia/Kolkata');
            $timestamp = date("Y-m-d H:i:s");
            
            $sql = "INSERT INTO `users` ( `fname`,`login_username`, `email`,`Mno`,`password`, `create_account_time`,`token`) VALUES ('$fname','$login_username','$email','$Mno','$hash', '$timestamp','$token')";
            $result = mysqli_query($conn, $sql);
                 if ($result){
             
                

                    $sql_profile ="INSERT INTO profile (`login_username`,`fname`, `email`,`Mno`) SELECT `login_username`,`fname`,`email`,`Mno` from users WHERE NOT EXISTS (SELECT `login_username` FROM profile WHERE profile.login_username= users.login_username) LIMIT 1";
                    $result = mysqli_query($conn, $sql_profile);
                    $showAlert = true;


            }
        }
       
    if($password != $cpassword){
        
        $slowAlert1=false;
    $showError= true;
        
}
else{
    $headers = 'From:support@smilewellnessfoundation.org' ."\r\n" .
'reply-to:smilewellnessfoundation@gmail.com'. "\r\n" .
'X-Mailer: PHP/' . phpversion();
$to = "$email";
$sub = "Email Verification ";
$msg="
     thank you for signing up on our website.
     please click on the verification link below to verify your email
      http://www.smilewellnessfoundation.org/activate.php?token=$token";
if (mail($to,$sub,$msg,$headers)){
  //echo "Your Mail is sent successfully.";
  $showAlert1 = true;
  header('location:login.php');
}
else{
  //echo "Your Mail is not sent. Try Again.";
  $showError1 = true;
}
//     $slowAlert1=false;
//     $showError1 = false;
// }
}
       
}
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
   
    <title>user Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="mt-5 pt-5 pl-3" style="background-color:#a8f28a">

<?php
     
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success! Account created Sucessfully</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>password dont match</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }

    if($showAlert1){
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Email send succesfully!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> ';
        }
        if($showError1){
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Verification mail not send please check your email id!!</strong> '. $showError1.'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> ';
            }
            if($showError2){
                echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>login_username already taken</strong> '. $showError2.'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> ';
                }
                if($showError3){
                    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>email already exist</strong> '. $showError3.'
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> ';
                    }
                    if($showError4){
                        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>phone number already exist</strong> '. $showError3.'
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div> ';
                        }
    ?>
<!--card started outer 1-->
<div class="card col-lg-11   pb-5 " style="width:95%;background-color:#a8f28a;box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );backdrop-filter: blur( 4px );
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
							<form action="signup.php" method="POST">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Full Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control"  name="fname" id="fname">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">login_username</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control"   name="login_username" id="login_username"   required>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="email" class="form-control" name="email" id="email" paceholder="example@gmail.com">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Mobile Number</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="Mno" id="Mno" >
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">password</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="password" class="form-control" name="password" id="password" >
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">confirm password</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="password" class="form-control" name="cpassword" id="cpassword" >
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" class="btn btn-primary px-4" value="Sign Up">
								</div>
							</div>
						</div>
						</form>
						<p class = "text-center">Already Have An Account?? <a href="login.php">login Here</a></p>
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