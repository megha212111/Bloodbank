<?php
include("../connection.php");
$id = $_GET['id'];
$query1="SELECT * FROM `requests` WHERE RID='$id'";
$data1 = mysqli_query($conn,$query1);
$result=mysqli_fetch_assoc($data1);
// $rid=$result['RID'];
$rnm=$result['R_NAME'];
$rem=$result['R_EMAIL'];
$pnm=$result['P_NAME'];
$pgen=$result['P_GENDER'];
$pbgrp=$result['P_BLOODGRP'];
$runit=$result['RUNITS'];
$rdata=$result['REQUEST_DATE'];
$status="Approved";
//  echo $un;
//inserting into requeshistory
  $qry="INSERT INTO requesthistory(RID,R_NAME,R_EMAIL,P_NAME,P_GENDER,P_BLOODGRP,RUNITS,REQUEST_DATE,STATUSS) VALUES ('$id','$rnm','$rem','$pnm','$pgen','$pbgrp','$runit','$rdata','$status')";

  $data= mysqli_query($conn,$qry);

   $query2="SELECT TotalUnit From totalunit WHERE BloodType='$pbgrp'";
   $data2 = mysqli_query($conn,$query2);
   $res=mysqli_fetch_assoc($data2);
   
   
   $inc =$res['TotalUnit']-$runit;
   if($inc<0){
    echo "<script>alert('This Blood Group Unit Is Out Of Stock')</script>";
   }
   else{
   //inserting add unit to total units 

   $query3="UPDATE `totalunit` SET TotalUnit='$inc' WHERE BloodType='$pbgrp'";
   $data3 = mysqli_query($conn,$query3);
   
   // deleting from donation request
   $query4="DELETE FROM `requests` WHERE RID='$id'";
   $data4 = mysqli_query($conn,$query4);
   
   if($data && $data3){
     echo "<script>alert('Approve the Request Successful')</script>";
   }
   else{
     echo "<script>alert('Fail to add unit')</script>";
   }
  }
    $to_email = "$rem";
    $subject = "About Blood Need Request";
    $body = "This email was sent to you to know that your request for blood has been approved to get the blood visit us and pay for each unit you request(1 unit = 1000ruppes)";
    $headers = "From:hjtandel1@gmail.com";
 
    if (mail($to_email, $subject, $body, $headers))
 
    {
     echo "<script> alert('Email successfully sent to $to_email...');</script>";
    }
 
    else
 
    {
    echo "Email sending failed!";
    }
    
    ?>
    <meta http-equiv ="refresh" content ="0;url=http://localhost/bloodbank/admin/request.php"/>
