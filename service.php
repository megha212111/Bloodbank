<!DOCTYPE html>
<html lang="en">
<head>
<?php
    include("head.html");
?>
    <title>Services</title>
</head>
<body>
    <?php include("navbar.html"); ?>
	 <div class="choice">
        <h1>Our Services</h1>
            <div class="select">
                <ul class="list">
                    <li><a href="../bloodbank/donor/donor_login.php" style='text-decoration:none;'><i class='fa fa-user'></i> Donor Login</a></li>
                    <li><a href="../bloodbank/donor/donor_regi.php" style='text-decoration:none;'>/<i class='fa fa-users'></i> Donor Registration</a></li>
                    <li><a href="../bloodbank/donor/request.php" style='text-decoration:none;'>/<i class='fa fa-bed'></i> Need Blood</a></li>

                </ul>
            </div>
     </div>	
<center>
    <form class="f1" method="post" action="#">
        <h3>Search Donor</h3>
        <div class="sbar">
        <label for="">City</label>
            <select name="city" id="city" class="inputslt">
                <option value="">-- Choose City --</option>
                <option value="Valsad">Valsad</option>
                <option value="Bardoli">Bardoli</option>
                <option value="Vapi">Vapi</option>
                <option value="Surat">Surat</option>/
                <option value="Navsari">Navsari</option>
            </select>
            <center><p1>OR</p1></center>
        <label for="">Blood Group</label><label class="error">*</label>
        <select name="selectbg" class="inputslt">
            <option value="">Select BloodGroup</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="O-">O-</option>
            <option value="O+">O+</option>
        </select>
    </div>
        <br>
        <input type="submit" value="Search" name="search" class="sbtn">
    </form>
</center>
<?php
if(isset($_POST['search']))
{
    error_reporting(0);

    include("connection.php"); 

    $city=$_POST['city'];
    $bgrp=$_POST['selectbg'];
    if($bgrp=="" && $city=="")
    {
        echo "<center><h6>Select Blood Group atlest</h6></center>";    
    }

    else{
       $query ="SELECT * FROM  donordata WHERE city='$city' OR bloodgroup='$bgrp';";
       $data = mysqli_query($conn,$query);
       $total = mysqli_num_rows($data);

       if($total > 0)
       {
        ?>   
              
              <center>
                <table width="80%" cellspacing="3" id="t01">
                     <tr>
                     <th width="15%">Name</th>
                     <th  width="10%">Gender</th>
                     <th  width="20%">Phone NO</th>
                     <th width="10%">BloodGroup</th>
                     <th width="10%">DonationDate</th>
                     <th width="%10">City</th>
                     <th width="%10">Area</th>
                     <th  width="10%">height</th>
                     <th  width="10%">weight</th>
                     </tr>
      <?php
          while($res = mysqli_fetch_assoc($data))
          {
              echo"<tr>
                      <td>".$res['username']."</td>
                      <td>".$res['gender']."</td>
                      <td>".$res['Phone']."</td>
                      <td>".$res['bloodgroup']."</td>
                      <td>".$res['DonationDate']."</td>
                      <td>".$res['city']."</td>
                      <td>".$res['area']."</td>
                  </tr>";

          }
      }
  
        else{
              echo "<center><h6>No record found</h6></center>";
        }
    

    }
}

     ?>
      </table>
    </center>
</body>
</html>