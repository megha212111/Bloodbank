<?php

include("../connection.php");
 $id = $_GET['id'];
//  echo $id;
 $query="SELECT *FROM donordata WHERE id='$id'";
 $data = mysqli_query($conn,$query);
 $result=mysqli_fetch_assoc($data);
 $un=$result['username'];
 $em=$result['email'];
 $pass=$result['passwords'];
 $pho=$result['Phone'];
 $gender=$result['gender'];
 $bdgrp=$result['bloodgroup'];
 $ct=$result['city'];
 $ar=$result['area'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="../css/donor_reg.css">
</head>
<body>
<div class="container">
<center>        
        <div class="head">
        <h4>Update Data</h4>
        </div>
        <div class="content">
            <form action="#" method="post">
            <div class="field">
                <label for="name">Enter Name:</label>
                <input type="text" name="name" class="input" value="<?php echo $un; ?>" required>
            </div>
            <div class="field">
                <label for="email">Enter Email:</label>
                <input type="email" name="mail" class="input" value="<?php echo $em ?>" required>
            </div>
            <div class="field">
                <label for="name">Enter Your Password <span class="error">*</span></label>
                <input type="password" name="pass" class="input" id="pass" value="<?php echo $pass ?>" required>
                
                <label for="show" class="show">
                    <input type="checkbox" name="show" id="show" class="showc" onclick="showdata()">
                    Show password
                </label>
            <div class="field">
                <label for="name">Enter Phone No</label>
                <input type="text" name="phone" class="input" value="<?php 
                echo $pho; ?>" required>
            </div>
            <div class="field">
                <label for="gender">gender :</label>
                <select name="gender" id="gender" class="inputslt" required>
                    <option value="">Select Gender</option>
                    <option value="male" 
                <?php
                    if($gender =='male')
                    {
                        echo"selected";
                    }
            
               ?>    
                >Male</option>
                <option value="female" 
                <?php
                    if($gender =='female')
                    {
                        echo"selected";
                    }
            
               ?>  
                >Female</option>
             </select>

            </div>
            <div class="field">
                <label for="bloodgrp">Blood Group:</label>
                <select name="bloodgrp" id="bloodgrp" class="inputslt" required>
                <option value="">Select Blood Group</option>
                <option value="AB-"  
                <?php
                if($gender =='AB-')
                    {
                        echo "selected";
                    }
                    ?>
                    >AB+</option>
                <option value="AB+"
                <?php
                  if($bdgrp =='AB+')
                    {
                        echo"selected";
                    }
                ?>
                >AB-</option>
                <option value="B+"
                <?php
                  if($bdgrp =='B+')
                    {
                        echo"selected";
                    }
                ?>
                >B+</option>
                <option value="B-" 
                <?php
                  if($bdgrp =='B-')
                    {
                        echo"selected";
                    }
                ?>
                >B-</option>
                <option value="A+"
                <?php
                  if($bdgrp =='A+')
                    {
                        echo"selected";
                    }
                ?>
                >A+</option>
                <option value="A-"
                <?php
                  if($bdgrp =='A-')
                    {
                        echo"selected";
                    }
                ?>
                >A-</option>
                <option value="O-"
                <?php
                  if($bdgrp =='O-')
                    {
                        echo"selected";
                    }
                ?>
                >O-</option>
                <option value="O+"
                <?php
                  if($bdgrp =='O+')
                    {
                        echo"selected";
                    }
                ?>
                >O+</option>

            </select>
            </div>
            <div class="field">
            <label for="">City</label>
            <select name="city" id="city" class="inputslt" onchange="populate(this.id,'area')">
                <option value="">--Update City --</option>
                <option value="Valsad">Valsad</option>
                <option value="Dharampur">Dharampur</option>
                <option value="Vapi">Vapi</option>
                <option value="Pardi">Pardi</option>
                <option value="Dungari">Dungari</option>
            </select>
            <label>Area</label>
            <select name="area" id="area" class="inputslt">
            </select>
            <div class="field">
                <input type="submit" name="update" value="Update" class="sbtn">
            </div>
        </form>
        </div>
</center>
</div>
<script>
        function showdata(){
            var x = document.getElementById("pass");
            if( x.type == "password")
            {
            x.type="text";
            }
            else{
                x.type="password";
            }
            
        }

        function populate(s1,s2){
        var s1=document.getElementById(s1);
        var s2=document.getElementById(s2);
        s2.innerHTML="";
        // console.log(s1);
        if(s1.value == "Valsad"){
            var optarr = ["Tithal|Tithal","Mograwadi|Mograwadi","Bhadeli|Bhadeli"];
        }
        else if(s1.value == "Dungari")
        {
            var optarr =["Jespor|Jespor","Rola|Rola","Olgaam|Olgaam","Vasan|Vasan","Untdi|Untdi","Sonawada|Sonawada","Shanker Talav|Shanker Talav","Dhanasana|Dhanasana","Dhanori|Dhanori","Umarsadi|Umarsadi"];
        }
        else if(s1.value == "Dharampur")
        {
            var optarr =["Amba Talat|Amba Talat","Asura|Asura","Bhavada|Bhavada","Dasondi Street|Dasondi Street","Samadi Chock|Samadi Chock","Vathoda|Vathoda"];
        }
        else if(s1.value == "Vapi")
        {
            var optarr =["Chala|Chala","Gujan|Gunjan","Namdha|Namdha","Gita Nagar|Gita Nagar","Pramukh Hills|Pramukh Hills","Imaran Nagar|Imaran Nagar"];
        }
        else if(s1.value == "Pardi")
        {
            var optarr =["Ambach|Ambach","Dumlav|Dumlav","Kherlav|Kherlav","Kalsar|Kalsar","Motiwada|Motiwada","Tarakpardi|Tarakpardi","Varai|Varai","Velparva|Velparva","Udvada|Udvada"];
        }
    

        for (var option in optarr){
            var pair = optarr[option].split("|");
            var newoption = document.createElement("option");

            newoption.value=pair[0];
            newoption.innerHTML=pair[1];
            s2.options.add(newoption);        
        }

    }
    </script>
</body>
</html>
<?php
   if($_POST['update'])
 {
   
   $nm=$_POST['name'];
   $email=$_POST['mail'];
   $gen=$_POST['gender'];
   $bgrp=$_POST['bloodgrp'];
   $phn=$_POST['phone'];
   $city=$_POST['city'];
   $area=$_POST['area'];
  if($city){


    $query2="UPDATE donordata set username='$nm',email='$email',phone='$phn',gender='$gen',bloodgroup='$bgrp',city='$city',area='$area' WHERE id='$id' ";

    $update=mysqli_query($conn,$query2);

   if( $update )
   {
     echo "<script>alert('update successfuly  done')</script>";
     ?>

     <meta http-equiv ="refresh" content ="0;url=http://localhost/bloodbank/userprof.php"/>

    <?php
   }
   else{
    echo "<script>alert('update fail')</script>";
   }
 }
 else
 {
    echo "<script>alert('Choose City To update')</script>";

 }
}
?>