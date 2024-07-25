<?php
session_start();

// Database connection parameters
session_start();
$username="Neural";
$server="localhost";
$password="AshrayaFoundation";
$db="Ashraya";


$conn=mysqli_connect($server,$username,$password,$db);
if(!$conn){
    die ("connection not done".mysqli_connect_error);
}
else{
    echo("database connected succesfully <br>");
}

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Fetch registration_number based on username
$username = $_SESSION['username'];
$reg_sql = "SELECT registration_number FROM users WHERE username = '$username'";
$reg_result = mysqli_query($conn, $reg_sql);

if ($reg_result && mysqli_num_rows($reg_result) > 0) {
    $reg_row = mysqli_fetch_assoc($reg_result);
    $registration_number = $reg_row['registration_number'];
    $_SESSION['registration_number'] = $registration_number; // Store registration_number in the session
} else {
    echo "Error fetching registration number: " . mysqli_error($conn);
    exit();
}

// Initialize variables
$name = $email = $address = $phone = $dob = "";

// Fetch user profile data based on registration_number
$sql = "SELECT * FROM user_profile WHERE registration_number = '$registration_number'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    // Fetch the data from the result set
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $email = $row['email'];
    $address = $row['address'];
    $phone = $row['phone'];
    $dob = $row['dob'];
} else {
    echo "Error fetching user profile data: " . mysqli_error($conn);
}

// Fetch user profile data
$user_profile_sql = "SELECT * FROM user_profile";
$user_profile_result = mysqli_query($conn, $user_profile_sql);

if (!$user_profile_result) {
    echo "Error fetching user profile data: " . mysqli_error($conn);
    exit();
}



// Sample query to fetch events (replace with your actual query)
$events_query = "SELECT * FROM events";
$events_result = mysqli_query($conn, $events_query);

$notifications_query = "SELECT * FROM notifications";
$notifications_result = mysqli_query($conn, $notifications_query);


// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        /* Custom CSS for menu */
        .menu {
            list-style-type: none;
            padding: 0;
        }

        .menu li {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            margin-bottom: 5px;
            cursor: pointer;
        }

        .menu li:hover {
            background-color: #0056b3;
        }

        /* End of custom CSS for menu */

        /* Rest of your CSS styles */
        body {
            background-color: #e9ecef;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar {
            background-color: #333;
            color: #fff;
        }

        .navbar-brand {
            font-weight: bold;
            color: #f8f9fa;
        }

        .navbar-nav .nav-link {
            color: #f8f9fa !important;
            font-weight: bold;
        }

        .sidebar {
            background-color: #343a40;
            color: #fff;
            height: 100vh;
            padding-top: 20px;
            margin-top: 50px;
            /* Added margin top */
        }

        .sidebar .nav-link {
            color: #adb5bd;
            padding: 10px 20px;
        }

        .sidebar .nav-link:hover {
            color: #fff;
            background-color: #495057;
        }

        .sidebar .nav-link.active {
            color: #fff;
            background-color: #007bff;
        }

        .sidebar .nav-icon {
            margin-right: 10px;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            background-color: #f0f0f0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                border-radius: 0;
                box-shadow: none;
            }
        }

        .border-bottom {
            border-bottom: 1px solid #dee2e6;
        }

        .profile-card {
            background-color: #fff;
            border: none;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-card h2 {
            margin-top: 0;
            font-size: 1.5rem;
            color: #007bff;
        }

        .profile-details p {
            font-size: 1rem;
            color: #343a40;
        }

        .profile-details strong {
            color: #007bff;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#" style="position: absolute; left: 50%; transform: translateX(-50%);">
                <i class="fas fa-tachometer-alt" style="margin-right: 10px;"></i>
                Your Dashboard
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-white sidebar">
                <div class="sidebar-sticky">
                    <ul class="menu">
                        <a href="./sform.php">
                            <li>Fill Application Form</li>
                        </a>
                        <a href="./build_profile.php">
                            <li>Profile Form</li>
                        </a>
                        <li>Update Application Form</li>
                        <li>Logout</li>
                    </ul>
                </div>
            </nav>

           <main role="main" class="col-md-10 ml-sm-auto col-lg-10 main-content">
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
        <h1 class="h2">Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    </div>

    <div class="profile-card">
        <h2>Your Profile</h2>
        <div class="profile-details">
            <p><strong>Name:</strong> <?php echo $name; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Address:</strong> <?php echo $address; ?></p>
            <p><strong>Phone:</strong> <?php echo $phone; ?></p>
            <p><strong>Date of Birth:</strong> <?php echo $dob; ?></p>
            <p><strong>Registration Number:</strong> <?php echo $_SESSION['registration_number']; ?></p>
        </div>
    </div>

    <!-- Events and Notifications tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="events-tab" data-toggle="tab" href="#events" role="tab" aria-controls="events" aria-selected="true">Events</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="notifications-tab" data-toggle="tab" href="#notifications" role="tab" aria-controls="notifications" aria-selected="false">Notifications</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="events" role="tabpanel" aria-labelledby="events-tab">
            <h3>Events</h3>
            <ul class="list-group">
                <?php while ($event = mysqli_fetch_assoc($events_result)) : ?>
                    <li class="list-group-item"><?php echo isset($event['date']) ? $event['date'] : ''; ?> - <?php echo $event['title']; ?> - <?php echo $event['description']; ?></li>
                <?php endwhile; ?>
            </ul>
        </div>
        <div class="tab-pane fade" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
            <h3>Notifications</h3>
            <ul class="list-group">
                <?php while ($notification = mysqli_fetch_assoc($notifications_result)) : ?>
                    <li class="list-group-item"><?php echo isset($notification['date']) ? $notification['date'] : ''; ?> - <?php echo $notification['title']; ?> - <?php echo $notification['message']; ?></li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
</main>



        </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>