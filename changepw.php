<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are filled
    if (isset($_POST["currentpass"]) && isset($_POST["newpass"]) && isset($_POST["confirmpass"])) {
        // Retrieve form data
        $currentPass = $_POST["currentpass"];
        $newPass = $_POST["newpass"];
        $confirmPass = $_POST["confirmpass"];

        // Retrieve current user's username from session
        if (isset($_SESSION["email"])) {
            $username = $_SESSION["email"];

            // Connect to the database (replace with your database credentials)
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

            // Validate current password against database
            $sql = "SELECT password FROM users WHERE email = '$username'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);
                    $hashedPassword = $row["password"];

                    // Verify current password
                    if (password_verify($currentPass, $hashedPassword)) {
                        // Check if new password and confirm password match
                        if ($newPass === $confirmPass) {
                            // Hash the new password
                            $hashedNewPass = password_hash($newPass, PASSWORD_DEFAULT);

                            // Update password in the database
                            $updateSql = "UPDATE users SET password = '$hashedNewPass' WHERE email = '$username'";
                            if (mysqli_query($conn, $updateSql)) {
                                echo "Password updated successfully.";
                            } else {
                                echo "Error updating password: " . mysqli_error($conn);
                            }
                        } else {
                            echo "New password and confirm password don't match.";
                        }
                    } else {
                        echo "Current password is incorrect.";
                    }
                } else {
                    echo "User not found.";
                }
            } 
            
            
            else {
                echo "Error: " . mysqli_error($conn);
            }

            mysqli_close($conn);
        } else {
            echo "Session username not set.";
        }
    } else {
        echo "Please fill in all fields.";
    }
}
?>
