<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="reglog.css">
    <title>Forgot Password</title>
</head>
<body>
    <div class="wrapper">
        <div class="form-box">
            <div class="login-container">
                <div class="top">
                    <span>Remembered your password? <a href="#" onclick="login()">Login</a></span>
                    <header>Forgot Password</header>
                </div>
                <form action="process_forgot_password.php" method="post" id="forgot-password-form">
                    <div class="input-box">
                        <input type="email" class="input-field" placeholder="Enter Your Email" id="email" name="email" required>
                        <i class="bx bx-envelope"></i>
                    </div>
                    
                    <?php if (isset($_GET['err'])) { ?>
                        <div id="error-message" style="color: yellow;"><?php echo $_GET['err']; ?></div>
                    <?php } elseif (isset($_GET['status'])) { ?>
                        <div id="error-message" style="color: green;"><?php echo $_GET['status']; ?></div>
                    <?php } ?>
                    
                    <div class="input-box">
                        <input type="submit" class="submit" value="Reset Password">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function login() {
            window.location.href = 'reglog.php'; // Adjust this path to your login page
        }
    </script>
</body>
</html>
