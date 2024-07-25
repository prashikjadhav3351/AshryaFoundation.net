<?php

// Database configuration
define('DB_HOST', 'your_db_host'); // Replace with your database host
define('DB_NAME', 'your_db_name'); // Replace with your database name
define('DB_USER', 'your_db_username'); // Replace with your database username
define('DB_PASS', 'your_db_password'); // Replace with your database password

try {
    // Attempt to create a PDO instance
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // If connection fails, display error message
    die("Connection failed: " . $e->getMessage());
}

// SMTP configuration for PHPMailer
define('SMTP_HOST', 'smtp.example.com'); // Replace with your SMTP server host
define('SMTP_USERNAME', 'your_email@example.com'); // Replace with your SMTP username (typically your email)
define('SMTP_PASSWORD', 'your_email_password'); // Replace with your SMTP password
