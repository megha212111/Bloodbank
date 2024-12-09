<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include("head.html"); ?>
  <title>User Data</title>
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
      error_reporting(0);
      ?>
<!-- donor data -->

      <?php
       $query ="SELECT * FROM `donordata`";
  
       $data = mysqli_query($conn,$query);
  
       $total = mysqli_num_rows($data);
  
       if($total > 0)
       {
       
          
          ?> 
         
              <h4>  Userdata </h4>
              <center>
                <table width="100%" cellspacing="3" id="t01">
                     <tr>
                      <th width="3%">Uid</th> 
                     <th width="15%">Name</th>
                     <th  width="15%">Email</th>
                     <th  width="3%">Gender</th>
                     <th  width="4%">Blood Group</th>
                     <th width="12%">Donate Date</th>
                     <th  width="8%">City</th>
                     <th width="4%">Operations</th>
                     </tr>
      <?php
          while($res = mysqli_fetch_assoc($data))
          {
              echo"<tr>
                     <td>".$res['id']."</td>
                      <td>".$res['username']."</td>
                      <td>".$res['email']."</td>
                      <td>".$res['gender']."</td>
                      <td>".$res['bloodgroup']."</td>
                      <td>".$res['DonationDate']."</td>
                      <td>".$res['city']."</td>
                      <td><a class='link' href='delete.php?id=$res[id]'><button class='delete' onclick='return checkdelete()'>Delete</button></a></td>

                  </tr>";

          }
      }
  
          else{
              echo"something wrong wrong with connetion maybee";
  
          }
       ?>
     </table>
    </center>
    <script>
        function checkdelete(){
            return confirm('Are you sure You want to delete this Record ?');  
        }
    </script>    
</body>
</html>