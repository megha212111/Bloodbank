<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation Certificate</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="certificate-container">
        <div class="header">
            <img src="logo1.png" alt="Logo 1" class="logo left">
            <img src="logo2.png" alt="Logo 2" class="logo right">
            <h2>Blood Bank Donation Drive</h2>
            <h3>In Association with [Your Organization Name]</h3>
        </div>
        <div class="certificate-title">
            <h1>BLOOD DONATION CERTIFICATE</h1>
            <p>Certificate of Appreciation</p>
        </div>
        <div class="body-text">
            <p>This certificate is proudly awarded to</p>
            <h2><?php echo htmlspecialchars($_POST['name']); ?></h2>
            <p>from <?php echo htmlspecialchars($_POST['institution']); ?></p>
            <p>for their generous blood donation on <?php echo htmlspecialchars($_POST['date']); ?>.</p>
            <p>Your contribution will help save lives.</p>
        </div>
        <div class="footer">
            <div class="signatures">
                <div>
                    <p>Dr. John Doe</p>
                    <p>Medical Officer</p>
                </div>
                <div>
                    <p>Ms. Jane Smith</p>
                    <p>Coordinator</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
