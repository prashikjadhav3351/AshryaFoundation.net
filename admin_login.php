<?php
session_start();

if(isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_dashboard.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check admin credentials
    $admin_username = "admin";
    $admin_password = "123"; 
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    if($input_username === $admin_username && $input_password === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error_message = "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            width: 350px;
            border: none;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.2);
            background-color: #ffffff;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            padding: 20px 0;
            font-size: 1.5rem;
        }

        .card-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .text-danger {
            margin-top: 10px;
            color: #dc3545;
            text-align: center;
        }

        /* Additional Styles */
        .card {
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Admin Login
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <?php if(isset($error_message)): ?>
                        <div class="text-danger"><?php echo $error_message; ?></div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

