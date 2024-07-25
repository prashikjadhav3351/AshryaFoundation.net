<?php
require('fpdf.php');
session_start();

session_start();
$username="Neural";
$server="localhost";
$password="AshrayaFoundation";
$db="Ashraya";


$conn=mysqli_connect($server,$username,$password,$db);
if(!$conn){
    die ("connection not done".mysqli_connect_error);
}
else{
    echo("database connected succesfully <br>");
}

$username = $_SESSION['email'];
$reg_sql = "SELECT Adhar FROM studentdetails 
            WHERE registration_number = (SELECT registration_number FROM users WHERE email = '$username')";
$reg_result = mysqli_query($conn, $reg_sql);

if ($reg_result && mysqli_num_rows($reg_result) > 0) {
    $reg_row = mysqli_fetch_assoc($reg_result);
    $adhar_card_path = $reg_row['Adhar'];

    // Check if the file exists
    if (file_exists($adhar_card_path)) {
        // Create PDF
        $pdf = new FPDF();
        $pdf->AddPage();

        // Add title
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->Cell(0, 10, 'Aadhaar Card Details', 0, 1, 'C');
        $pdf->Ln(10);

        // Add Aadhaar card image
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 10, 'Aadhaar Card:', 0, 1);
        $pdf->Ln(5);

        // Adjust x, y, width, and height as needed
        $pdf->Image($adhar_card_path, 10, $pdf->GetY(), 100, 0);
        $pdf->Ln(60); // Adjust the line break to provide space for the image

        // Output PDF
        $filename = "Aadhaar_Card_" . $username . ".pdf";
        $pdf->Output('I', $filename);
     } else {
        echo "Aadhaar card image not found.";
    }
} else {
    exit("Error fetching Aadhaar card details: " . mysqli_error($conn));
}
?>

