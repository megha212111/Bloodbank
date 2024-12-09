<?php
//  error_reporting(0);
 require("connect.php");
 $Query ="SELECT LoginDate  FROM `donordata` WHERE email=''";
 $result=mysqli_query($conn,$Query);
 $data=mysqli_fetch_assoc($result);
 $d2=$data['LoginDate'];
 $d1=date('Y-m-d');
 echo $d1;
 echo "<br>";
 echo $d2;
 function getdays(DateTime $date1, DateTime $date2 ,$absolute=true){
    $interval= $date1->diff($date2);
    return (!$absolute and $interval ->invert)?$interval->days:$interval->days;

 }
  echo "<br>".getdays(new DateTime($d1),new DateTime($d2),FALSE);
    ?>
   