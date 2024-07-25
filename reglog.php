<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="reglog.css">
    <title>Login & Registration</title>
</head>

<body>
    <div class="wrapper">
        <nav class="nav">
            <div class="nav-logo"></div>
            <div class="nav-menu" id="navMenu">
                <ul>
                    <li><a href="#" class="link active"></a></li>
                    <li><a href="./index.php" class="link">Home</a></li>
                </ul>
            </div>
            <div class="nav-button">
                <button class="btn white-btn" id="loginBtn" onclick="login()">Sign In</button>
                <button class="btn" id="registerBtn" onclick="register()">Sign Up</button>
            </div>
            <div class="nav-menu-btn">
                <i class="bx bx-menu" onclick="myMenuFunction()"></i>
            </div>
        </nav>

        <!-- Form box -->
        <div class="form-box">
            <!-- Login form -->
            <div class="login-container" id="login">
                <div class="top">
                    <span>Don't have an account? <a href="#" onclick="register()">Sign Up</a></span>
                    <header>Login</header>
                </div>
                <form action="./login.php" method="post" id="login-form">
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Enter Your Email" id="email" name="email">
                        <i class="bx bx-user"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" class="input-field" placeholder="Password" id="pw" name="pw">
                        <i class="bx bx-lock-alt"></i>
                    </div>
                    <div class="input-box">
                        <input type="submit" class="submit" value="Sign In">
                    </div>
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="not-eligible"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    
                     <?php if (isset($_GET['login_error_msg'])) { ?>
                        <p class="not-eligible"><?php echo $_GET['login_error_msg']; ?></p>
                    <?php } ?>
                    
                    <div class="two-col">
                        <div class="one">
                            <input type="checkbox" id="login-check">
                            <label for="login-check"> Remember Me</label>
                        </div>
                      <!-- Add this to your login form -->
<div class="two">
    <label><a href="forgot_password.php">Forgot password?</a></label>
</div>

                    </div>
                </form>
            </div>

            <!-- Registration form -->
            <div class="register-container" id="register">
                <div class="top">
                    <span>Have an account? <a href="#" onclick="login()">Login</a></span>
                    <header>Sign Up</header>
                </div>
                <form action="./register.php" method="post" id="registration-form">
                    <div class="two-forms">
                        <div class="input-bo" id="additional-fields">
                            <label style="color: white;">Either of your parents employed at Oberoi Woods?</label><br>
                            <label style="color: white;"><input type="radio" name="employment" value="Yes" required> Yes</label>
                            <label style="color: white;"><input type="radio" name="employment" value="No" required> No</label>
                        </div>
                        <div class="input-bo" id="additional-fields">
                            <label style="color: white;">Are you in std 8th or above?</label><br>
                            <label style="color: white;"><input type="radio" name="std" value="Yes" required> Yes</label>
                            <label style="color: white;"><input type="radio" name="std" value="No" required> No</label>
                        </div>
                    </div>
                    <div class="not-eligible" id="not-eligible-msg" style="color: yellow;">
                        You are not eligible! <br>
                        We are currently limited to Oberoi Woods and for students in 8th std or above only. <br>
                        Thank You!!!
                    </div>
                    <div id="other-fields">
                        <div class="input-box">
                            <input type="email" class="input-field" placeholder="Email" id="reg-email" name="email" required>
                            <i class="bx bx-envelope"></i>
                        </div>
                        <div class="input-box">
                            <input type="password" class="input-field" placeholder="Password" id="reg-pw" name="pw" required>
                            <i class="bx bx-lock-alt"></i>
                        </div>
                    </div>
                    
                    <p class="regpw-message" id="regpw-message">Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.</p>
                     <style>
            
        .regpw-message {
            color: yellow;
            display: none;
        }
    </style>
    
                      <?php if (isset($_GET['error'])) { ?>
                        <p class="not-eligible"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <div class="input-box">
                        <input type="submit" class="submit" value="Register" name="reg">
                    </div>
                  
                </form>
            </div>
        </div>
    </div>
    
   
    </style>

    <script>
    
             $(document).ready(function() {
            $('#registration-form').on('submit', function(event) {
                const password = $('#reg-pw').val();
                const errorMessage = $('#regpw-message');

                // Regular expression to check the password
                const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

                if (!regex.test(password)) {
                    errorMessage.show();
                    event.preventDefault(); // Prevent the form from submitting
                } else {
                    errorMessage.hide();
                }
            });
        });
    
    
        //  document.getElementById('reg-pw').addEventListener('input', function() {
        //     const password = this.value;
        //     const errorMessage = document.getElementById('regpw-message');

        //     // Regular expression to check the password
        //     const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

        //     if (!regex.test(password)) {
        //         errorMessage.style.display = 'block';
        //     } else {
        //         errorMessage.style.display = 'none';
        //     }
        // });
    
        $(document).ready(function () {
            $('input[name="employment"], input[name="std"]').change(function () {
                if ($('input[name="employment"]:checked').val() === 'Yes' && $('input[name="std"]:checked').val() === 'Yes') {
                    $('#other-fields').slideDown();
                    $('#not-eligible-msg').slideUp();
                } else {
                    $('#other-fields').slideUp();
                    $('#not-eligible-msg').slideDown();
                }
            });
            $('#other-fields').hide();
            $('#not-eligible-msg').hide();
        });

        $(document).ready(function () {
            $('#registration-form').submit(function () {
                if ($('input[name="employment"]:checked').val() !== 'Yes' || $('input[name="std"]:checked').val() !== 'Yes') {
                    $('#not-eligible-msg').slideDown();
                    return false; 
                }
            });
        });

        function myMenuFunction() {
            var i = document.getElementById("navMenu");
            if (i.className === "nav-menu") {
                i.className += " responsive";
            } else {
                i.className = "nav-menu";
            }
        }

        var a = document.getElementById("loginBtn");
        var b = document.getElementById("registerBtn");
        var x = document.getElementById("login");
        var y = document.getElementById("register");

        function login() {
            x.style.left = "4px";
            y.style.right = "-520px";
            a.className += " white-btn";
            b.className = "btn";
            x.style.opacity = 1;
            y.style.opacity = 0;
        }

        function register() {
            x.style.left = "-510px";
            y.style.right = "5px";
            a.className = "btn white-btn";
            b.className += " white-btn";
            x.style.opacity = 0;
            y.style.opacity = 1;
        }
    </script>
</body>

</html>
