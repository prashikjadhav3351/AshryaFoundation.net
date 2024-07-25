<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="reglog.css">
    <title>Reset Password</title>
</head>
<body>
    <div class="wrapper">
        <div class="form-box">
            <div class="login-container">
                <div class="top">
                    <header>Reset Password</header>
                </div>
                <form action="process_reset_password.php" method="post" id="reset-password-form">
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Enter OTP" id="otp" name="otp" required>
                        <i class="bx bx-key"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" class="input-field" placeholder="Enter New Password" id="new-password" name="new_password" required>
                        <i class="bx bx-lock-alt"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" class="input-field" placeholder="Confirm New Password" id="confirm-password" name="confirm_password" required>
                        <i class="bx bx-lock-alt"></i>
                    </div>
                    <div class="input-box">
                        <input type="submit" class="submit" value="Reset Password">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
