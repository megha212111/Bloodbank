<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/donor_reg.css">

</head>

<body>
<?php
    $conn=mysqli_connect("localhost","root","","bloodbank");
          $nameErr=$phoneErr="";         
         if (isset($_POST['submit']))
          {      
            // $name =$_POST["name"];

              //check only letter and white space are allowed
        if (empty($_POST["age"]))
        {
          echo "<script>alert('choose age gap')</script>";
        }
        else if($_POST['age']=='yes')
        {
          if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['name'])){

            $nameErr = " * Only letters and white space allowed";
    
            }
          else if (!preg_match("/^[0-9]+$/i", $_POST['phone'])) {
                $phoneErr = '* Invalid Number!';
                
           }
           else if(strlen($_POST['phone'])!=10)
           {
              $phoneErr=" * Phone Number Must Contain atlest 10 Numbers";
           }
           else if($_POST['age']=='no')
        {
            echo "<script>alert('You cant donate if your not In age between 18 to 60')</script>";
        }
            else 
            {
                $nm=$_POST['name'];
                $email=$_POST['mail'];
                $psw=$_POST['pass'];+
                $phn=$_POST['phone'];
                $gen=$_POST['gender'];
                $bgrp=$_POST['bloodgrp'];
                $city=$_POST['city'];
                $area=$_POST['area'];
                $height=$_POST['height'];
                $weight=$_POST['weight'];
              $query ="INSERT INTO donordata(id,username,email,passwords,age,phone,gender, bloodgroup,DonationDate,city,area,height,weight) VALUES ('','$nm','$email','$psw','','$phn','$gen','$bgrp','','$city','$area','$height','$weight')";
              $data = mysqli_query($conn,$query);
              if( $data )
              {
               echo "<script>alert('Registration successfully done');</script>";
                echo "<meta http-equiv='refresh' content='0;url=http://localhost/bloodbank/donor/donor_login.php'/>";
              }
              else
              {
               echo "<script>alert('Registration fail')</script> ";
              } 

            } 

            }
        }
        
    
    
?>
<div class="container">
<center>        
        <div class="head">
        <h4>join as blood Donor</h4>
        </div>
        <div class="content">
            <form action="#" method="post" >
            <div class="field">
                <label for="name">Enter Name <span class="error">*</span></label>
                <input type="text" name="name" class="input" required>
                <span class = "error"><?php echo$nameErr;?></span>
                
            </div>
            <div class="field">
                <label for="email">Enter Email <span class="error">*</span></label>
                <input type="email" name="mail" class="input" required>
            </div>
            <div class="field">
                <label for="name">Enter Your Password <span class="error">*</span></label>
                <input type="password" name="pass" class="input" id="pass" required>
                
                <label for="show" class="show">
                    <input type="checkbox" name="show" id="show" class="showc" onclick="showdata()">
                    Show password
                </label>
            </div>
          
            <div class="field">
                <label for="name">Enter Phone No <span class="error">*</span></label>
                <input type="text" name="phone" class="input" required>
                <span class = "error"><?php echo$phoneErr;?></span>
            </div>
            <div class="field">
                <label for="gender">Gender <span class="error">*</span></label>
                <select name="gender" id="gender" class="inputslt" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="field">
                <label for="bloodgrp">Blood Group <span class="error">*</span></label>
                <select name="bloodgrp" id="bloodgrp" class="inputslt" required>
                    <option value="">Select Blood Group</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="O-">O-</option>
                    <option value="O+">O+</option>
                </select>
            </div><br> 
            <div class="field">
                <label for="r1" class="c11">is Your Age is between 18 and 60 ?<span class="error">*</span> &nbsp;&nbsp;&nbsp;&nbsp;
                    Yes<input type="radio" value="yes" name="age" class="radio"> &nbsp;&nbsp;&nbsp;&nbsp;
                    NO<input type="radio" value="no" name="age" class="radio">
                </label>
            </div>
            <br>
            <div class="field">
            <label for="">City</label>
            <select name="city" id="city" class="inputslt" onchange="populate(this.id,'area')">
                <option value="">-- Choose City --</option>
                <option value="Valsad">Valsad</option>
                <option value="Bardoli">Bardoli</option>
                <option value="Vapi">Vapi</option>
                <option value="Surat">Surat</option>
                <option value="Navsari">Navsari</option>
            </select>
            <label for="">Area</label>
            <select name="area" id="area" class="inputslt">
            </select>
            
            <div class="field">
                <label for="height">Enter Height <span class="error">*</span></label>
                <input type="text" name="height" class="input" required>
            </div>

            <div class="field">
                <label for="weight">Enter Weight <span class="error">*</span></label>
                <input type="text" name="weight" class="input" required>
            </div>
            
                
            </div>
            <div class="field">
                <input type="submit" name="submit" value="Submit" class="sbtn">
            </div>
            
            <div class="field">
            <label class="sign">Already Register Then!!<a href="donor_login.php"> Login IN Here</a></label> 
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
            var optarr = ["Tithal|Tithal","Mograwadi|Mograwadi","Bhadeli|Bhadeli","Dungri|Dungri","Pardi|Pardi","Dharampur|Dharampur","Kaprada|Kaprada"];
        }
        else if(s1.value == "Bardoli")
        {
            var optarr =["Mhuva|Mhuva","Tarsadi|Tarsadi","Isroli|Isroli","Baben|Baben","Bamroli|Bamroli","Ancheli|Ancheli","kadod|kadod"];
        }
        else if(s1.value == "Surat")
        {
            var optarr =["Kadodra|Kadodra","Kamrej|Kamrej","Adajan|Adajan","Udhna|Udhna ","Kim|Kim ","Varacha|Varacha"];
        }
        else if(s1.value == "Vapi")
        {
            var optarr =["Chala|Chala","Gujan|Gunjan","Namdha|Namdha","Gita Nagar|Gita Nagar","Pramukh Hills|Pramukh Hills","Imaran Nagar|Imaran Nagar"];
        }
        else if(s1.value == "Navsari")
        {
            var optarr =["Bilimora|Bilimora","gandevi|gandevi","Abrama|Abrama","Amalsad|Amalsad","Vejalpor|Vejalpor","chikhli|chikhli"];
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
