<?php
  session_start();
    
  $userproof=$_SESSION['donate'];
  if($userproof == true ){
    // echo "sessioon is start".$userproof;
      }
  else{
      header('location:donor_login.php');
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate</title>
    <link rel="stylesheet" href="../css/donate.css">
  </head>
  <body>
<?php 
     include("../connection.php");
     error_reporting(0);
    $query ="SELECT * FROM `donordata` WHERE email='$userproof'";

    $data = mysqli_query($conn,$query);

    $total = mysqli_num_rows($data);
    $res = mysqli_fetch_assoc($data);
    $id=$res['id'];
    $un=$res['username'];
    $em=$res['email'];
    $pho=$res['Phone'];
    $gender=$res['gender'];
    $bdgrp=$res['bloodgroup'];
    $donateddate=$res['DonationDate'];
    $city=$res['city'];
    $area=$res['area'];
    $height=$res['height'];
    $weight=$res['weight'];
?>
<?php
          error_reporting(0);
        require("../connection.php");
          $Query ="SELECT DonationDate FROM `donordata` WHERE email='$userproof'";
          $result=mysqli_query($conn,$Query);
          $data=mysqli_fetch_assoc($result);

          // cheking days of donor  
          $d2=$data['DonationDate'];

          $test2="0000-00-00";
          // echo $d1;
          $d1=$test=date('Y-m-d');
          //  crete function to get diffrence between two dates
          function getdays(DateTime $date1, DateTime $date2 ,$absolute=true)
          {
             $interval= $date1->diff($date2);
             return (!$absolute and $interval ->invert)?$interval-> days:$interval-> days;
         
          }
          
          $diff=getdays(new DateTime($d1),new DateTime($d2),FALSE);
    if($diff<90)
   {
            // echo "<br>".getdays(new DateTime($d1),new DateTime($d2),FALSE);
            echo"<center><img src='../images/thanks.jpeg'></center>";
            echo "<h6>Thank You for Your Constribution In Donation But You can Donate After 90 days<h6>";
            echo"<center><a href='../userprof.php'><button> GO Back</button></a></center>";
            
    }
    else if($diff >90)
    {
         echo "<br> <center><h5>Thanks for your Joining Us Start Today By Donating</h5></center>";
    
      // include("donateform.php");
    ?>    
    <center>

      <div class="headline">
        <h4>Donate</h4>
      </div>
      <div class="content">
            <form action="#" method="post">
            <div class="field">
                <label for="name"> Select Donation Date:</label>
                <input type="date" name="donatedate" class="input"required>
            </div>
                  <br>
            <div class="field">
                <label for="age">Enter Your Current Age:</label>
                <input type="number" name="age" id="age" required class="input">
              </div>
              <div class="field">
                <input type="submit" name="Donate" value="Send Donate Request" class="sbtn">
              </div>
            <?php  echo"<center><a href='../userprof.php'>GO Back</a></center>"; ?>
            </form>

          </div>
        </div>
      </center>      
<?php
if($_POST['Donate'])
 {
  $donationdate=$_POST['donatedate'];
  $expform=strtotime($donationdate);
  $exptoday=strtotime($d1);  
   if($_POST['age'] >= 60)
   {
     echo "<script>alert('Your Overaged Thanks For your services')</script>";
   }
   else if($_POST['age'] < 18)
   {
    echo "<script>alert('Your underaged You cant Donate')</script>";
   }
   else if($test==$_POST['donatedate'])
   {
    echo "<script>alert('Select atlest Tommorows Date')</script>";
   }
   else if($exptoday > $expform)
   {
    echo "<script>alert('Select Future Date Date')</script>";
   }
   else{

       $age=$_POST['age'];
   
   $qry2="INSERT INTO donation (id,donorname,Gender,age,BloodGroup,DonationDate) VALUES ('$id','$un','$gender','$age','$bdgrp','$donationdate')";
   $qry3="UPDATE donordata set DonationDate='$donationdate' WHERE id='$id' ";
   $dateupdate=mysqli_query($conn,$qry3);
   $donation =mysqli_query($conn,$qry2);
   if($donation && $dateupdate)
   {
     echo "<script>alert('donation request sent successfuly')</script>";
    //  session_start();
    //  unset($_SESSION['donate']);
  
   ?>
     <meta http-equiv ="refresh" content ="0;url=http://localhost/bloodbank/donor/donate.php"/>
   <?php
   }
   else{
    echo "<script>alert(' fail to send donation request')</script>";
   }
   }
 }
}
?>
      
</body>
</html>