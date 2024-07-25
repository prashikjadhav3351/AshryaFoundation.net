<?php
require('fpdf.php');
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

$registration_number = $_SESSION['registration_number']; 
$reg_sql = "SELECT Marksheet FROM studentdetails WHERE registration_number = '$registration_number'";
$reg_result = mysqli_query($conn, $reg_sql);

if ($reg_result && mysqli_num_rows($reg_result) > 0) {
    $reg_row = mysqli_fetch_assoc($reg_result);
    $marksheet_path = $reg_row['Marksheet'];

    // Check if the file exists
    if (file_exists($marksheet_path)) {
        // Set appropriate headers for PDF file
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . basename($marksheet_path) . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');

        // Output the PDF file
        readfile($marksheet_path);
     } else {
        echo "Marksheet PDF not found.";
    }
} else {
    exit("Error fetching Marksheet details: " . mysqli_error($conn));
}
?>
