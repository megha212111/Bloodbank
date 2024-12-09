<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/adminlogin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <center>
        
        
        <form method="post" action="#" name="frm1" class="content">
            <h1>Admin Login</h1>
            <hr>
           <div class="l1">
            <label>
            <i class="fa-solid fa-envelope">
            </i> Enter Email Address</label></div> 
            <input type="email" name="em" id="em" class="field" placeholder="Enter Email" required>
            
            <div class="l2">
            <label>
            <i class="fa-solid fa-lock"></i> Enter Password</label>
            </div> 
            <input type="password" name="pwd" id="pwd" class="field" placeholder="Enter Password" required>
            <div class="see">

                <label for="show" class=>
                    <input type="checkbox" name="show" id="show" class="show" onclick="showdata()">
                    Show password
                </label>
            </div>
            <div class="btn">
                <input type="submit" value="Login" name="submit" class="input" >
            </div>
       </form>
    </center>
    <script>
        function showdata(){
            var x = document.getElementById("pwd");
            if( x.type == "password")
            {
            x.type="text";
            }
            else{
                x.type="password";
            }
            
        }
    </script>
</body>
</html>
<!-- checking username & password of admin -->
<?php
    include("../connection.php");
    if(isset($_POST['submit']))
    {
        $nm=$_POST['em'];
        $pass=$_POST['pwd'];

        $query= " SELECT * FROM `admindata` WHERE email='$nm' && passwords='$pass' ";

        $data= mysqli_query($conn,$query);
        $total=mysqli_num_rows($data);
        // echo $total;
        if($total ==1)
        {
            session_start();
            $_SESSION['user_name']= $nm;
            header('location:admin.php');
        }
        else{
            echo "<script>alert('Login Fail');</script>";
            
        }
    }
?>    