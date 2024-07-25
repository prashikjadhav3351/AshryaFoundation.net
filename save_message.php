<?php
session_start();

// Database connection credentials
$server = "localhost";
$username = "Neural"; // Replace with your actual database username
$password = "AshrayaFoundation"; // Replace with your actual database password
$dbname = "Ashraya"; // Replace with your actual database name

// Create connection
$con = new mysqli($server, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and retrieve POST data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare SQL statement
    $stmt = $con->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");

    // Bind parameters and execute the statement
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        echo "Message saved!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $con->close();
} else {
    // If not a POST request, return an error (optional)
    echo "Error: POST method expected.";
}
?>

