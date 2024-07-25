<?php
session_start();
include 'database_connection.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['pw'];

    // Replace the following with your actual query to fetch the user
    $stmt = $conn->prepare('SELECT id, email, password, registration_number FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['registration_number'] = $user['registration_number'];

        echo json_encode(['success' => true, 'redirect' => 'login.php']);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>
