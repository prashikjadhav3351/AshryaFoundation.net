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

// SQL query to fetch messages in descending order by timestamp (latest last)
$sql = "SELECT name, email, message, timestamp FROM messages ORDER BY timestamp ASC"; // ASC for oldest first, DESC for latest first
$result = $con->query($sql);

$messages = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
    // Encode messages array to JSON and output
    echo json_encode($messages);
} else {
    echo "No messages found.";
}

// Close connection
$con->close();
?>
