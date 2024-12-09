<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'connection.php'; // Include your database configuration
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['submit'])) {
    // Sanitize and assign form data
    $fullName = htmlspecialchars($_POST['fullName'], ENT_QUOTES);
    $phone = htmlspecialchars($_POST['phn'], ENT_QUOTES);
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
    $subject = htmlspecialchars($_POST['subject'], ENT_QUOTES);
    $message = htmlspecialchars($_POST['message'], ENT_QUOTES);

    // Retrieve the registered user's email from the database
    $query = "SELECT * FROM donordata WHERE email = ?"; // Fetch all columns for additional data
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the user details
        $row = $result->fetch_assoc();
        $userEmail = $row['email'];
        $username = $row['username']; // Assuming 'username' exists in the table

        // Send email using PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = 0; // Use 0 for production
            $mail->isSMTP(); // Send using SMTP
            $mail->Host       = 'smtp.gmail.com'; // Set the SMTP server to send through
            $mail->SMTPAuth   = true; // Enable SMTP authentication
            $mail->Username   = 'maitripatel0761@gmail.com'; // Your email address
            $mail->Password   = 'qzedxepmdaryvclw'; // App-specific password (2FA required) qzed xepm dary vclw
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
            $mail->Port       = 587; // TCP port for TLS

            // Recipients
            $mail->setFrom('maitripatel0761@gmail.com', 'Maitri'); // Sender's email address
            $mail->addAddress($userEmail, $username); // Send to the user fetched from DB

            // Email content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = "
                <h4>Message: $message</h4>";
            $mail->AltBody = "Full Name: $fullName\nPhone Number: $phone\nEmail: $email\nSubject: $subject\nMessage: $message";

            // Send the email
            if ($mail->send()) {
                $_SESSION['status'] = "Email successfully sent to $userEmail.";
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit(0);
            } else {
                $_SESSION['status'] = "Email could not be sent. Error: {$mail->ErrorInfo}";
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit(0);
            }
        } catch (Exception $e) {
            // Handle errors
            $_SESSION['status'] = "Mailer Error: {$mail->ErrorInfo}";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit(0);
        }

    } else {
        // If no user found with the provided email
        $_SESSION['status'] = "No user found with the provided email.";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit(0);
    }
} else {
    header('Location: index.php');
    exit(0);
}
?>
