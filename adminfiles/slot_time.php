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
 $batch=$_GET['batch'];

 $admin_username=$_SESSION['admin_username'];
 $select_display= "select * from department_coordinator where admin_username='$admin_username'" ;
 $select_sql1 = mysqli_query($conn,$select_display);
 while($row1 = mysqli_fetch_array($select_sql1)){
 $admin_username=$row1[1];
 $department=$row1[3];
 }
 }
 

?>

	

<!DOCTYPE html>
<html lang="en">

<body>



    

    
    
<br><br><br>
<div class="wrapper">
<?php include 'nav.php';?>
<div class="parent-container d-flex">
    <div class="container" style=" box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%); width:fit-content; height:fit-content">
        <div class="row">
            
            <form action="" method="POST">
                                      <div class="btn-group-vertical mx-2 my-1">
                                        <button type="submit" name="monday" class="btn btn-primary text-left"><i class="fa-solid fa-calendar-days"></i>&nbsp;&nbsp;Monday</button>
                                        <button type="submit" name="tuesday" class="btn btn-primary text-left"><i class="fa-solid fa-calendar-days"></i>&nbsp;&nbsp;Tuesday</button>
                                        <button type="submit"  name="wednesday" class="btn btn-primary text-left"><i class="fa-solid fa-calendar-days"></i>&nbsp;&nbsp;Wednesday</button>
                                        <button type="submit" name="thursday" class="btn btn-primary text-left"><i class="fa-solid fa-calendar-days"></i>&nbsp;&nbsp;Thursday</button>
                                        <button type="submit" name="friday" class="btn btn-primary text-left "><i class="fa-solid fa-calendar-days"></i>&nbsp;&nbsp;Friday</button>
                                        <button type="submit"  name="saturday"class="btn btn-primary text-left"><i class="fa-solid fa-calendar-days"></i>&nbsp;&nbsp;Saturday</button>
                                        <button type="submit" name="sunday" class="btn btn-primary text-left"><i class="fa-solid fa-calendar-days"></i>&nbsp;&nbsp;Sunday</button>
                                      </div>
                                   <form>
            
        </div>
    </div>
<!--fetch sechedule-->
    <div class="container right  col-lg-10"  style="box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%); height:fit-content">
        <div class="row">
            
            <?php
             
               if(isset($_POST['monday'])) {
                            $select_display="select * from timetable where batch='$batch' and day='monday'" ;
                                           $sql1 = mysqli_query($conn,$select_display);
                                           while($row=mysqli_fetch_assoc($sql1)){
                                               $start_time=$row['start_time'];
                                                   $end_time=$row['end_time'];
                                                   $subject_code=$row['subject_code'];
                                                   $faculty_name=$row['faculty_name'];
                                          
                           
                           
            
                    
                                                   echo "<div class='col-lg-2 mt-3'>
                                                  
                                                   
                                                 
                                                   
                    
                                                   <div class='card text-center' style='box-shadow: 0 0 0px rgb(0 0 0) !important; background-color: #ffd9fa; '>
                                                   
                                                   
                                                       
                                       
                                                                   
                                                                 
                                                                   <p class='text-white mb-1' style='background:#007bff;border-radius: 4%;'><small>$start_time-$end_time</small></p>
                                                                   
                                                                   <p class='text-dark mb-1' style='border-radius: 4%;'><small>$subject_code</small></p>
                                                                   <p class='text-dark mb-1 ' style='border-radius: 4%;'><small>$faculty_name</small></p>
                                                                   </div>
                                                       
                                             
                                         
                                               </div>";


            }
          }

          else if(isset($_POST['tuesday'])) {
            $select_display="select * from timetable where batch='$batch' and day='tuesday'" ;
                           $sql1 = mysqli_query($conn,$select_display);
                           while($row=mysqli_fetch_assoc($sql1)){
                               $start_time=$row['start_time'];
                                   $end_time=$row['end_time'];
                                   $subject_code=$row['subject_code'];
                                   $faculty_name=$row['faculty_name'];
                          
           
           

    
                                   echo "<div class='col-lg-2 mt-3'>
                                  
                                   
                                 
                                   
    
                                   <div class='card text-center' style='box-shadow: 0 0 0px rgb(0 0 0) !important; background-color: #ffd9fa; '>
                                   
                                   
                                       
                       
                                                   
                                                 
                                                   <p class='text-white mb-1' style='background:#007bff;border-radius: 4%;'><small>$start_time-$end_time</small></p>
                                                   
                                                   <p class='text-dark mb-1' style='border-radius: 4%;'><small>$subject_code</small></p>
                                                   <p class='text-dark mb-1 ' style='border-radius: 4%;'><small>$faculty_name</small></p>
                                                   </div>
                                       
                             
                         
                               </div>";


}
}

else if(isset($_POST['wednesday'])) {
    $select_display="select * from timetable where batch='$batch' and day='wednesday'" ;
                   $sql1 = mysqli_query($conn,$select_display);
                   while($row=mysqli_fetch_assoc($sql1)){
                       $start_time=$row['start_time'];
                           $end_time=$row['end_time'];
                           $subject_code=$row['subject_code'];
                           $faculty_name=$row['faculty_name'];
                  
   
   


                           echo "<div class='col-lg-2 mt-3'>
                          
                           
                         
                           

                           <div class='card text-center' style='box-shadow: 0 0 0px rgb(0 0 0) !important; background-color: #ffd9fa; '>
                           
                           
                               
               
                                           
                                         
                                           <p class='text-white mb-1' style='background:#007bff;border-radius: 4%;'><small>$start_time-$end_time</small></p>
                                           
                                           <p class='text-dark mb-1' style='border-radius: 4%;'><small>$subject_code</small></p>
                                           <p class='text-dark mb-1 ' style='border-radius: 4%;'><small>$faculty_name</small></p>
                                           </div>
                               
                     
                 
                       </div>";


}
}
else if(isset($_POST['thursday'])) {
    $select_display="select * from timetable where batch='$batch' and day='thursday'" ;
                   $sql1 = mysqli_query($conn,$select_display);
                   while($row=mysqli_fetch_assoc($sql1)){
                       $start_time=$row['start_time'];
                           $end_time=$row['end_time'];
                           $subject_code=$row['subject_code'];
                           $faculty_name=$row['faculty_name'];
                  
   
   


                           echo "<div class='col-lg-2 mt-3'>
                          
                           
                         
                           

                           <div class='card text-center' style='box-shadow: 0 0 0px rgb(0 0 0) !important; background-color: #ffd9fa; '>
                           
                           
                               
               
                                           
                                         
                                           <p class='text-white mb-1' style='background:#007bff;border-radius: 4%;'><small>$start_time-$end_time</small></p>
                                           
                                           <p class='text-dark mb-1' style='border-radius: 4%;'><small>$subject_code</small></p>
                                           <p class='text-dark mb-1 ' style='border-radius: 4%;'><small>$faculty_name</small></p>
                                           </div>
                               
                     
                 
                       </div>";


}
}

else if(isset($_POST['friday'])) {
    $select_display="select * from timetable where batch='$batch' and day='friday'" ;
                   $sql1 = mysqli_query($conn,$select_display);
                   while($row=mysqli_fetch_assoc($sql1)){
                       $start_time=$row['start_time'];
                           $end_time=$row['end_time'];
                           $subject_code=$row['subject_code'];
                           $faculty_name=$row['faculty_name'];
                  
   
   


                           echo "<div class='col-lg-2 mt-3'>
                          
                           
                         
                           

                           <div class='card text-center' style='box-shadow: 0 0 0px rgb(0 0 0) !important; background-color: #ffd9fa; '>
                           
                           
                               
               
                                           
                                         
                                           <p class='text-white mb-1' style='background:#007bff;border-radius: 4%;'><small>$start_time-$end_time</small></p>
                                           
                                           <p class='text-dark mb-1' style='border-radius: 4%;'><small>$subject_code</small></p>
                                           <p class='text-dark mb-1 ' style='border-radius: 4%;'><small>$faculty_name</small></p>
                                           </div>
                               
                     
                 
                       </div>";


}
}

else if(isset($_POST['saturday'])) {
    $select_display="select * from timetable where batch='$batch' and day='saturday'" ;
                   $sql1 = mysqli_query($conn,$select_display);
                   while($row=mysqli_fetch_assoc($sql1)){
                       $start_time=$row['start_time'];
                           $end_time=$row['end_time'];
                           $subject_code=$row['subject_code'];
                           $faculty_name=$row['faculty_name'];
                  
   
   


                           echo "<div class='col-lg-2 mt-3'>
                          
                           
                         
                           

                           <div class='card text-center' style='box-shadow: 0 0 0px rgb(0 0 0) !important; background-color: #ffd9fa; '>
                           
                           
                               
               
                                           
                                         
                                           <p class='text-white mb-1' style='background:#007bff;border-radius: 4%;'><small>$start_time-$end_time</small></p>
                                           
                                           <p class='text-dark mb-1' style='border-radius: 4%;'><small>$subject_code</small></p>
                                           <p class='text-dark mb-1 ' style='border-radius: 4%;'><small>$faculty_name</small></p>
                                           </div>
                               
                     
                 
                       </div>";


}
}

else if(isset($_POST['sunday'])) {
    $select_display="select * from timetable where batch='$batch' and day='sunday'" ;
                   $sql1 = mysqli_query($conn,$select_display);
                   while($row=mysqli_fetch_assoc($sql1)){
                       $start_time=$row['start_time'];
                           $end_time=$row['end_time'];
                           $subject_code=$row['subject_code'];
                           $faculty_name=$row['faculty_name'];
                  
   
   


                           echo "<div class='col-lg-2 mt-3'>
                          
                           
                         
                           

                           <div class='card text-center' style='box-shadow: 0 0 0px rgb(0 0 0) !important; background-color: #ffd9fa; '>
                           
                           
                               
               
                                           
                                         
                                           <p class='text-white mb-1' style='background:#007bff;border-radius: 4%; font-size:x-large;'>$start_time-$end_time</p>
                                           
                                           <p class='text-dark mb-1' style='border-radius: 4%;font-size:x-large;'>$subject_code</p>
                                           <p class='text-dark mb-1 ' style='border-radius: 4%;font-size:x-large;'>$faculty_name</p>
                                           </div>
                               
                     
                 
                       </div>";


}
}

else{
    
    $mydate=getdate(date("U"));

    $select_display="select * from timetable where batch='$batch' and day='$mydate[weekday]'" ;
                   $sql1 = mysqli_query($conn,$select_display);
                   while($row=mysqli_fetch_assoc($sql1)){
                       $start_time=$row['start_time'];
                           $end_time=$row['end_time'];
                           $subject_code=$row['subject_code'];
                           $faculty_name=$row['faculty_name'];
                  
   
   


                           echo "<div class='col-lg-2 mt-3'>
                          
                           
                         
                           

                           <div class='card text-center' style='box-shadow: 0 0 0px rgb(0 0 0) !important; background-color: #ffd9fa; '>
                           
                           
                               
               
                                           
                                         
                                           <p class='text-white mb-1' style='background:#007bff;border-radius: 4%;'><small>$start_time-$end_time</small></p>
                                           
                                           <p class='text-dark mb-1' style='border-radius: 4%;'><small>$subject_code</small></p>
                                           <p class='text-dark mb-1 ' style='border-radius: 4%;'><small>$faculty_name</small></p>
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
.table{
    border: 1px solid black;
    
}
td,th{
text-align: left;
  padding: 8px;
  
}

@media (max-width: 780px) {
    .right{
        margin-left:2%;
    }
    
 }
@media (max-width: 475px) {
    .right{
        margin-left:2%;
    }
    .card{
        font-size:9px !important;
    }

    .form{
        max-width:100px;
        width:fit-content;
     
        font-size:9px;
    }
    .btn-group-vertical{
        max-width:90px;
        width:fit-content;
    }
    button.btn.btn-primary.text-left{
        font-size:xx-small;
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