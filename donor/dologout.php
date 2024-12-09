<?php
session_start();
if(isset($_SESSION['donate'])){
session_unset();
header('location:../index.php');
}
else{
    echo "<script>alert('Logout Fail');</script>";
}
?>