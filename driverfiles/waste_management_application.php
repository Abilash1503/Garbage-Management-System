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
 $driver_unique_id=$_SESSION['driver_unique_id'];
 


 $select_display= "select * from driver_admin where driver_unique_id='$driver_unique_id'" ;
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



                                $select_display1="select *  from application_request where application_request_id='$application_request_id'" ;
                                               $sql1 = mysqli_query($conn,$select_display1);
                                               $numExistRows = mysqli_num_rows($sql1);
                                               if($numExistRows<0){
                                                echo "no active user is there";
                                               }
                                               else{
                                               while($row=mysqli_fetch_assoc($sql1)){
                                                $application_request_id=$row['application_request_id'];
                    $garbage_type=$row['garbage_type'];
                    $service_date=$row['service_date'];
                    $weight=$row['weight'];  
                    $route_name=$row['route_name'];
                    $stop=$row['stop'];
                    $vehicle_unique_id=$row['vehicle_unique_id'];
                    $permission=$row['permission'];
                    $slot_time=$row['slot_time'];
                                                
                                                if($permission==0){
                                                    $permission='not approved yet';
                                                }
                                                else if($permission==1){

                                                    $permission='approved';
                                                }
                                                else{
                                                    $permission='Pending';
                                                }
                                                     
                                              $select_display8="SELECT * from application_request,slot_timetable where application_request.vehicle_unique_id=slot_timetable.vehicle_unique_id" ;
                                              $sql8 = mysqli_query($conn,$select_display8);
                                              while($row2=mysqli_fetch_assoc($sql8)){
                                                
                                                $start_time=$row2['start_time'];
                                                $end_time=$row2['end_time'];
                                              }
                                              $select_update8="UPDATE application_request SET slot_time='$start_time-$end_time' where application_request.vehicle_unique_id='$vehicle_unique_id'" ;
                                              $sql8 = mysqli_query($conn,$select_update8);

                               
                               
                
                        
                        echo "<div class='col-lg-6'>
                    
                        <div class='card' style='box-shadow: 0 0 0px rgb(0 0 0) !important;'>
                            <div class='card-body'>
                                <div class='d-flex flex-column align-items-center text-center'>
                                    <img src='https://bootdey.com/img/Content/avatar/avatar6.png' alt='Admin' class='rounded-circle p-1 bg-primary' width='110'>
                                    <div class='mt-3'>
                                    <table>
                                    <tr>
                                    <th>application request Id:</th> 
                                    <td>$application_request_id</td>
                                    
                                </tr>
                                <tr>
                                <th>Service Id:</th> 
                                <td>$service_date</td>

                            </tr>
                            <tr>
                            <th>time :</th> 
                            <td>$slot_time</td>
                           
                                </tr>

                            <tr>
                                <th>application name:</th> 
                                <td>$garbage_type</td>
                                
                            </tr>
                            <tr>
                                <th>route name:</th> 
                                <td>$route_name</td>
                                
                            </tr>
                            <tr>
                                <th>stop:</th> 
                                <td>$stop</td>
                                
                            </tr>
                            <tr>
                            <th>weight:</th> 
                            <td>$weight</td>
                            </tr>
                            <tr>
                            <th>vehicle :</th> 
                            <td>$vehicle_unique_id</td>
                           
                                </tr>
                        
                                <tr>
                                <th>permission:</th> 
                                <td>permission Access</td>
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