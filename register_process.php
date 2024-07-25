<?php
require_once 'database.php';
session_start();

function generateRegistrationNumber() {
    return 'REG' . strtoupper(bin2hex(random_bytes(5)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password']; // Without hashing
    $registration_number = generateRegistrationNumber();

    $sql = "INSERT INTO users (username, password, registration_number) VALUES (:username, :password, :registration_number)";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute(['username' => $username, 'password' => $password, 'registration_number' => $registration_number])) {
        $user_id = $pdo->lastInsertId();
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;
        $_SESSION['registration_number'] = $registration_number;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error: Could not register.";
    }
}
?>
