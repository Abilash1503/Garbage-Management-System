<?php
 session_start();

$showAlert=false;
$showError=false;

 if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
     header("location:login.php");
     exit;
 }
 else{
    
 include "dbconnect.php";
 $application_request_id=$_GET['application_request_id'];
 $admin_username=$_SESSION['admin_username'];
 


 $select_display= "select * from admin where admin_username='$admin_username'" ;
 $select_sql1 = mysqli_query($conn,$select_display);
 while($row1 = mysqli_fetch_array($select_sql1)){
 $admin_username=$row1[1];
 
 }

 $select_display3= "select * from application_request where application_request_id='$application_request_id'" ;
 $select_sql3 = mysqli_query($conn,$select_display3);
 while($row4 = mysqli_fetch_array($select_sql3)){
 $application_request_id=$row4[0];
 
 }



 
 }
 

?>

	

<!DOCTYPE html>
<html lang="en">

<body>



    

    
    
<br><br><br>
<div class="wrapper">
<?php include 'nav.php';?>



    <div class="container">
		<div class="main-body">
            <!--list product-->

			<div class="row">
                <!--fetch product-->
                <?php



                                $select_display1="select *  from application_request LEFT JOIN users ON application_request.login_username = users.login_username where application_request.application_request_id='$application_request_id' and application_request.application_request_id='$application_request_id'" ;
                                               $sql1 = mysqli_query($conn,$select_display1);
                                               $numExistRows = mysqli_num_rows($sql1);
                                               if($numExistRows<0){
                                                echo "no active user is there";
                                               }
                                               else{
                                               while($row=mysqli_fetch_assoc($sql1)){
                                                $application_request_id=$row['application_request_id'];
                                                $service_date=$row['service_date'];
                                                $login_username=$row['login_username'];
                                                $permission=$row['permission'];
                                                $fname=$row['fname'];
                                                $Mno=$row['Mno'];
                                                $stop=$row['stop'];
                                                $vehicle_unique_id=$row['vehicle_unique_id'];
                                                
                                                if($permission==0){
                                                    $permission='not approved yet';
                                                }
                                                else if($permission==1){

                                                    $permission='approved';
                                                }
                                                else{
                                                    $permission='Pending';
                                                }
                                                     

                                                       
                               
                               
                
                        
                        echo "<div class='col-lg-6'>
                    
                        <div class='card' style='box-shadow: 0 0 0px rgb(0 0 0) !important;'>
                            <div class='card-body'>
                                <div class='d-flex flex-column align-items-center text-center'>
                                    <img src='https://bootdey.com/img/Content/avatar/avatar6.png' alt='Admin' class='rounded-circle p-1 bg-primary' width='110'>
                                    <div class='mt-3'>
                                    <table>
                                    <tr>
                                    <th>application_request Id:</th> 
                                    <td>$application_request_id</td>
                                    
                                </tr>
                                <tr>
                                    <th>service date:</th> 
                                    <td>$service_date</td>
                                    
                                </tr>
                                <tr>
                                <th>stop:</th> 
                                <td>$stop</td>
                                </tr>
                                <tr>
                                <th>vehicle :</th> 
                                <td>$vehicle_unique_id</td>
                                </tr>
                                <tr>
                                    <th>username:</th> 
                                    <td>$login_username</td>
                                </tr>

                                <tr>
                                    <th>permission:</th> 
                                    <td>$permission</td>
                                    
                                    
                                    
                                    
                                </tr>
                                <tr>
                                <th>fname:</th> 
                                <td>$fname</td>
                                </tr>
                                <tr>
                                 <th>Mno:</th> 
                                <td>$Mno</td>
                                
                            </tr>
                                
                                    
                                </table>

<br><br>
                                <p> vehicle  details will only updated after approval application</p>
                                
            
                                        
                                      
                                        
                                        
                                  
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>";


                }
            }
            
               
            
                ?>
				
				
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
table{
    width:100%;
}
tr ,th{
text-align: left;
  padding: 8px;
  
}

@media (max-width: 350px) {
    .card{
        font-size:9px !important;
    }
 }
 
@media ( min-width:375px) {
    .card{
        font-size:11px !important;
    }
 }
 @media ( min-width:1024px) {
    .card{
        font-size:9px !important;
    }
 }
 @media ( min-width:1440px) {
    .card{
        font-size:15px !important;
    }
 }
.me-2 {
    margin-right: .5rem!important;
}
</style>




   
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
</body>
</html>