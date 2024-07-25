    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>AshrayaFoundation.net</title>
        <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="./fv2.jpg" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/all.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/plugins/slider/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/plugins/slider/css/owl.theme.default.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    </head>

    <body>

        

        <header class="container-fluid">
            <div id="menu-jk" class="header-bottom">
                <style>
                /* Ensure logo container doesn't collapse and is aligned to the left */
    .logo {
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }

    /* Make the logo image responsive */
    .logo img {
            max-width: 140%;
        height: 14%; /* Maintain aspect ratio */
    }

    /* Adjust the fixed header properties */
    .header-top {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: #fff; /* Add background color to the fixed header if needed */
        z-index: 9999; /* Adjust the z-index as needed */
    }

    @media (max-width: 767px) {
        .header-top {
            position: fixed;
        }
    }

    .custom-link {
        background-color: rgb(107, 205, 136);
        color: rgb(9, 1, 1);
        animation: blink-animation 1s steps(2, start) infinite;
        /* Add other custom styles here */
    }

  

    /* Flexbox for the nav-row to ensure alignment */
    .nav-row {
        display: flex;
        align-items: center;
    }

    /* Adjust the navigation menu to align properly next to the logo */
    .nav-col {
        flex-grow: 1;
        display: flex;
        justify-content: flex-end;
    }

                </style>
                <div class="container">
                    <div class="row nav-row">
                        <div class="col-lg-3 col-md-12 logo">
                            <a href="<?php echo htmlspecialchars('index.php'); ?>">
                                <img src="logo/neww sizw.png" alt="Logo" height="400px" width="600px">
                            <style>
                                
                                
                            </style>

                                <a data-toggle="collapse" data-target="#menu" href="#menu"><i
                                        class="fas d-block d-lg-none small-menu fa-bars"></i></a>
                            </a>
                        </div>
                        <div id="menu" class="col-lg-9 col-md-12 d-none d-lg-block nav-col">
                            <br>
                            <ul class="navbad">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php"><b>Home</b></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about_us.html"><b>About Us</b></a>
                                </li>
                                      <!-- <li class="nav-item">
                                <a class="nav-link" href="stories.html"><b>Stories</b></a>
                            </li> -->
                     
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="gallery.html" id="galleryDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <b>Gallery</b>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="galleryDropdown">
                                    <a class="dropdown-item" href="gallery.html">Gallery</a>
                                    <a class="dropdown-item" href="stories.html">Success Stories</a>
                                
                                </div>
                                <style>
                                    .dropdown-menu {
                                        background-color: #f8f9fa;
                                        border: 1px solid #ccc;
                                    }
                                
                                    .dropdown-item:hover {
                                        background-color: #e9ecef;
                                    }
                                </style>
                                
                            </li>   

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact_us.php"><b>Contact</b></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link custom-link" href="./login.php"><b>Apply Now</b></a>
                                </li>
                             
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
                <input type="hidden" name="form_type" value="contact">
                <div class="mb-4">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" id="name" name="name" class="form-control"
                placeholder="enter full name">
                </div>

                <div class="mb-4">
                    <label for="phone" class="form-label">Contact no.</label>
                    <input type="phone" id="Contact" name="Contact" class="form-control"
                    placeholder="enter contact no.">
                </div>

                <div class="mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control"
                placeholder="enter email id">
                </div>
                <div class="mb-4">
                <label for="message" class="form-label">Message</label>
                <textarea id="message" name="message" class="form-control" rows="4"
                placeholder="enter message"></textarea>
                </div>
                <div class="mb-4">
                <button class="btn btn-success w-100" type="submit">Submit</button>
                </div>
            </form>
            
            <?php
        if (isset($_GET['status'])) {
            if ($_GET['status'] == 'success') {
                echo '<p style="color:green;">Submitted successfully!</p>';
            } else if ($_GET['status'] == 'error') {
                echo '<p style="color:red;">There was an error. Please try again.</p>';
            }
        }
        ?>
            </div>
            
            </div>
        </div>
        </div>
    </section>
    

    
    <!--<p style="font-size: 18px; text-align: center;"> <b>-->
    <!--    Address : A 2306, Oberoi Woods, Mohan Gokhale Rd, Goregaon, <br>-->
    <!--    Mumbai, Maharashtra 400063 <br>-->
    <!--    Phone:+91 9821302280 / 9322244292 <br>-->
    <!--    Email:ashraya7414@gmail.com <br>-->
    <!--    Website: www.ashrayafoundation.net-->
    <!--</b>-->
    <!--</p><br>-->
    <br> <br>   




        





        <!--  ********* Footer Starts Here ********** -->

        <footer class="footer">
            <style>
                @media screen and (max-width: 767px) {
                    .footer {
                        /* margin-left: 35px; */
                    }
                }
            </style>

            <script>
                function showqr() {
                    var imageContainer = document.querySelector('.qr');
                    if (imageContainer.style.display === 'none') {
                        imageContainer.style.display = 'block';
                    } else {
                        imageContainer.style.display = 'none';
                    }
                }
            </script>

            <script>
                function toggleImageSize() {
                    var image = document.getElementById('qr');
                    if (image.style.width === '80%') {
                        image.style.width = '100%';
                    } else {
                        image.style.width = '80%';
                    }
                }
            </script>


            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <h2>Talk to Us</h2>
                        <span><i class="fas fa-envelope"></i> <a href="mailto:ashraya7514@gmail.com"
                                style="color:orange;">ashraya7514@gmail.com</a></span>
                        <br>
                        <span><i class="fas fa-phone"></i> <a href="tel:+919821302280 ,+91 9322244292 " ,
                                style="color:orange;"> +91 9821302280 <br>
                                +91 9322244292</a></span>
                    </div>

                    <div class="col-md-3 col-sm-12 map-img">
                        <h2>Contact Us</h2>
                        <address class="md-margin-bottom-40">
                            <span><i class="fas fa-map-marker-alt"></i> Meet us here:</span><br>
                            A 2306, Oberoi Woods, Mohan Gokhale Rd, Goregaon, Mumbai, Maharashtra 400063<br>
                            <span><i class="fas fa-phone"></i> <a href="tel:+91 9821302280,">Phone: +91 9821302280 /
                                    9322244292
                            </span> </a><br>
                            <span><i class="fas fa-envelope"></i> <a href="mailto:ashraya7514@gmail.com"> Email:
                                    ashraya7414@gmail.com</span> </a><br>
                            <span><i class="fas fa-globe"></i> Website: www.ashrayafoundation.net</span><br>
                        </address>
                    </div>

                    <div class="col-md-4 col-sm-12 map-img">
                        <h2>Account Details:</h2>
                        <address class="md-margin-bottom-40">
                            For donation in directly to account<br>
                            A/c No: <br>
                            IFSC Code :<br>
                            <!-- +91 9821302280 / 9322244292<br> -->
                            <!-- ashraya7414@gmail.com <br> -->
                            <!-- BRANCH: www.ashrayafoundation.net<br> -->
                            Section 80G of the Income Tax Act, 1961, allows donors to claim deductions on donations made
                            to
                            eligible charitable organizations .
                            <br>
                            <br>
                            <button onclick="scrollToSection('enquiry')"
                                style="background-color:#5cc982; width: 140px; height: 40px; border-radius: 15px; cursor: pointer;">
                                <!-- <style>
                                    button:hover {
                                        color: white;
                                    }
                                </style> -->
                                Donate Now!
                            </button>
                        </address>
                    </div>
                </div>
            </div>


        </footer>
        <div class="copy">
            <style>
                @media screen and (max-width: 767px) {
                    .copy {
                        /* margin-left: 25px; */
                    }
                }
            </style>

        </div>

        <div class="copy">
            <style>
                @media screen and (max-width: 767px) {
                    .copy {
                        /* margin-left: 25px; */
                    }
                }
            </style>
            <div class="container">
                <a href="https://www.ashrayafoundation.net/">2023 &copy; All Rights Reserved | Designed and Developed by
                    Neural Techsoft</a>

                <span>
                    <a><i class="fab fa-github"></i></a>
                    <a><i class="fab fa-google-plus-g"></i></a>
                    <a><i class="fab fa-pinterest-p"></i></a>
                    <a><i class="fab fa-twitter"></i></a>
                    <a><i class="fab fa-facebook-f"></i></a>
                </span>
            </div>

        </div>


    </body>

    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
    <script src="assets/plugins/slider/js/owl.carousel.min.js"></script>
    <script src="assets/js/script.js"></script>

    </html>