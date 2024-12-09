
<!DOCTYPE html>
<html lang="en">
<head>
<?php
include("head.html");
?>
<title>Blood Bank</title>
   
</head>
<body>
    <?php
    //   include navbar
       include("navbar.html");
    ?>
     <div class="bg" id="home">
        <div class="img">
            <img src="images/bg.jpg" alt="pic1">
        </div>
     </div>
     <div class="container">
        <hr>
    <h1 class="heading">Blood bank Management System</h1>
    <hr>
        <div class="row">
         <div class="box">
             <div class="headline"><i class="fa-solid fa-hand-holding-medical"></i>Donate</div>
                 <p>
                          Have you at anytime witnessed a reletive of your or close friend searching franticaly for Blood donor,when blood bank say out of stock,the donors in mind are out of reach and the time keepstickling?thought laid our foundation.
                 </p>
             
                <div class="space"><a href="userprof.php"><button class="btn">Donate</button></a>
             </div>
         </div> 
         <div class="box">
             <div class="headline"><i class="fa-solid fa-house-medical"></i>Need Blood</div>
                 <p>
                     every two second someones need blood.your blood helps more than one life at time
                     ,accident vicitms,permature-bebies,patients undergoing major surgeries required whole blood,where your blood after testing is used directly
                 </p>
             
                <div class="space"><a href="../bloodbank/userprof.php"><button class="btn">Request</button></a>
             </div>
         </div> 
         <div class="box">
             <div class="headline"><i class="fa-solid fa-magnifying-glass-plus"></i>Search Donor</div>
                 <p>
                     some people who hava serious injuries they need blood transfusion to replace blood lost during the injury.Regular blood donors esnsure that a safe and plentiful supply of Blood is available whenever and when it is needed.
                 </p>
             
                <div class="space"><a href="service.php"><button class="btn">Search</button></a>
             </div>
         </div> 
        </div>
  </div>   
    <!-- donation camps -->
     <div class="imgsection">
         <div class="imgwrap">
            <hr>
             <h1 class="heading">Blood Donoation Camps</h1>
             <hr>
             <div class="imgphotos">
           <div class="imgages">
                <div class="images-section">
                 <img src="images/p6.jpg" alt="">
                </div>

           </div>
           <div class="imgages">
               <div class="images-section">
                   <img src="images/p1.jpg" alt="">
               </div>
           </div>
           <div class="imgages">
               <div class="images-section">
                   <img src="images/p2.jpg" alt="">
               </div>
           </div>
           <div class="imgages">
               <div class="images-section">
                   <img src="images/p5.jpg" alt="">
               </div>
           </div>
           <div class="imgages">
               <div class="images-section">
                   <img src="images/s3.jpg" alt="">
               </div>

           </div>
           <div class="imgages">
               <div class="images-section">
                   <img src="images/s2.jpg" alt="">
               </div>
           </div>
                                                
                                            
            </div>
        </div>
    </div>
    <footer class="footer">
    <div class="container">
            <div class="footer-col">
                <h4 class="help">Get Help</h4>
                <ul>
                    <li><a>FAQ</a></li>
                    <li><a>Report</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4 class="contact">Contacts</h4>
                <ul>
                    <li><a>Phone.NO:+91 9099565278</a></li>
                    <li><a>email:sidpatel@.com</a></li>
                </ul>
            </div>
            
    </div>
</footer>
</body>
</html>