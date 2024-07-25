<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
   
$username="Neural";
$server="localhost";
$password="AshrayaFoundation";
$db="Ashraya";


$conn=mysqli_connect($server,$username,$password,$db);
if(!$conn){
    die ("connection not done".mysqli_connect_error);
}
else{
    // echo("database connected succesfully <br>");
}
    // Insert event into the database
    $sql = "INSERT INTO events (title, description, date) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $title, $description, $date);
    if (mysqli_stmt_execute($stmt)) {
        // echo "Event created successfully.";
        header("Location:admin_dashboard.php?status=success");
    } else {
        // echo "Error: " . mysqli_error($conn);
        header("Location:admin_dashboard.php?status=could not be created");
    }

    // Close the connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    // echo "Invalid request method.";
    header("Location:admin_dashboard.php?status=some error occured");
}
?>
