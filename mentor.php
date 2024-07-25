<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AshrayaFoundation.net</title>
    <link rel="shortcut icon" href="./fv2.jpg" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/fav.jpg">
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
    height: 140%; /* Maintain aspect ratio */
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
                        <a href="index.php">
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
                            </li>
                         
                            
                             <li class="nav-item">
                                <a class="nav-link" href="donation.html"><b>Donate Now</b></a>
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
    <br>
    <br>
            <div  <div class="" style="background-color: #edf1f5; display: flex; text-align: center;">
        <div class="" style=" margin-left: 10px; font-size: 20px;">

    <center>
 <p style="">
     Are you passionate about making a difference in the lives of our students? We invite you to join us as a mentor. We are seeking professionals to assist our students in their academic and vocational pursuits. Please share your area of expertise and how you propose to mentor a student. Additionally, let us know your preferred time for mentoring sessions, whether it be weekdays, weekends, mornings, afternoons, or evenings. Your guidance can help shape the future of these young individuals, empowering them to achieve their dreams and become role models in their communities
     
 </p>
 </center>
 </div>
 </div>
  
<section class="text-gray-600 body-font relative">
    <div class="container px-5 py-24 mx-auto">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <h1 class="text-3xl text-center font-medium mb-4 text-gray-900"><br>Mentor Application Form</h1>
    
                <form action="mntr.php" method="post" name="formdata">

                    <div class="mb-4">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter full name">
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="form-label">Contact no.</label>
                        <input type="text" id="Contact" name="Contact" class="form-control" placeholder="Enter contact no.">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter email id">
                    </div>
    <div class="mb-4">
                        <label for="address" class="form-label">Address</label>
                        <input type="address" id="address" name="address" class="form-control" placeholder="Enter Your Address">
                    </div>
                    <!--<div class="mb-4">-->
                    <!--    <label for="field" class="form-label">Field Of Expertise</label>-->
                    <!--    <select id="field" name="field" class="form-control" onchange="toggleOtherField()">-->
                    <!--        <option value="" disabled selected>Select your expertise</option>-->
                    <!--        <option value="Technology">Technology</option>-->
                    <!--        <option value="Science">Science</option>-->
                    <!--        <option value="Engineering">Engineering</option>-->
                    <!--        <option value="Mathematics">Mathematics</option>-->
                    <!--        <option value="Arts">Arts</option>-->
                    <!--        <option value="Business">Business</option>-->
                    <!--        <option value="Education">Education</option>-->
                    <!--        <option value="Health">Health</option>-->
                    <!--        <option value="Finance">Finance</option>-->
                    <!--        <option value="Marketing">Marketing</option>-->
                    <!--        <option value="Law">Law</option>-->
                    <!--        <option value="Social Work">Social Work</option>-->
                    <!--        <option value="Other">Other</option>-->
                    <!--    </select>-->
                    <!--</div>-->
                    
                    






<style>
     /*.custom-container {*/
     /*       max-width: 600px;*/
     /*       margin: 0 auto;*/
     /*       background-color: #f9f9f9;*/
     /*       padding: 20px;*/
     /*       border-radius: 8px;*/
     /*       box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);*/
     /*   }*/
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
        }
        .checkbox-container {
            margin-top: 8px;
            position: relative;
        }
        .dropdown-checkboxes {
            display: none;
            position: absolute;
            z-index: 1000;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            max-height: 200px;
            overflow-y: auto;
            overflow-x: hidden;
        }
        .dropdown-checkboxes.show {
            display: block;
        }
        .dropdown-checkboxes label {
            display: block;
            padding: 5px 10px;
            cursor: pointer;
        }
        .dropdown-checkboxes label:hover {
            background-color: #f0f0f0;
        }
        .input-container {
            margin-top: 8px;
            display: none;
        }
        .input-container.show {
            display: block;
        }
</style>

<div class="custom-container">
    <!--<h2>Field of Expertise</h2>-->
    <div class="form-group">
        <label for="selected-expertise" class="form-label">Select your expertise:</label>
        <div class="checkbox-container">
            <input type="text" id="selected-expertise" class="form-control" placeholder="Select expertise" readonly>
            <div class="dropdown-checkboxes" id="dropdown-checkboxes">
                <label><input type="checkbox" name="expertise" value="Science"> Science</label>
                <label><input type="checkbox" name="expertise" value="Commerce"> Commerce</label>
                <label><input type="checkbox" name="expertise" value="Banking"> Banking</label>
                <label><input type="checkbox" name="expertise" value="Insurance"> Insurance</label>
                <label><input type="checkbox" name="expertise" value="Finance"> Finance</label>
                <label><input type="checkbox" name="expertise" value="Economics"> Economics</label>
                <label><input type="checkbox" name="expertise" value="Psychology"> Psychology</label>
                <label><input type="checkbox" name="expertise" value="Sociology"> Sociology</label>
                <label><input type="checkbox" name="expertise" value="Physics"> Physics</label>
                <label><input type="checkbox" name="expertise" value="Chemistry"> Chemistry</label>
                <label><input type="checkbox" name="expertise" value="Maths"> Maths</label>
                <label><input type="checkbox" name="expertise" value="Biology"> Biology</label>
                <label><input type="checkbox" name="expertise" value="Computer Science"> Computer Science</label>
                <label><input type="checkbox" name="expertise" value="Hospitality"> Hospitality</label>
                <label><input type="checkbox" name="expertise" value="Marketing"> Marketing</label>
                <label><input type="checkbox" name="expertise" value="Mass Communication"> Mass Communication</label>
                <label><input type="checkbox" name="expertise" value="Personality Development Programs"> Personality Development Programs</label>
                <label><input type="checkbox" name="expertise" value="Law"> Law</label>
                <label><input type="checkbox" name="expertise" value="Job Placements"> Job Placements</label>
                <label><input type="checkbox" name="expertise" value="Engineering"> Engineering</label>
                <label><input type="checkbox" name="expertise" value="Medicine"> Medicine</label>
                <label><input type="checkbox" name="expertise" value="Environmental Science"> Environmental Science</label>
                <label><input type="checkbox" name="expertise" value="Education"> Education</label>
                <label><input type="checkbox" name="expertise" value="Arts"> Arts</label>
                <label><input type="checkbox" name="expertise" value="Music"> Music</label>
                <label><input type="checkbox" name="expertise" value="History"> History</label>
                <label><input type="checkbox" name="expertise" value="Geography"> Geography</label>
                <label><input type="checkbox" name="expertise" value="Political Science"> Political Science</label>
                <label><input type="checkbox" name="expertise" value="Philosophy"> Philosophy</label>
                <label><input type="checkbox" name="expertise" value="Religious Studies"> Religious Studies</label>
                <label><input type="checkbox" name="expertise" value="Culinary Arts"> Culinary Arts</label>
                <label><input type="checkbox" name="expertise" value="Graphic Design"> Graphic Design</label>
                <label><input type="checkbox" name="expertise" value="Animation"> Animation</label>
                <label><input type="checkbox" name="expertise" value="Photography"> Photography</label>
                <label><input type="checkbox" name="expertise" value="Film Studies"> Film Studies</label>
                <label><input type="checkbox" name="expertise" value="Theater"> Theater</label>
                <label><input type="checkbox" name="expertise" value="Literature"> Literature</label>
                <label><input type="checkbox" name="expertise" value="Languages"> Languages</label>
                <label><input type="checkbox" name="expertise" value="Public Relations"> Public Relations</label>
                <label><input type="checkbox" name="expertise" value="Human Resources"> Human Resources</label>
                <label><input type="checkbox" name="expertise" value="Supply Chain Management"> Supply Chain Management</label>
                <label><input type="checkbox" name="expertise" value="Project Management"> Project Management</label>
                <label><input type="checkbox" name="expertise" value="Entrepreneurship"> Entrepreneurship</label>
                <label><input type="checkbox" name="expertise" value="Real Estate"> Real Estate</label>
                <label><input type="checkbox" name="expertise" value="Agriculture"> Agriculture</label>
                <label><input type="checkbox" name="expertise" value="Veterinary Science"> Veterinary Science</label>
                <label><input type="checkbox" name="expertise" value="Astronomy"> Astronomy</label>
                <label><input type="checkbox" name="expertise" value="Data Science"> Data Science</label>
                <label><input type="checkbox" name="expertise" value="Artificial Intelligence"> Artificial Intelligence</label>
                <label><input type="checkbox" name="expertise" value="Cybersecurity"> Cybersecurity</label>
                <label><input type="checkbox" name="expertise" value="Blockchain"> Blockchain</label>
                <label><input type="checkbox" name="expertise" value="Robotics"> Robotics</label>
                <label><input type="checkbox" name="expertise" value="Nanotechnology"> Nanotechnology</label>
                <label><input type="checkbox" name="expertise" value="Genetics"> Genetics</label>
                <label><input type="checkbox" name="expertise" value="Bioinformatics"> Bioinformatics</label>
                <label><input type="checkbox" name="expertise" value="Health Administration"> Health Administration</label>
                <label><input type="checkbox" name="expertise" value="Sports Management"> Sports Management</label>
                <label><input type="checkbox" name="expertise" value="Tourism Management"> Tourism Management</label>
                <label><input type="checkbox" name="expertise" value="Event Management"> Event Management</label>
                <label><input type="checkbox" name="expertise" value="Urban Planning"> Urban Planning</label>
                <label><input type="checkbox" name="expertise" value="Library Science"> Library Science</label>
                <label><input type="checkbox" name="expertise" value="Interior Design"> Interior Design</label>
                <label><input type="checkbox" name="expertise" value="Fashion Design"> Fashion Design</label>
                <label><input type="checkbox" name="expertise" value="Textile Engineering"> Textile Engineering</label>
                <label><input type="checkbox" name="expertise" value="Forestry"> Forestry</label>
                <label><input type="checkbox" name="expertise" value="Marine Biology"> Marine Biology</label>
                <label><input type="checkbox" name="expertise" value="Zoology"> Zoology</label>
                <label><input type="checkbox" name="expertise" value="Archaeology"> Archaeology</label>
                <label><input type="checkbox" name="expertise" value="Museum Studies"> Museum Studies</label>
                <label><input type="checkbox" name="expertise" value="Anthropology"> Anthropology</label>
                <label><input type="checkbox" name="expertise" value="Criminology"> Criminology</label>
                <label><input type="checkbox" name="expertise" value="Forensic Science"> Forensic Science</label>
                <label><input type="checkbox" name="expertise" value="Social Work"> Social Work</label>
                <label><input type="checkbox" name="expertise" value="Public Health"> Public Health</label>
                <label><input type="checkbox" name="expertise" value="Epidemiology"> Epidemiology</label>
                <label><input type="checkbox" name="expertise" value="Occupational Therapy"> Occupational Therapy</label>
                <label><input type="checkbox" name="expertise" value="Physiotherapy"> Physiotherapy</label>
                <label><input type="checkbox" name="expertise" value="Nutrition"> Nutrition</label>
                <label><input type="checkbox" name="expertise" value="Speech Therapy"> Speech Therapy</label>
                <label><input type="checkbox" name="expertise" value="Radiology"> Radiology</label>
                <label><input type="checkbox" name="expertise" value="Dentistry"> Dentistry</label>
                <label><input type="checkbox" name="expertise" value="Pediatrics"> Pediatrics</label>
                <label><input type="checkbox" name="expertise" value="Geriatrics"> Geriatrics</label>
                <label><input type="checkbox" name="expertise" value="Cardiology"> Cardiology</label>
                <label><input type="checkbox" name="expertise" value="Oncology"> Oncology</label>
                <label><input type="checkbox" name="expertise" value="Neurology"> Neurology</label>
                <label><input type="checkbox" name="expertise" value="Psychiatry"> Psychiatry</label>
                <label><input type="checkbox" name="expertise" value="Dermatology"> Dermatology</label>
                <label><input type="checkbox" name="expertise" value="Endocrinology"> Endocrinology</label>
            </div>
        </div>
    </div>

        <input type="hidden" id="concatenated_exp" name="exp">

    

    <script>
    
        document.addEventListener("DOMContentLoaded", function() {
            var selectedExpertise = document.getElementById("selected-expertise");
            var dropdownCheckboxes = document.getElementById("dropdown-checkboxes");
            var otherFieldContainer = document.getElementById("other-field-container");

            selectedExpertise.addEventListener("click", function() {
                dropdownCheckboxes.classList.toggle("show");
            });

            

            

            document.addEventListener("click", function(event) {
                if (!dropdownCheckboxes.contains(event.target) && event.target !== selectedExpertise) {
                    dropdownCheckboxes.classList.remove("show");
                }
            });
        });
        
        
         document.addEventListener('DOMContentLoaded', () => {
            const checkboxes = document.querySelectorAll('input[name="expertise"]');
            const concatenatedExpInput = document.getElementById('concatenated_exp');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', () => {
                    const selectedValues = Array.from(checkboxes)
                        .filter(checkbox => checkbox.checked)
                        .map(checkbox => checkbox.value)
                        .join(', ');
                    
                    concatenatedExpInput.value = selectedValues;
                    document.getElementById('selected-expertise').value = selectedValues;
                });
            });
        });
    </script>     <div class="mb-4">
                        <label for="experience" class="form-label">Years Of Experience</label>
                        <input type="number" id="experience" name="experience" class="form-control"
                            placeholder="Enter years of experience">
                    </div>
                    
                    
                     <div class="mb-4">
                        <label for="date" class="form-label">convenient time for mentoring</label>
                        <input type="date" id="date" name="date" class="form-control"
                            placeholder="Convenient time for mentoring">
                    </div>
                    

                    <div class="mb-4">
                        <label for="bio" class="form-label">Short Bio</label>
                        <textarea id="bio" name="bio" class="form-control" rows="4"
                            placeholder="Enter bio"></textarea>
                    </div>
                    
                    <?php if (isset($_GET['msg'])) { ?>
                        <p class="not-eligible"><?php echo $_GET['msg']; ?></p>
                    <?php } ?>
                    
                    <div class="mb-4">
                        <button class="btn btn-success w-100" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


    <script>
        <?php
        if (isset($_SESSION['message_saved']) && $_SESSION['message_saved']) {
            unset($_SESSION['message_saved']); // Unset session variable
            ?>
            // Show a popup or alert
            alert("Thank you! Your message has been successfully saved.");
        <?php } ?>
    </script>

  

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
                    <div class="col-md-4 col-sm-12" style="color: white;">
                        <h2 style="color: white;">Talk to Us</h2>
                        <div class="contact-info" style="margin-bottom: 15px;">
                            <i class="fas fa-envelope" style="margin-right: 10px;"></i>
                            <a href="mailto:ashraya7514@gmail.com" style="color: white; text-decoration: none;">ashraya7514@gmail.com</a>
                        </div>
                        <div class="contact-info" style="margin-bottom: 15px;">
                            <i class="fas fa-phone" style="margin-right: 10px;"></i>
                            <a href="tel:+919821302280" style="color: white; text-decoration: none;">+91 9821302280</a><br>
                            <i class="fas fa-phone" style="margin-right: 10px;"></i>
                            <a href="tel:+919322244292" style="color: white; text-decoration: none;">+91 9322244292</a>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12 map-img">
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

                    <div class="col-md-3 col-sm-12 map-img">
                        <h2>Donation Details:</h2>
                        <address class="md-margin-bottom-40">
                           
                            <!-- +91 9821302280 / 9322244292<br> -->
                            <!-- ashraya7414@gmail.com <br> -->
                            <!-- BRANCH: www.ashrayafoundation.net<br> -->
                            Section 80G of the Income Tax Act, 1961, allows donors to claim deductions on donations made
                            to
                            eligible charitable organizations .
                            <br>
                            <br>
                          
                          <a href="donation.html"> <button onclick="scrollToSection('enq')"
                                style="background-color:#5cc982; width: 140px; height: 40px; border-radius: 15px; cursor: pointer;" >
                                
                                Donate Now!
                            </button>
                            </a>
                        </address>
                    </div>
                    
                </div>
            </div>

<script>
        function scrollToSection(className) {
            var elements = document.getElementsByClassName(className);
            if (elements.length > 0) {
                elements[0].scrollIntoView({ behavior: 'smooth' });
            } else {
                console.error('No elements with class ' + className + ' found.');
            }
        }
    </script>

        </footer>
        <div class="copy">
            <style>
                @media screen and (max-width: 767px) {
                    .copy {
                        /* margin-left: 25px; */
                    }
                }
            </style>
            <div class="container" style="justify-content:center;">
                <a href="https://www.ashrayafoundation.net/">2023 &copy; All Rights Reserved | Designed and Developed by Neural TechSoft</a>

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