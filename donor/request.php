<?php
  session_start();
    
  $userproof=$_SESSION['donate'];
  if($userproof == true ){
    // echo "sessioon is start".$userproof;
      }
  else{
      header('location:donor_login.php');
      }
?>
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
error_reporting(0);
    $conn=mysqli_connect("localhost","root","","bloodbank");
          $nameErr=$UniteErr="";         
         if (isset($_POST['submit']))
          {     
            if ($_POST["runit"] <= 0)
            {
              echo "<script>alert('Please fill up proper information in Blood unite you want')</script>";
            }
            else if($_POST['runit'] >= 1)
            {
              if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['pname'])){
    
                $nameErr = " * Only letters and white space allowed";
        
                }
              else 
               {
                  //  file uploading
                  $imgname= $_FILES["uploadfile"]["name"];
                  $tmpname= $_FILES["uploadfile"]["tmp_name"];

                  $path="C:/xampp/htdocs/bloodbank/upload/".$imgname;
                $folder="upload/".$imgname;


                  move_uploaded_file($tmpname,$path);
                //   insert into upload (upload) values ('$folder');


                $qry="SELECT id FROM donordata WHERE email='$userproof'";
                $dta = mysqli_query($conn,$qry);
                $getdta= mysqli_fetch_assoc($dta);

                $R_ID=$getdta['id'];
           
           
                 $pnm=$_POST['pname'];
                 $pgen=$_POST['pgender'];
                 $pbgrp=$_POST['pbloodgrp'];
                 $punits=$_POST['runit'];
               
           
                 $query ="INSERT INTO `requests` (R_ID,R_EMAIL,P_NAME,P_GENDER,P_BLOODGRP,RUNITS,DOCUMENT) VALUES ('$R_ID','$userproof','$pnm','$pgen','$pbgrp','$punits','$folder')";
           
           
           
           
                     $data= mysqli_query($conn,$query);
                    
                     if( $data )
                     {
                      echo "<script>alert('Blood Request sent  successfully done');</script>";
                     ?> 
                       <meta http-equiv ="refresh" content ="2;url=http://localhost/bloodbank/userprof.php"/>
                   <?php
                     }
                     else{
                      echo "<script>alert('fail to send Request')</script>";
                     }
  
           
              }
            
           }
         }
        
?>
<div class="container">
<center>        
        <div class="head">
        <h4>Request Blood</h4>
        </div>
        <div class="content">
        <!-- onsubmit="return validation()" -->
            <form action="#" method="post" name="myform" enctype="multipart/form-data" onsubmit="return validation()">
            <div class="field">
                <label for="pname">Enter Patient Name:</label>
                <input type="text" name="pname" class="input" required>
                <span class = "error"><?php echo$nameErr;?></span>
            </div>
            <div class="field">
                <label for="pgender">Patient gender :</label>
                <select name="pgender" id="pgender" class="inputslt" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="field">
                <label for="bloodgrp">Patient Blood Group:</label>
                <select name="pbloodgrp" id="pbloodgrp" class="inputslt" required>
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
            </div>
            <div class="field">
                <label for="unit">Enter Number of Unit (1 unit = 450ml):</label>
                <input type="number" name="runit" id="unit" class="inputnum" required>
            </div>
            <br>
            <div class="field">
                <label>Patient File Recipt or Medical Report</label>
                <input type="file" name="uploadfile" class="inputfile" style="height:30px"><br><br>
            </div>
            <div class="field">
                <input type="submit" name="submit" value="Request" class="sbtn">
            </div>
            <div class="field">
                <label class="sign"><a href="../userprof.php">Back to Home</a></label> 
            </div>
        </form>
        </div>
</center>
</div>
<script>
        var img=document.forms['myform']['uploadfile'];
        validExt=["jpeg","jpg","png","JPG","PNG","JPEG"];

        function validation(){
            if(img.value!= '')
            {
                //getting index value of last dot and store in pos_dot variable
                var pos_dot =img.value.lastIndexOf('.')+1;
                imgExt=img.value.substring(pos_dot);

                var result=validExt.includes(imgExt);
                // console.log(result);
                if(result==false){
                    alert("only .jpeg .png .jpg are accaptabel");
                    return false;
                }
                else{
                    if(img.files[0].size/(1024*1024) >= 3)
                    {
                        alert(" file is too big only less than 3 mb are accptabel");
                        return false;

                    }
                }
            }
            else{
                alert("Select Image Please");
                return false;

            }
            return true;
        }
    </script>
</body>
</html>
<!-- ?php
//   error_reporting(0);
  include("../connection.php");
  if(isset($_POST['submit']))  
   {
    //  file uploading
     $imgname= $_FILES["uploadfile"]["name"];
     $tmpname= $_FILES["uploadfile"]["tmp_name"];
     $folder="upload/".$imgname;
     move_uploaded_file($tmpname,$folder);



    // getting id from user
     $qry="SELECT id FROM donordata WHERE email='$userproof'";
     $dta = mysqli_query($conn,$qry);
     $getdta= mysqli_fetch_assoc($dta);
     $R_ID=$getdta['id'];


      $pnm=$_POST['pname'];
      $pgen=$_POST['pgender'];
      $pbgrp=$_POST['pbloodgrp'];
      $punits=$_POST['runit'];
    

      $query ="INSERT INTO `requests` (R_ID,R_EMAIL,P_NAME,P_GENDER,P_BLOODGRP,RUNITS) VALUES ('$R_ID','$userproof','$pnm','$pgen','$pbgrp','$punits')";




          $data= mysqli_query($conn,$query);
         
          if( $data )
          {
           echo "<script>alert('Blood Request sent  successfully done');</script>";
          ?> 
            <meta http-equiv ="refresh" content ="2;url=http://localhost/bloodbank/request.php"/>
        ?php
          }
          else{
           echo "<script>alert('fail to send Request')</script>";
          }
    echo "<script>alert('process 7');</script>";

   }
 

?> -->
