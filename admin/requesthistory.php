<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include("head.html"); ?>
  <title>Blood Needs Request</title>
</head>
<?php 
// include("connetion.php");
// session_start();
$userprof=$_SESSION['user_name'];

if($userprof == true ){
//    echo "sessioon is start";
}
else{
    header('location:adminlog.php');
}
?>
<body>
       <!-- import admin navigation bar -->
       <?php
      include("adminnav.html");
        include("../connection.php");
        // error_reporting(0);
         $query ="SELECT * FROM `requesthistory`";
         $data = mysqli_query($conn,$query);
         $total = mysqli_num_rows($data);
         if($total > 0)
         {

            ?>   
            
                <h4> Displaying Blood Requests History</h4>
                <center>
                  <table width="100%" cellspacing="3" id="t01">
                       <tr>
                       <th width="3%">Uid</th>
                       <th  width="20%">Requester_Email</th>
                       <th  width="15%">Patient_Name</th>
                       <th  width="3%">Gender</th>
                       <th  width="5%">Blood Group</th>
                       <th width="5%">Units</th>
                       <th width="15%">RequestDate</th>
                       <th width="15%">Status</th>
                       </tr>
        <?php
            while($res = mysqli_fetch_assoc($data))
            {
                echo"<tr>
                        <td>".$res['UID']."</td>
                        <td>".$res['R_EMAIL']."</td>
                        <td>".$res['P_NAME']."</td>
                        <td>".$res['P_GENDER']."</td>
                        <td>".$res['P_BLOODGRP']."</td>
                        <td>".$res['UNITS']."</td>
                        <td>".$res['REQUEST_DATE']."</td>
                        <td>".$res['STATUSS']."</td>
                    </tr>";
  
            }
          }
    
            else{
                echo"<center><h2> zero records Found</h2></center>";
    
            }
         ?>
       </table>
      </center>
  
</body>
</html>