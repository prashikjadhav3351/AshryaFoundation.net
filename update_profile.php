<?php
session_start();

// Database connection parameters

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

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Fetch registration_number from session
$registration_number = $_SESSION['registration_number'];

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];

// Update user profile data in the database
$update_sql = "UPDATE user_profile SET name='$name', email='$email', address='$address', phone='$phone', dob='$dob' WHERE registration_number='$registration_number'";
if (mysqli_query($conn, $update_sql)) {
    // Redirect back to the dashboard
    header("Location: dashboard.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
