<?php
  session_start();
?>
<?php
 include("../connection.php");
 
 $query="SELECT *FROM totalunit";
 $data = mysqli_query($conn,$query);
 $value=array();
 while($result=mysqli_fetch_assoc($data)){
    $value[] = $result['TotalUnit'];
    }
//  print_r($value);
//  echo $value[0];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include("head.html"); ?>
  <title>Blood Storage</title>
</head>
<?php 

$userprof=$_SESSION['user_name'];

if($userprof == true ){


}
else{
    header('location:adminlog.php');
}
?>
<body>
    <!-- import admin navigation bar -->
    <?php
    include("adminnav.html");
    ?>
     <div class="flexbox">
    <center><h4>Blood Storage</h4></center>
    <center><h3>(1 unit=450ml)</h3></center>
    <div class="container1">
                
            <div class="col1">
                <div class="logo1">
                    <img src="../images/logo1.png" alt="blood drop">
                </div>
                <h1>AB+</h1>
                <span class="count">
                    <h2><?php echo $value[0]; ?></h2>
                </span>
            </div>
            <div class="col2">
                <div class="logo1">
                    <img src="../images/logo1.png" alt="blood drop">
                </div>
                <h1>AB-</h1>
                <span class="count">
                <h2><?php echo $value[1]; ?></h2>
                </span>
            </div>
            <div class="col3">
                <div class="logo1">
                    <img src="../images/logo1.png" alt="blood drop">
                </div>
                <h1>A+</h1>
                <span class="count">
                <h2><?php echo $value[2]; ?></h2>
                </span>
            </div>
            
    </div>
    <div class="container2">
        <div class="col1">
            <div class="logo1">
                <img src="../images/logo1.png" alt="blood drop">
            </div>
            <h1>A-</h1>
            <span class="count">
            <h2><?php echo $value[3]; ?></h2>
            </span>
          
        </div>
        <div class="col2">
            <div class="logo1">
                <img src="../images/logo1.png" alt="blood drop">
            </div>
            <h1>B+</h1>
            <span class="count">
            <h2><?php echo $value[4]; ?></h2>
            </span>
            
        </div>
         <div class="col3">
            <div class="logo1">
                <img src="../images/logo1.png" alt="blood drop">
            </div>
            <h1>B-</h1>
            <span class="count">
            <h2><?php echo $value[5]; ?></h2>
            </span>
                  
        </div>
            
    </div>
    <div class="container3">
        <div class="col1">
            <div class="logo1">
                <img src="../images/logo1.png" alt="blood drop">
            </div>
            <h1>O+</h1>
            <span class="count">
            <h2><?php echo $value[6]; ?></h2>
            </span>
          
        </div>
        <div class="col2">
            <div class="logo1">
                <img src="../images/logo1.png" alt="blood drop">
            </div>
            <h1>O-</h1>
            <span class="count">
            <h2><?php echo $value[7]; ?></h2>
            </span>
            
            
        </div>
         <div class="col3">
        </div>
            
    </div>
</div>
<hr>


</body>
</html>
