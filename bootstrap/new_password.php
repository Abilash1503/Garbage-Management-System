<?php
$showAlert = false;
$showError = false;


// if($_SERVER["REQUEST_METHOD"] == "GET"){
include 'dbconnect.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $admin_username=$_POST['admin_username'];
    $password =$_POST["password"];
    $cpassword =$_POST["cpassword"];
// if(!empty($_GET['code']) && isset($_GET['code'])){
//    $code=$_GET['code'];
 
    if(($password == $cpassword)){
       
        $password = password_hash($password,PASSWORD_DEFAULT);
$result_update=mysqli_query($conn,"UPDATE admin SET password='$password' WHERE admin_username='$username' and status=1");

if($result_update){
$showAlert = true;
$showError=false;
header('location:password-reset-sucessfully.html');

    }
}
if($password != $cpassword){
        
    $slowAlert1=false;
$showError= true;
    
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
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css ">
    <link rel="stylesheet" href="style2.css">
    <title>new password</title>
  </head>
  <body  style="background-color:#a8f28a">
   
    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Password updated Sucessfully!!</strong> 
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

    
       
    ?>

    <div class="container my-4">
    <center>
     <h1 class="text-center">Create New  Password</h1>
     <form action="new_password.php" method="post">
     <div class="form-group">
            <label for="username"><b>username</b></label>
            <input type="text"  class="form-control" id="admin_username" name="admin_username"><br>
        </div>
        <div class="form-group">
            <label for="password"><b>Password</b></label>
            <input type="password"  class="form-control" id="password" name="password"><br>
        </div>
        <div class="form-group">
            <label for="cpassword"><b>Confirm Password</b></label>
            <input type="password" class="form-control" id="cpassword" name="cpassword"><br>
            <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
        </div>
         
        <button type="submit" class="btn btn-primary"><b>RESET<b></button>
     </form>
</center>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>