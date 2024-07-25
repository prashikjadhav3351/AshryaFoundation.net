 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ashraya Foundation</title>
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,600,700" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
<header class="container-fluid">
    <div id="menu-jk" class="header-bottom">
        <div class="container">
            <div class="row nav-row">
                <div class="col-lg-3 col-md-12 logo">
                    <a href="index.php">
                        <img src="logo/neww sizw.png" alt="Logo" height="400px" width="600px">
                        <a data-toggle="collapse" data-target="#menu" href="#menu"><i class="fas d-block d-lg-none small-menu fa-bars"></i></a>
                    </a>
                </div>
                <div id="menu" class="col-lg-9 col-md-12 d-none d-lg-block nav-col">
                    <br>
                    <ul class="navbad">
                        <li class="nav-item active"><a class="nav-link" href="index.php"><b>Home</b></a></li>
                        <li class="nav-item"><a class="nav-link" href="about_us.php"><b>About Us</b></a></li>
                        <li class="nav-item"><a class="nav-link" href="stories.php"><b>Stories</b></a></li>
                        <li class="nav-item"><a class="nav-link" href="gallery.php"><b>Gallery</b></a></li>
                        <li class="nav-item"><a class="nav-link" href="contact_us.php"><b>Contact</b></a></li>
                        <li class="nav-item"><a class="nav-link custom-link" href="./login.php"><b>Apply Now</b></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="text-gray-600 body-font relative">
    <div class="container px-5 py-24 mx-auto">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <h1 class="text-3xl text-center font-medium mb-4 text-gray-900"><br>Contact Us</h1>
                <p class="text-center mb-8">Feel free to reach out to us.</p>
                <form action="./cnt.php" method="post" name="formdata">
                    <div class="mb-4">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="enter full name" required>
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="form-label">Contact no.</label>
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="enter contact no." required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="enter email id" required>
                    </div>
                    <div class="mb-4">
                        <label for="message" class="form-label">Message</label>
                        <textarea id="message" name="message" class="form-control" rows="4" placeholder="enter message" required></textarea>
                    </div>
                    <div class="mb-4">
                        <button class="btn btn-success w-100" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <h2>Talk to Us</h2>
                <span><i class="fas fa-envelope"></i> <a href="mailto:ashraya7514@gmail.com" style="color:orange;">ashraya7514@gmail.com</a></span>
                <br>
                <span><i class="fas fa-phone"></i> <a href="tel:+919821302280 ,+91 9322244292 " style="color:orange;"> +91 9821302280 <br> +91 9322244292</a></span>
            </div>
            <div class="col-md-3 col-sm-12 map-img">
                <h2>Contact Us</h2>
                <address class="md-margin-bottom-40">
                    <span><i class="fas fa-map-marker-alt"></i> Meet us here:</span><br>
                    A 2306, Oberoi Woods, Mohan Gokhale Rd, Goregaon, Mumbai, Maharashtra 400063<br>
                    <span><i class="fas fa-phone"></i> <a href="tel:+91 9821302280,">Phone: +91 9821302280 / 9322244292</span> </a><br>
                    <span><i class="fas fa-envelope"></i> <a href="mailto:ashraya7514@gmail.com"> Email: ashraya7414@gmail.com</span> </a><br>
                    <span><i class="fas fa-globe"></i> Website: www.ashrayafoundation.net</span><br>
                </address>
            </div>
            <div class="col-md-4 col-sm-12 map-img">
                <h2>Account Details:</h2>
                <address class="md-margin-bottom-40">
                    For donation in directly to account<br>
                    A/c No: <br>
                    IFSC Code :<br>
                    Section 80G of the Income Tax Act, 1961, allows donors to claim deductions on donations made to eligible charitable organizations.
                    <br>
                    <br>
                    <button onclick="scrollToSection('enquiry')" style="background-color:#5cc982; width: 140px; height: 40px; border-radius: 15px; cursor: pointer;">Donate Now!</button>
                </address>
            </div>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="scripts.js"></script>
</body>
</html>

