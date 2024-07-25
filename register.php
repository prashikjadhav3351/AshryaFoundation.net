<?php
session_start();
$username = "Neural";
$server = "localhost";
$password = "AshrayaFoundation";
$db = "Ashraya";

$con = mysqli_connect($server, $username, $password, $db);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

function generateRegistrationNumber() {
    return 'REG' . strtoupper(bin2hex(random_bytes(5)));
}

function validateEmail($email) {
    // Define the regular expression for a valid email address
    $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    // Validate the email address using preg_match
    return preg_match($pattern, $email) === 1;
}

// Function to validate password
function validatePassword($password) {
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['employment'] == 'Yes' && $_POST['std'] == 'Yes') {
        $username = $_POST['email'];
        $password = $_POST['pw'];
        
        if (empty($username) || empty($password)) {
            header("Location: reglog.php?error=Email and password are required#register");
            exit();
        }

        // if (!validateEmail($username)) {
        //     header("Location: reglog.php?validate_msg=Invalid email entered#register");
        //     exit();
        // }

        // if (!validatePassword($password)) {
        //     header("Location: reglog.php?validate_msg=Password should be 8 characters with one uppercase, one lowercase, and one number#register");
        //     exit();
        // }

        // $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $registration_number = generateRegistrationNumber();

        $sql = "INSERT INTO users (email, password, registration_number) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, 'sss', $username, $password, $registration_number);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['email'] = $username;
            $_SESSION['registration_number'] = $registration_number;
            mysqli_stmt_close($stmt);
            header("Location: build_profile.php");
            exit();
        } else {
            header("Location: reglog.php?error=Email already exists.#register");
        }
    } else {
        header("Location: reglog.php?error=Could not register.#register");
    }
}

mysqli_close($con);
?>
