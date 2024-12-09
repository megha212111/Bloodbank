<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include("head.html"); ?>
  <title>Donor Data</title>
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
    <!-- import admin navigation bar -->
    <?php
    include("adminnav.html");
      include("../connection.php");
    //   include("connection.php");
      error_reporting(0);
       $query ="SELECT * FROM inbox";
  
       $data = mysqli_query($conn,$query);
  
       $total = mysqli_num_rows($data);
  
       if($total > 0)
       {
       
          
          ?>   
              <h4>Inbox Massages</h4>
              <center>
                <table width="100%" cellspacing="3" id="t01">
                     <tr>
                     <th width="20%">Name</th>
                     <th  width="20%">Email</th>
                     <th  width="20%">Phone NO</th>
                     <th width="40%">Massage</th>
                     </tr>
      <?php
          while($res = mysqli_fetch_assoc($data))
          {
              echo"<tr>
                      <td>".$res['UserName']."</td>
                      <td>".$res['Email']."</td>
                      <td>".$res['PhoneNO']."</td>
                      <td>".$res['Massage']."</td>
                  </tr>";

          }
      }
  
          else{
              echo"something wrong wrong with connetion maybee";
  
          }
       ?>
     </table>
    </center>
</body>
</html>