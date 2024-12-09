<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("head.html"); ?>
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>
    <?php include("navbar.html"); ?>

    <div class="contact">
        <div class="fill">
            <center>
                <form action="sendmail.php" method="post">
                    <h2>Send Us a Message</h2>
                    <input type="text" name="fullName" class="input" placeholder="Enter Full Name" required><br>
                    <input type="text" name="phn" class="input" placeholder="Enter Phone Number" required><br>
                    <input type="email" name="email" class="input" placeholder="Enter Email Address" required><br>
                    <input type="text" name="subject" class="input" placeholder="Enter Subject" required><br>
                    <textarea name="message" cols="30" rows="10" class="inputted" placeholder="Enter Message" required></textarea><br>
                    <input type="submit" value="Send" class="Sbtn" name="submit">
                </form>
                    

            </center>
        </div>
        <div class="detail">
            <h3>Contact Details</h3>
            <p>Address: BloodBank, Valsad, Vapi</p>
            <p>Phone: 9099901633</p>
            <p>Email: <h4>bloodbank@mail.com</h4></p>
        </div>
    </div>

    <!-- JavaScript to display alert box based on session status -->
    <?php
    session_start();
    if (isset($_SESSION['status'])) {
        echo "<script>alert('" . $_SESSION['status'] . "');</script>";
        unset($_SESSION['status']); // Clear session status after displaying
    }
    ?>
</body>
</html>
