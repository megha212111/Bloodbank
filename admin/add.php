<?php
include("../connection.php");
$id = $_GET['id'];
$query1="SELECT * FROM donation WHERE id='$id'";
$data1 = mysqli_query($conn,$query1);
$result=mysqli_fetch_assoc($data1);
$un=$result['donorname'];
$gender=$result['Gender'];
$age=$result['age'];
$bdgrp=$result['BloodGroup'];
$unit=$result['unit'];
$Donation=$result['DonationDate'];
$status="Added";
//  echo $un;
//inserting into donationhistory
$qry="INSERT INTO donationhistory (id,dname,age,gender,bloodgroup,unit,DonationDate,statuss) VALUES ('$id','$un','$age','$gender','$bdgrp','$unit','$Donation','$status')";

$data= mysqli_query($conn,$qry);

// selecting units from specefic bloodtype
$query2="SELECT TotalUnit From `totalunit` WHERE BloodType='$bdgrp'";
$data2 = mysqli_query($conn,$query2);
$res=mysqli_fetch_assoc($data2);


$inc =$res['TotalUnit']+$unit;

//inserting add unit to total units 
$query3="UPDATE `totalunit` SET TotalUnit='$inc' WHERE BloodType='$bdgrp'";
$data3 = mysqli_query($conn,$query3);

// deleting from donation request
$query4="DELETE FROM donation WHERE id='$id'";
$data4 = mysqli_query($conn,$query4);

if($data && $data3){
  echo "<script>alert('unit Added Successful')</script>";
?>
        <meta http-equiv ="refresh" content ="0;url=http://localhost/bloodbank/admin/donation.php"/>
 <?php
}
else{
  echo "<script>alert('Fail to add unit')</script>";
}
?>
