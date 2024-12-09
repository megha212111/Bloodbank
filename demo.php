<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<nav>
  <div class="logo"><i class="fa-solid fa-circle-user"><?php $userprof ?></i></div>
  <input type="checkbox" name="click" id="click">
  <label for="click" class="menu-btn">
  <i class="fas fa-bars"></i></label>
  <ul>

    <li><a href="admin.php" class="active"><i class="fa-solid fa-database"></i>Blood Storage</a></li>
    <li><a href="donordata.php"><i class="fa-solid fa-user"></i>Donor Data</a></li>
    <li><a href="donation.php"><i class="fa-solid fa-briefcase"></i>Donation</a></li>
    <li><a href="request.php"><i class="fa-solid fa-envelope"></i>Requets</a></li>
    <li><a href="donationhistory.php"><i class="fa-solid fa-clock-rotate-left"></i>Donation History</a></li>
    <li><a href="requesthistory.php"><i class="fa-solid fa-clock-rotate-left"></i>Requets History</a></li>
    <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li> 
  </ul>
</nav>
</body>
</html>