<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include("head.html"); ?>
  <title>Donation Requests</title>
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
        include("connection.php");
        error_reporting(0);
         $query ="SELECT * FROM `donation`";
    
         $data = mysqli_query($conn,$query);
    
         $total = mysqli_num_rows($data);
    
         if($total > 0)
         {
         
            
            ?>   
                <h4> Donoation Requests </h4>
                <center>
                  <table width="80%" cellspacing="3" id="t01">
                       <tr>
                       <th width="5%">Uid</th>
                       <th width="20%">DonorName</th>
                       <th  width="5%">Gender</th>
                       <th  width="5%">Age</th>
                       <th  width="5%">Blood Group</th>
                       <th width="5%">Units</th>
                       <th width="15%">DonateDate</th>
                       <th width="15%">Operations</th>
                       </tr>
        <?php
            while($res = mysqli_fetch_assoc($data))
            {
                echo"<tr>
                        <td>".$res['id']."</td>
                        <td>".$res['donorname']."</td>
                        <td>".$res['Gender']."</td>
                        <td>".$res['age']."</td>
                        <td>".$res['BloodGroup']."</td>
                        <td>".$res['unit']."</td>
                        <td>".$res['DonationDate']."</td>
                        <td><a href='add.php?id=$res[id]'><button class='up' onclick='return checkupdate()'>ADD</button></a>
                        <a href='cancel.php?id=$res[id]'><button class='del' onclick='return checkdelete()'>CANCEL</button></a></td>
  
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