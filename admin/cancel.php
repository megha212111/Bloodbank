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
 $status="Cancelld";
//  echo $un;
//inserting into donationhistory

 $qry="INSERT INTO donationhistory(id,dname,age,gender,bloodgroup,unit,DonationDate,statuss) VALUES ('$id','$un','$age','$gender','$bdgrp','$unit','$Donation','$status')";

 $data= mysqli_query($conn,$qry);

// deleting from donation request

 $query2="DELETE FROM donation WHERE id='$id'";
 $data2 = mysqli_query($conn,$query2);

 if($data && $data2){
   echo "<script>alert('Cancel Successful')</script>";
?>
         <meta http-equiv ="refresh" content ="0;url=http://localhost/bloodbank/admin/donation.php"/>
  <?php
}
else{
   echo "<script>alert('Fail to Delete')</script>";
}
?>