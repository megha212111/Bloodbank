<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include("head.html"); ?>
  <title>Donation History</title>
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
    <?php
      include("adminnav.html");

             include("../connection.php");
             include("connection.php");
             error_reporting(0);
              $query ="SELECT * FROM `donationhistory`";
         
              $data = mysqli_query($conn,$query);
         
              $total = mysqli_num_rows($data);
         
              if($total > 0)
              {
              
                 
                 ?>   
                     <h4> Displaying Donoation History </h4>
                     <center>
                       <table width="100%" cellspacing="3" id="t01">
                            <tr>
                            <th width="3%">Uid</th>
                            <th width="20%">DonorName</th>
                            <th  width="3%">Gender</th>
                            <th  width="3%">Age</th>
                            <th  width="5%">Blood Group</th>
                            <th width="5%">Units</th>
                            <th width="15%">DonateDate</th>
                            <th width="5%">Status</th>
                            </tr>
             <?php
                 while($res = mysqli_fetch_assoc($data))
                 {
                     echo"<tr>
                             <td>".$res['id']."</td>
                             <td>".$res['dname']."</td>
                             <td>".$res['gender']."</td>
                             <td>".$res['age']."</td>
                             <td>".$res['bloodgroup']."</td>
                             <td>".$res['unit']."</td>
                             <td>".$res['DonationDate']."</td>
                             <td>".$res['statuss']."</td>
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