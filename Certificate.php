<?php
require('fpdf/fpdf.php'); // Include the FPDF library

include("connection.php");

// Check if email is provided
if (isset($_GET['email'])) {
    $email = $_GET['email'];

    // Fetch user data from the database
    $query = "SELECT * FROM `donordata` WHERE email='$email'";
    $data = mysqli_query($conn, $query);
    $res = mysqli_fetch_assoc($data);
    
    $name = $res['username'];      // Fetch name
    $donation_date = $res['DonationDate'];  // Fetch donation date

    // Set static camp name
    $camp_name = "Annual Blood Donation Camp";  // Static value

    // Calculate the difference between the current date and donation date
    $current_date = new DateTime(); // Get current date
    $donation_date_obj = new DateTime($donation_date); // Convert donation date to DateTime object
    
    // Calculate the difference in days
    $date_diff = $current_date->diff($donation_date_obj)->days;

    // Check if at least 2 days have passed
    if ($date_diff >= 2) {
        // Create instance of FPDF
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        // Title
        $pdf->Cell(0, 10, 'Certificate of Blood Donation', 0, 1, 'C');
        $pdf->Ln(10);

        // Certificate content
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'This is to certify that', 0, 1, 'C');
        $pdf->Ln(10);

        // Name
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 10, htmlspecialchars($name), 0, 1, 'C');
        $pdf->Ln(10);

        // Donation details
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'has generously donated blood during the', 0, 1, 'C');
        $pdf->Ln(10);

        // Camp Name
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 10, htmlspecialchars($camp_name), 0, 1, 'C');
        $pdf->Ln(10);

        // Donation Date
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'on', 0, 1, 'C');
        $pdf->Ln(10);

        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 10, date('F d, Y', strtotime(htmlspecialchars($donation_date))), 0, 1, 'C');
        $pdf->Ln(20);

        // Signature
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'We express our heartfelt gratitude and appreciation for this noble act of saving lives.', 0, 1, 'C');
        $pdf->Ln(20);
        $pdf->Cell(0, 10, '_________________________', 0, 1, 'R');
        $pdf->Cell(0, 10, 'Authorized Signature', 0, 1, 'R');

        // Output the PDF to the browser
        $filename = 'certificate_' . time() . '.pdf';
        $pdf->Output('I', $filename); // Display the PDF inline in the browser

    } else {
        // Inform the user with an alert box and redirect
        echo "<script>
                alert('You can download the certificate only after two days from the donation date.');
                window.location.href = 'UserProf.php'; // Redirect to UserProf.php
              </script>";
    }


} else {
    // Redirect or handle the case where email is not provided
    echo "<script>
            alert('Email parameter missing.');
            window.location.href = 'UserProf.php'; // Redirect to UserProf.php
          </script>";
}
?>