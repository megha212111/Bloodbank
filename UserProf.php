<?php
  session_start();
    
  $userproof = $_SESSION['donate'];
  if ($userproof == true) {
      // Session is active
  } else {
      header('location:../bloodbank/donor/donor_login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/about.css">
<link rel="stylesheet" href="css/service.css">
<link rel="stylesheet" href="css/donate.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<title>User Profile</title>
</head>
<body>
    <?php include("navabar2.php"); ?>

    <?php
        include("connection.php");
        error_reporting(0);
        $query = "SELECT * FROM `donordata` WHERE email='$userproof'";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);
        $res = mysqli_fetch_assoc($data);

        if ($total > 0) {
            $un = $res['username'];
            $em = $res['email'];
            $pho = $res['Phone'];
            $gender = $res['gender'];
            $bdgrp = $res['bloodgroup'];
            $donateddate = $res['DonationDate'];
            $city = $res['city'];
            $area = $res['area'];
            $height = $res['height'];
            $weight = $res['weight'];
        ?>
        
        <div class="container">
            <center>
            <table width="100%" cellspacing="3" id="t01">
                <tr>
                    <th width="20%">Name</th>
                    <th width="20%">Email</th>
                    <th width="8%">Phone NO</th>
                    <th width="3%">Gender</th>
                    <th width="5%">Blood Group</th>
                    <th width="15%">Donate Date</th>
                    <th width="10%">City</th>
                    <th width="10%">Area</th>
                    <th width="10%">Height</th>
                    <th width="10%">Weight</th>
                    <th width="10%">Operation</th>
                </tr>
                <tr>
                    <td><?php echo $un; ?></td>
                    <td><?php echo $em; ?></td>
                    <td><?php echo $pho; ?></td>
                    <td><?php echo $gender; ?></td>
                    <td><?php echo $bdgrp; ?></td>
                    <td><?php echo $donateddate; ?></td>
                    <td><?php echo $city; ?></td>
                    <td><?php echo $area; ?></td>
                    <td><?php echo $height; ?></td>
                    <td><?php echo $weight; ?></td>
                    <td><a class='link' href='../bloodbank/donor/update.php?id=<?php echo $res["id"]; ?>'><button class='up'>Update</button></a></td>
                </tr>
            </table>
            </center>
        </div>
        
        <div class="choice">
            <h1>Services</h1>
            <div class="select">
                <ul class="list">
                    <li><a href="../bloodbank/donor/donate.php" style="text-decoration:none;"><i class='fa fa-user'></i>Donate Blood</a></li>
                    <li><a href="../bloodbank/donor/request.php" style="text-decoration:none;"><i class='fa fa-bed'></i>Need Blood</a></li>
                    <li><a href="Certificate.php?email=<?php echo $em; ?>" style="text-decoration:none;"><i class='fa fa-file'></i>Download Certificate</a></li> <!-- Pass email to Certificate.php -->
                </ul>
            </div>
        </div>

        <?php
        } else {
            echo "No data found.";
        }
        ?>
</body>
</html>
