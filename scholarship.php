
<?php

session_start();
// Database connection//
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

// Check if the registration number is provided
if (!isset($_GET['registration_number'])) {
    die("Registration number not provided");
}

$registration_number = $_GET['registration_number'];
$scholarship_amount = $_POST['scholarship_amt'];

$sql = "UPDATE studentdetails SET scholarship_amt='$scholarship_amount' WHERE registration_number='$registration_number'";

if (mysqli_query($conn, $sql)) {
    // Redirect back to the dashboard or any other page after updating the profile
    
    header("Location: admin_dashboard.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);

?>