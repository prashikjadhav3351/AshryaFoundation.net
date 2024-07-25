<?php
// Enable error reporting for debugging
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// Database connection details
$username = "Neural";
$server = "localhost";
$password = "AshrayaFoundation";
$db = "Ashraya";

// Database connection
$conn = mysqli_connect($server, $username, $password, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

require '/home/gle5coacc71n/public_html/PHPMailer-master/src/Exception.php';
require '/home/gle5coacc71n/public_html/PHPMailer-master/src/PHPMailer.php';
require '/home/gle5coacc71n/public_html/PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Function to send OTP email
function sendOtpEmail($email, $otp) {
    $subject = "Password Reset OTP";
    $message = "Your OTP for password reset is: $otp";

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->SMTPDebug = 0;  // Enable verbose debug output
        $mail->isSMTP();
        $mail->Host = 'ashrayafoundation.net';
        $mail->SMTPAuth = true;
        $mail->Username = '_mainaccount@ashrayafoundation.net';
        $mail->Password = 'Foundation@123$';  
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Recipients
        $mail->setFrom('_mainaccount@ashrayafoundation.net', 'Ashraya Foundation');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = nl2br($message);
        $mail->AltBody = $message;

        // Send email
        if($mail->send()){
        // return "An email has been sent to your email address with the OTP to reset your password.";
        header("Location:reset_password.php?status=otp sent");
            
        }
        else{
            header("Location:forgot_password.php?err=Invalid request.");
        }
    } catch (Exception $e) {
        header("Location:forgot_password.php?err=Invalid request.");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Generate a unique OTP
        $otp = rand(100000, 999999);

        // Store the OTP in the database
        $stmt = $conn->prepare("UPDATE users SET otp = ?, otp_expiration = DATE_ADD(NOW(), INTERVAL 10 MINUTE) WHERE email = ?");
        $stmt->bind_param("ss", $otp, $email);
        $stmt->execute();

        // Send the OTP email
        echo sendOtpEmail($email, $otp);
    } else {
        
        header("Location:forgot_password.php?err=No account found with that email address.");
    }
} else {
    
    header("Location:forgot_password.php?err=Invalid request.");
}

// Close the database connection
mysqli_close($conn);
?>
