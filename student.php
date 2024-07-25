<?php


session_start();
$username="Neural";
$server="localhost";
$password="AshrayaFoundation";
$db="Ashraya";


$conn=mysqli_connect($server,$username,$password,$db);
if(!$conn){
    die (mysqli_connect_error);
}
else{
    // echo("database connected succesfully <br>");
}
// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: reglog.html");
    exit();
}


$username = $_SESSION['email'];
$reg_sql = "SELECT registration_number FROM users WHERE email = '$username'";
$reg_result = mysqli_query($conn, $reg_sql);

if ($reg_result && mysqli_num_rows($reg_result) > 0) {
    $reg_row = mysqli_fetch_assoc($reg_result);
    $registration_number = $reg_row['registration_number'];
    $_SESSION['registration_number'] = $registration_number; // Store registration_number in the session
} else {
    echo "Error fetching registration number: " . mysqli_error($conn);
    exit();
}

/// Get the user profile data
$profile_sql = "SELECT * FROM user_profile WHERE registration_number = '$registration_number'";
// $student="SELECT * FROM studentdetails WHERE registration_number = '$registration_number'";


$profile_result = mysqli_query($conn, $profile_sql);
// $res2=mysqli_query($conn,$student);

if ($profile_result && mysqli_num_rows($profile_result) > 0) {
    $user_profile = mysqli_fetch_assoc($profile_result);
    // $stud=mysqli_fetch_assoc($res2);
    // var_dump($user_profile);
} else {
    echo "Error fetching user profile: " . mysqli_error($conn);
    header("Location: build_profile.php?error=no_profile");
    
    exit();
}


/// Get the user profile data

$student="SELECT * FROM studentdetails WHERE registration_number = '$registration_number'";



$res2=mysqli_query($conn,$student);

if ($res2 && mysqli_num_rows($res2) > 0) {
   
    $stud=mysqli_fetch_assoc($res2);
    
} else {
    // echo "Error fetching user profile: " . mysqli_error($conn);
    // header("Location: student.php");
    // header("Location: {$_SERVER['PHP_SELF']}");
    
    // exit();
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="shortcut icon" href="./images/logo.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="logo" title="Ashraya Student">
            <img src="./Images/Add_a_subheading__1_-removebg-preview.png" alt="">
            <h2>As<span class="danger">hra</span>ya</h2>
        </div>
        <div class="navbar">
            <a href="index.html" class="active">
                <span class="material-icons-sharp">home</span>
                <h3>Home</h3>
            </a>
            <!-- <a href="timetable.html" onclick="timeTableAll()">
                <span class="material-icons-sharp">today</span>
                <h3>Time Table</h3>
            </a> -->
            <a href="exam.html">
                <span class="material-icons-sharp">grid_view</span>
                <h3>Examination</h3>
            </a>
            <a href="pw.php">
                <span class="material-icons-sharp">password</span>
                <h3>Change Password</h3>
            </a>
            <a href="#">
                <a href="./logout.php"><span class="material-icons-sharp" onclick="">logout</span>
                    <h3>Logout</h3>
                </a>
            </a>
        </div>
        <div id="profile-btn">
            <span class="material-icons-sharp">person</span>
        </div>
        <div class="theme-toggler">
            <span class="material-icons-sharp active">light_mode</span>
            <span class="material-icons-sharp">dark_mode</span>
        </div>

    </header>
    <div class="container">
        <aside>
            <div class="profile">
                <div class="top">
                    <div class="profile-photo">

                        <img src="<?php echo $user_profile['profile_picture']; ?>" alt="Profile Picture">
                    </div>
                    <div class="info">
                        <p>Hey,
                            <?php echo htmlspecialchars($user_profile['name']); ?>
                        </p>
                        <small class="text-muted">
                            <?php echo htmlspecialchars($user_profile['registration_number']); ?>
                        </small>
                    </div>
                </div>
                <div class="about">
                    <h5>Course</h5>
                    <p><?php echo isset($stud['Course_To_Be_Pursued']) ? htmlspecialchars($stud['Course_To_Be_Pursued']) : '<a class="danger" href="./sform.php">Submit form</a>'; ?></p>

                    <h5>DOB</h5>
                    <p>
                        <?php echo htmlspecialchars($user_profile['dob']); ?>
                    </p>
                    <h5>Contact</h5>
                    <p>
                        <?php echo htmlspecialchars($user_profile['phone']); ?>
                    </p>
                    <h5>Email</h5>
                    <p>
                        <?php echo htmlspecialchars($user_profile['email']); ?>
                    </p>
                    <h5>Address</h5>
                    <p>
                        <?php echo htmlspecialchars($user_profile['address']); ?>
                    </p>
                </div>
            </div>
        </aside>

        <main>
            <h1>Welcome to Ashraya</h1>
            <div class="subjects">

                <div class="eg">

                    <a href="./build_profile.php"><span class="material-icons-sharp">architecture</span>
                        <h3>Your Scholarship </h3>
                        <h2 class="success">₹ <?php echo  $stud['scholarship_amt']?></h2>
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <p>86%</p>
                            </div>
                        </div>
                        <small class="text-muted">Last 24 Hours</small>
                    </a>
                </div>
                <div class="mth">
                    <span class="material-icons-sharp">functions</span>
                    <h3>Update profile</h3>
                    <h2>27/29</h2>
                    <div class="progress">
                        <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="number">
                            <p>93%</p>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!-- <div class="cs">
                    <span class="material-icons-sharp">computer</span>
                    <h3>Computer Architecture</h3>
                    <h2>27/30</h2>
                    <div class="progress">
                        <svg><circle cx="38" cy="38" r="36"></circle></svg>
                        <div class="number"><p>81%</p></div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div> -->
                <div class="cg">
                    <a href="./sform.php">
                        <span class="material-icons-sharp">dns</span>
                        <h3>Application Form</h3>
                        <h2>24/25</h2>
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <p>96%</p>
                            </div>
                        </div>
                        <small class="text-muted">Last 24 Hours</small>
                    </a>
                </div>
                <div class="net">
                    <span class="material-icons-sharp">router</span>
                    <h3>Update Application</h3>
                    <h2>25/27</h2>
                    <div class="progress">
                        <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="number">
                            <p>92%</p>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
            </div>

          
            <div class="right">
            <div class="leaves">
                <h2>Application Form</h2>
                <a href="./pd1.php?view=true">
                    <div class="teacher">

                        <div class="profile-photo"><img src="./file.jpg" alt=""></div>
                        <div class="info">
                            <h3>View Application Form</h3>
                
                <small class="text-muted"></small>
            </div>
        </div></a>
        <a href="./pd1.php">
            <div class="teacher">
                <div class="profile-photo"><img src="./Images/dnl.png" alt=""></div>
                <div class="info">
                    <h3>Download Application Form</h3>
                    <small class="text-muted"></small>
                </div>
            </div>
        </a>

        <a href="./admin_adhar.php">
            <div class="teacher">
                <div class="profile-photo"><img src="./Images/dnl.png" alt=""></div>
                <div class="info">
                    <h3>View Adhar</h3>
                    <small class="text-muted"></small>
                </div>
            </div>
        </a>
    </div>

    <div class="timetable" id="timetable">
        <div>
            <span id="prevDay">&lt;</span>
            <h2>Upcoming Events</h2>
            <span id="nextDay">&gt;</span>
        </div>

        
        <!-- <span class="closeBtn" onclick="timeTableAll()">X</span>
        <table>
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Room No.</th>
                    <th>Subject</th>
                    <th></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table> -->
    </div>
            
        </main>


        


        <div class="right">
    <div class="announcements">
        <h2>Announcements</h2>
        <div class="updates">
            <?php
           

            // Fetch announcements from the database
            $sql = "SELECT title, message, created_at FROM notifications ORDER BY created_at DESC"; // Assuming 'created_at' is the timestamp field
            $result = mysqli_query($conn, $sql);

            // Check if there are any announcements
            if (mysqli_num_rows($result) > 0) {
                // Loop through each announcement and display it
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="message">';
                    echo '<p style="overflow-wrap: break-word;"><b>' . $row['title'] . '</b> ' . $row['message'] . '</p>';
                    echo '<small class="text-muted">' . date('Y-m-d H:i:s', strtotime($row['created_at'])) . '</small>';
                    echo '</div>';
                }
            } else {
                echo '<p>No announcements available.</p>';
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </div>
    </div>

    <br>
    <!-- private msg -->
     
    <!-- <div class="right"> -->
    <div class="announcements">
        <h2>Message for you</h2>
        <div class="updates">
            <?php
           

           

            // Fetch announcements from the database
            $sql = "SELECT * from user_profile where registration_number ='$registration_number'";
            $result = mysqli_query($conn, $sql);

            // Check if there are any announcements
            if (mysqli_num_rows($result) > 0) {
                // Loop through each announcement and display it
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="message ">';
                    echo '<p style="overflow-wrap: break-word;"><b style="color: red;">' . $row['msg'] . '</b> ' . $row['msg'] . '</p>';
                    // echo '<small class="text-muted">' . date('Y-m-d H:i:s', strtotime($row['created_at'])) . '</small>';
                    echo '</div>';
                }
            } else {
                echo '<p>No messages available.</p>';
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </div>
    </div>


           
    </div>

    </div>
    </div>

    <!-- <script src="timeTable.js"></script> -->
    <script src="app.js"></script>
</body>

</html>