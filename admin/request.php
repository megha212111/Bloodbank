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
  <style>
    img{
      border:10px solid white;
      width:100%;
      height:120px;
    }
  </style>
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
         $query ="SELECT * FROM requests";
         $data = mysqli_query($conn,$query);
         $total = mysqli_num_rows($data);
         if($total > 0)
         {

            ?>   
            
                <h4> Displaying Blood Requests </h4>
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
                       <th width="14">Documents</th>
                       <th width="15%">Operations</th>
                       </tr>
        <?php
            while($res = mysqli_fetch_assoc($data))
            {
                echo"<tr>
                        <td>".$res['R_ID']."</td>
                        <td>".$res['R_EMAIL']."</td>
                        <td>".$res['P_NAME']."</td>
                        <td>".$res['P_GENDER']."</td>
                        <td>".$res['P_BLOODGRP']."</td>
                        <td>".$res['RUNITS']."</td>
                        <td>".$res['REQUEST_DATE']."</td>
                        <td><img src= '../".$res['DOCUMENT']."'></td>
                        <td><a href='approve.php?id=$res[RID]'><button class='up' onclick='return checkupdate()'>Approve</button></a>
                        <a href='decline.php?id=$res[RID]'><button class='del' onclick='return checkdelete()'>Decline</button></a></td>
  
                    </tr>";
  
            }
          }
    
            else{
                echo"<center><h2> zero records Found</h2></center>";
    
            }
         ?>
       </table>
      </center>
    <script>
        function checkdelete(){
            return confirm('Are you sure You dont want  to add this unit of blood ?');  
        }
        function checkupdate(){
            return confirm('Are you sure You want to add this unit of blood ?');  
        }
    </script>    
  
</body>
</html>