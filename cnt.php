<?php
session_start();
$username="Neural";
$server="localhost";
$password="AshrayaFoundation";
$db="Ashraya";

$con = mysqli_connect($server, $username, $password, $db);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['Contact'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $form_type = $_POST['form_type'];

    $sql = "INSERT INTO contacts (name, phone, email, message) VALUES ('$name', '$phone', '$email', '$message')";

    if ($con->query($sql) === TRUE) {
        // Success
        if ($form_type == 'contact') {
            header("Location: contact_us.php?status=success");
        } elseif ($form_type == 'enquiry') {
            header("Location: index.php?status=success#enquiry");
        }
    } else {
        // Error
        if ($form_type == 'contact') {
            header("Location: contact_us.php?status=error");
        } elseif ($form_type == 'enquiry') {
            header("Location: index.php?status=error#enquiry");
        }
    }

    $con->close();
}
?>
