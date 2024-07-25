<?php

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

$registration_number = $_GET['registration_number'];
$msg = $_POST['pmsg'];

$sql = "UPDATE user_profile SET msg='$msg' WHERE registration_number='$registration_number'";

if (mysqli_query($conn, $sql)) {
    // Redirect back to the dashboard or any other page after updating the profile
    
    header("Location: admin_dashboard.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);

?>