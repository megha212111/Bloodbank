<?php
error_reporting(0);
  $servername="localhost";
  $username="root";
  $password="";
  $dbname="bloodbank";

  $conn= mysqli_connect($servername,$username,$password,$dbname);
  if(!$conn){
    echo "we have some issue in our server";

  }
  else{
    // echo"connection success";
    // echo "<script>alert(' successfully done');</script>";
  }
?>
