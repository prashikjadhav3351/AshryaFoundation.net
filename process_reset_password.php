<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

$username = "Neural";
$server = "localhost";
$password = "AshrayaFoundation";
$db = "Ashraya";

$con = mysqli_connect($server, $username, $password, $db);
if (!$con) {
    die("Connection not done: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $otp = $_POST['otp'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        echo "Passwords do not match.";
        exit;
    }

    // Check if the OTP is valid and not expired
    $stmt = $con->prepare("SELECT * FROM users WHERE otp = ?");
    $stmt->bind_param("s", $otp);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        
        echo "OTP is valid.";
        
        
        // Update the user's password
        // $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        
        $stmt = $con->prepare("UPDATE users SET password = ?, otp = NULL, otp_expiration = NULL WHERE otp = ?");
        $stmt->bind_param("ss", $new_password, $otp);
        $stmt->execute();

        // echo "Your password has been reset successfully.";
        header("Location:reglog.php#login");
        
    } else {
        echo "Invalid or expired OTP.";
    }
} else {
    echo "Invalid request.";
}
?>
