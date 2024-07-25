<?php
// Database connection parameters
$servername = "localhost";
$username = "Neural";
$password = "AshrayaFoundation";
$dbname = "Ashraya";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data and insert into database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data to prevent SQL injection
    $name = $conn->real_escape_string($_POST['name']);
    $contact = $conn->real_escape_string($_POST['Contact']);
    $email = $conn->real_escape_string($_POST['email']);
    $address = $conn->real_escape_string($_POST['address']);
    $expertise = $conn->real_escape_string($_POST['exp']);
    $other_expertise = isset($_POST['other-expertise']) ? $conn->real_escape_string($_POST['other-expertise']) : '';
    $mentor_desc = $conn->real_escape_string($_POST['experience']);
    $preferred_time = $conn->real_escape_string($_POST['date']);
    $short_bio = $conn->real_escape_string($_POST['bio']);

    // SQL query to insert mentor application data into database
    $sql = "INSERT INTO mentor_applications (name, contact, email, address, expertise, other_expertise, mentor_desc, preferred_time, short_bio)
            VALUES ('$name', '$contact', '$email', '$address', '$expertise', '$other_expertise', '$mentor_desc', '$preferred_time', '$short_bio')";

 if ($conn->query($sql) === TRUE) {
        echo '<script type="text/javascript">';
        echo 'alert("Mentor application submitted successfully.");';
        echo 'window.location.href = "mentor.php";'; // Redirect to a thank you page or home page
        echo '</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
