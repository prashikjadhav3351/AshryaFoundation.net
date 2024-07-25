<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

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
    //echo("database connected succesfully <br>");
}

// Define SQL query for fetching user data
$user_sql = "SELECT * FROM users";

// Define SQL query for fetching form submissions
$studentdetails_sql = "SELECT * FROM studentdetails";

// Fetch user data
$user_result = mysqli_query($conn, $user_sql);
if (!$user_result) {
    echo "Error fetching user data: " . mysqli_error($conn);
    exit();
}



// Fetch form submissions
 $studentdetails_result = mysqli_query($conn, $studentdetails_sql);




if (!$studentdetails_result) {
    echo "Error fetching form submissions: " . mysqli_error($conn);
    exit();
}

// Fetch user profile data
$user_profile_sql = "SELECT registration_number, name, email, address, phone, scholarship_amt FROM user_profile";
$user_profile_result = mysqli_query($conn, $user_profile_sql);

if (!$user_profile_result) {
    echo "Error fetching user profile data: " . mysqli_error($conn);
    exit();
}




// Handle event creation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_event'])) {
    // Check if title, description, and date are set
    if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['date'])) {
        // Extract title, description, and date
        $title = $_POST['title'];
        $description = $_POST['description'];
        $date = $_POST['date'];

        // Prepare and execute SQL statement
        $sql = "INSERT INTO events (title, description, date) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $title, $description, $date);
        mysqli_stmt_execute($stmt);

        // Close statement and connection
        mysqli_stmt_close($stmt);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f0f0;
            /* padding-top: 20px; */
        }

        .container {
            margin-top: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 15px 15px 0 0;
            font-weight: bold;
        }

        .card-body {
            padding: 20px;
        }

        .table th,
        .table td {
            border-top: none;
            border-bottom: 1px solid #dee2e6;
        }

        .table th {
            font-weight: bold;
            color: #333;
            text-transform: uppercase;
            font-size: 0.9em;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }

        .btn-logout {
            background-color: #dc3545;
            border-color: #dc3545;
            font-weight: bold;
        }

        .btn-logout:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .navbar {
            background-color: #343a40;
            border-bottom: 1px solid #444;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.2em;
        }

        .navbar-toggler {
            border-color: rgba(0, 0, 0, 0.1);
        }

        .navbar-toggler-icon {
            background-color: #fff;
        }

        .navbar-nav .nav-link {
            color: #fff;
            font-weight: bold;
        }

        .navbar-nav .nav-link:hover {
            color: #ccc;
        }

        /* Smooth hover animation for table rows */
        table.table-striped tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.1);
        }

        /* Add hover effects */
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .table-striped tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.1);
        }

        /* Smooth hover animation for table rows */
        table.table-striped tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.1);
        }

        /* Optional: Add transition effects */
        .card,
        .btn {
            transition: all 0.3s ease;
        }
    </style>
</head>

<body>
    
    
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container d-flex justify-content-between align-items-center">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <a class="navbar-brand d-flex align-items-center" href="#"
                    style="position: absolute; left: 50%; transform: translateX(-50%);">
                    <i class="fas fa-tachometer-alt" style="margin-right: 10px;"></i>
                    Admin Dashboard
                </a>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="admin_logout.php" style="
                background-color: #ff4b5c; 
                color: white; 
                padding: 10px 20px; 
                border-radius: 5px; 
                text-align: center; 
                text-decoration: none; 
                transition: background-color 0.3s ease;" onmouseover="this.style.backgroundColor='#ff2e3e';"
                            onmouseout="this.style.backgroundColor='#ff4b5c';">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-4">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">User Management</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Registration Number</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($user = mysqli_fetch_assoc($user_result)) : ?>
                                    <tr>
                                        <td>
                                            <?php echo $user['registration_number']; ?>
                                        </td>
                                        <td>
                                            <?php echo $user['email']; ?>
                                        </td>
                                        <td>
                                            <!--<a href="edit_user.php?id=<?php echo $user['id']; ?>"-->
                                            <!--    class="btn btn-sm btn-primary">Edit</a>-->
                                            <a href="delete_user.php?id=<?php echo $user['id']; ?>"
                                                class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Form Submissions</h3>
                    </div> <br>
                    <form method="GET" action="">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Search by Registration Number or Name" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                            
                              <?php  $search = isset($_GET['search']) ? $_GET['search'] : '';
                                  if (!empty($search)) {
                                    $studentdetails_sql .= " WHERE registration_number LIKE ? OR First_Name LIKE ?";
                                    $searchParam = "%" . $search . "%";
                                }
                                
                                // Prepare and execute the statement
                                $stmt = $conn->prepare($studentdetails_sql);
                                if (!empty($search)) {
                                    $stmt->bind_param('ss', $searchParam, $searchParam);
                                    $stmt->execute();
                                $studentdetails_result = $stmt->get_result();
                                }?>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        
                                        <th>User Registration Number</th>
                                        <th>Name</th>
                                        <th>Form Data</th>
                                        <th>Status</th>
                                        <th>Aadhar</th>
                                        <th>Fee Reciept</th>
                                        <th>Marksheet</th>
                                    </tr>
                                </thead>
                                <tbody>

                                   
                                    
                                    
                                    <?php
                                     
                                    

                           
                                    
                                    
                                    while ($submission = mysqli_fetch_assoc($studentdetails_result)) : ?>
                                    <tr>
                                        <td id="registration-number">
                                            <?php echo $submission['registration_number']; ?>
                                        </td>
                                        <td>
                                            <?php echo $submission['First_Name']; ?>
                                        </td>
                                        <td><a
                                                href="./pd.php?registration_number=<?php echo $submission['registration_number']; ?>&view=true">Form
                                                data</a></td>
                                        <td>
                                            <a href="admin_dashboard.php?registration_number=<?php echo $submission['registration_number']; ?>"
                                                class="btn btn-sm btn-primary" id="scrollButton">Select</a><br>
                                            <a href="delete_user.php?id=<?php echo $user['id']; ?>"
                                                class="btn btn-sm btn-danger">Reject</a>
                                        </td>
                                  <td>
                                     

                                            <!-- Link to view Aadhar card -->
                                            <?php
                                            $aadhar_exists = checkDocumentExists($submission['registration_number'], 'adhar');
                                            if ($aadhar_exists) {
                                                ?>
                                                <a href="admin_adhar.php?registration_number=<?php echo $submission['registration_number']; ?>&view=true"
                                                   class="btn btn-sm btn-info">View Aadhar</a><br>
                                            <?php } else { ?>
                                                <button class="btn btn-sm btn-info" disabled>View Aadhar (Not Available)</button><br>
                                            <?php } ?>
                                        
                                            <!-- Link to download Aadhar card -->
                                            <?php
                                            if ($aadhar_exists) {
                                                ?>
                                                <a href="admin_adhar.php?registration_number=<?php echo $submission['registration_number']; ?>"
                                                   class="btn btn-sm btn-info">Download Aadhar</a><br>
                                            <?php } else { ?>
                                                <button class="btn btn-sm btn-info" disabled>Download Aadhar (Not Available)</button><br>
                                            <?php } ?>
                                        </td>

                                        <td>
                                        <?php
                                        $fee_rec_exists = checkDocumentExists($submission['registration_number'], 'fee_rec');
                                        if ($fee_rec_exists) {
                                            ?>
                                            <a href="docs.php?registration_number=<?php echo $submission['registration_number']; ?>&document=fee_rec"
                                               class="btn btn-info">Download Fee Receipt</a>
                                        <?php } else { ?>
                                            <button class="btn btn-info" disabled> (Not Available)</button>
                                        <?php } ?>
                                    </td>
                                    
                                    <!-- Link to download Marksheet -->
                                    <td>
                                        <?php
                                        $marksheet_exists = checkDocumentExists($submission['registration_number'], 'marksheet');
                                        if ($marksheet_exists) {
                                            ?>
                                            <a href="docs.php?registration_number=<?php echo $submission['registration_number']; ?>&document=marksheet"
                                               class="btn btn-sm btn-info">Download Marksheet</a><br>
                                        <?php } else { ?>
                                            <button class="btn btn-sm btn-info" disabled> (Not Available)</button>
                                        <?php } ?>
                                    </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
// Function to check if a specific document exists for a registration number
function checkDocumentExists($registration_number, $document_type) {
    $username = "Neural";
    $server = "localhost";
    $password = "AshrayaFoundation";
    $db = "Ashraya";

    $conn = mysqli_connect($server, $username, $password, $db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "";
    switch ($document_type) {
        case 'fee_rec':
            $sql = "SELECT fee_rec FROM studentdetails WHERE registration_number = ?";
            break;
        case 'marksheet':
            $sql = "SELECT marksheet FROM studentdetails WHERE registration_number = ?";
            break;
        case 'adhar':
            $sql = "SELECT Adhar FROM studentdetails WHERE registration_number = ?";
            break;
        default:
            return false; // Invalid document type
    }

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
    }

    $stmt->bind_param("s", $registration_number);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($document_path);
    $stmt->fetch();

    $stmt->close();
    mysqli_close($conn);

    // Check if the document path is not empty (document exists)
    return !empty($document_path);
}
?>
<div class="approveormsg">
    <div class="container" style="margin-top: 20px;">
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <div class="card-body" style="padding: 20px;">
                        <h2 class="card-title text-center"
                            style="background-color: #007bff; color: #fff; padding: 10px; border-radius: 10px;">Approve
                            Scholarship</h2>

                        <?php  

                            // Check if the registration number is provided
                                // if (!isset($_GET['registration_number'])) {
                                //     die("Registration number not provided");
                                // }

                                // $registration_number = $_GET['registration_number'];

                                $registration_number = isset($_GET['registration_number']) ? $_GET['registration_number'] : null;

                            $studentdetails = "SELECT * FROM user_profile where registration_number ='$registration_number'";
                            
                            // Fetch form submissions
                            $studentdetailsresult = mysqli_query($conn, $studentdetails);
                            $submission = mysqli_fetch_assoc($studentdetailsresult);
                            // var_dump($submission); 
                            if (!$studentdetailsresult) {
                                // echo "Error fetching form submissions: " . mysqli_error($conn);
                                exit();
                            }
                            // $registration_number = isset($_GET['registration_number']) ? $_GET['registration_number'] : null;

                            ?>


                        <form
                            action="scholarship.php?registration_number=<?php echo $submission['registration_number']; ?> "
                            method="post">
                            <div class="form-group">
                                <label for="notificationTitle">Registration Number</label>
                                <p>
                                    <?php echo isset ($submission['registration_number']) ? $submission['registration_number'] : 'Not Selected'; ?>
                                </p>

                            </div>



                            <div class="form-group">
                                <label for="notificationMessage">Scholarship amount</label>
                                <input class="form-control" id="scholarship_amt" name="scholarship_amt" rows="1"
                                    required></input>
                            </div>
                            <button type="submit" class="btn btn-primary" id="grant-scholarship-button">Grant
                                Scholarship</button>


                        </form>
                    </div>
                </div>
            </div>

            <br>

            <div class="col-md-6">
                <div class="card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <div class="card-body" style="padding: 20px;">
                        <h2 class="card-title text-center"
                            style="background-color: #007bff; color: #fff; padding: 10px; border-radius: 10px;">Send msg
                        </h2>

                        <?php  

                            // Check if the registration number is provided
                                // if (!isset($_GET['registration_number'])) {
                                //     die("Registration number not provided");
                                // }

                                // $registration_number = $_GET['registration_number'];

                                $registration_number = isset($_GET['registration_number']) ? $_GET['registration_number'] : null;

                            $studentdetails = "SELECT * FROM user_profile where registration_number ='$registration_number'";
                            
                            // Fetch form submissions
                            $studentdetailsresult = mysqli_query($conn, $studentdetails);
                            $submission = mysqli_fetch_assoc($studentdetailsresult);
                            // var_dump($submission); 
                            if (!$studentdetailsresult) {
                                echo "Error fetching form submissions: " . mysqli_error($conn);
                                exit();
                            }
                            // $registration_number = isset($_GET['registration_number']) ? $_GET['registration_number'] : null;

                            ?>


                        <form action="msg.php?registration_number=<?php echo $submission['registration_number']; ?> "
                            method="post">
                            <div class="form-group">
                                <label for="notificationTitle">Registration Number</label>
                                <p>
                                    <?php echo isset ($submission['registration_number']) ? $submission['registration_number'] : 'Not Selected'; ?>
                                </p>

                            </div>



                            <div class="form-group">
                                <label for="notificationMessage">MSG </label>
                                <textarea class="form-control" id="pmsg" name="pmsg" rows="1" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" id="grant-scholarship-button">Send msg to
                                <?php echo isset ($submission['name'])? $submission['name']:'NA'; ?>
                            </button>



                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>



    </div>


    <!-- <div class="col-md-6"> 
                    <div class="card-header">
                        <h3 class="mb-0">Approved Applications</h3>
                    </div>
            </div> -->
    </div>
</div>
    <br>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Select the specific button by its ID
    var button = document.getElementById('scrollButton');

    // Add click event listener to the button
    button.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default action to avoid page reload
        
        // Manually update the URL without refreshing the page
        var targetUrl = this.href;
        var targetId = targetUrl.split('#')[1];
        history.pushState(null, null, targetUrl);

        // Smooth scroll to the 'approveormsg' div
        var approveormsg = document.getElementById(targetId);
        if (approveormsg) {
            approveormsg.scrollIntoView({ behavior: 'smooth' });
        }
    });
});
</script>


    <!-- Approved scholarship details -->


    <div class="container" style="margin-top: 20px;">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <div class="card-body" style="padding: 20px;">
                        <h2 class="card-title text-center"
                            style="background-color: #007bff; color: #fff; padding: 10px; border-radius: 10px;">Approved
                            Scholarship Details</h2>
                        <div class="table-responsive">
                            <table class="table table-striped" style="width: 100%; border-collapse: collapse;">
                                <thead>
                                    <tr style="background-color: #f8f9fa;">
                                        <th
                                            style="padding: 8px; text-align: left; border-bottom: 1px solid #ccc; font-weight: bold; color: #333;">
                                            Registration Number</th>
                                        <th
                                            style="padding: 8px; text-align: left; border-bottom: 1px solid #ccc; font-weight: bold; color: #333;">
                                            Name</th>
                                        <th
                                            style="padding: 8px; text-align: left; border-bottom: 1px solid #ccc; font-weight: bold; color: #333;">
                                            Email</th>
                                        <th
                                            style="padding: 8px; text-align: left; border-bottom: 1px solid #ccc; font-weight: bold; color: #333;">
                                            Address</th>
                                        <th
                                            style="padding: 8px; text-align: left; border-bottom: 1px solid #ccc; font-weight: bold; color: #333;">
                                            Phone</th>
                                        <!-- <th style="padding: 8px; text-align: left; border-bottom: 1px solid #ccc; font-weight: bold; color: #333;">Date of Birth</th> -->
                                        <th
                                            style="padding: 8px; text-align: left; border-bottom: 1px solid #ccc; font-weight: bold; color: #333;">
                                            Scholarship Amount</th>
                                    </tr>
                                </thead>


                                <?php 
                                    $studentdetails = "SELECT registration_number, First_Name, Email, Address, Phone, scholarship_amt FROM studentdetails";

                                    // Fetch form submissions
                                    $studentdetailsresult = mysqli_query($conn, $studentdetails);

                                    if (!$studentdetailsresult) {
                                        echo "Error fetching form submissions: " . mysqli_error($conn);
                                        exit();
                                    }
                                    ?>

                                <tbody>

                                    <?php while ($row = mysqli_fetch_assoc($studentdetailsresult)) : ?>
                                        <?php if($row['scholarship_amt']>0): ?>

                                    <tr style="border-bottom: 1px solid #ccc; transition: background-color 0.3s;">
                                        <td style="padding: 8px; text-align: left;">
                                            <?php echo $row['registration_number']; ?>
                                        </td>
                                        <td style="padding: 8px; text-align: left;">
                                            <?php echo $row['First_Name']; ?>
                                        </td>
                                        <td style="padding: 8px; text-align: left;">
                                            <?php echo $row['Email']; ?>
                                        </td>
                                        <td style="padding: 8px; text-align: left;">
                                            <?php echo $row['Address']; ?>
                                        </td>
                                        <td style="padding: 8px; text-align: left;">
                                            <?php echo $row['Phone']; ?>
                                        </td>
                                        <td style="padding: 8px; text-align: left;">
                                            <?php echo $row['scholarship_amt']; ?>
                                        </td>
                                    </tr>
                                            <?php endif; ?>
                                    <?php endwhile; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="container" style="margin-top: 20px;">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <div class="card-body" style="padding: 20px;">
                            <h2 class="card-title text-center"
                                style="background-color: #007bff; color: #fff; padding: 10px; border-radius: 10px;">
                                Create Notification</h2>
                            <form action="create_notification.php" method="post">
                                <div class="form-group">
                                    <label for="notificationTitle">Title</label>
                                    <input type="text" class="form-control" id="notificationTitle" name="title"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="notificationMessage">Message</label>
                                    <textarea class="form-control" id="notificationMessage" name="message" rows="4"
                                        required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Create Notification</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="container" style="margin-top: 20px;">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <div class="card-body" style="padding: 20px;">
                            <h2 class="card-title text-center"
                                style="background-color: #007bff; color: #fff; padding: 10px; border-radius: 10px;">
                                Create Event</h2>
                            <form action="create_event.php" method="post">
                                <div class="form-group">
                                    <label for="eventTitle">Title</label>
                                    <input type="text" class="form-control" id="eventTitle" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="eventDescription">Description</label>
                                    <textarea class="form-control" id="eventDescription" name="description" rows="4"
                                        required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="eventDate">Date</label>
                                    <input type="date" class="form-control" id="eventDate" name="date" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Create Event</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<br><br>
 <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Contact Requests</h3>
                    </div> <br>
                    <form method="GET" action="">
                        <div class="input-group mb-3">
                            
                        </div>
                    </form>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                   
                                    
                                    
                                    <?php
                                     
                                    $contact="select * from contacts";
                                     $contact_result = mysqli_query($conn, $contact);
                           
                                    
                                    
                                    while ($submit = mysqli_fetch_assoc($contact_result)) : ?>
                                    <tr>
                                        <td id="name">
                                            <?php echo $submit['name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $submit['phone']; ?>
                                        </td>
                                        <td><?php echo $submit['email']; ?></td>
                                        <td>
                                            <?php echo $submit['message']; ?>
                                        </td>
                                        <td>
                                            <?php echo $submit['reg_date']; ?>
                                        </td>
                                  <td>
                                     

                                            
                                        
                                           
                                        
                                    </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    <br><br>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Mentor Forms</h3>
                    </div> <br>
                    <form method="GET" action="">
                        <div class="input-group mb-3">
                            
                        </div>
                    </form>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Expertise</th>
                                         <th>Preferred day</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                   
                                    
                                    
                                    <?php
                                     
                                    $mentor="select * from mentor_applications";
                                     $mentor_result = mysqli_query($conn, $mentor);
                           
                                    
                                    
                                    while ($sub = mysqli_fetch_assoc($mentor_result)) : ?>
                                    <tr>
                                        <td id="name">
                                            <?php echo $sub['name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $sub['contact']; ?>
                                        </td>
                                        <td><?php echo $sub['email']; ?></td>
                                        <td>
                                            <?php echo $sub['address']; ?>
                                        </td>
                                        <td>
                                            <?php echo $sub['expertise']; ?>
                                        </td>
                                        <td>
                                            <?php echo $sub['mentor_desc']; ?>
                                        </td>
                                        <td>
                                            <?php echo $sub['preferred_time']; ?>
                                        </td>
                                        <td>
                                            <?php echo $sub['short_bio']; ?>
                                        </td>
                                         <td>
                                            <?php echo $sub['created_at']; ?>
                                        </td>
                                  <td>
                                     

                                            
                                        
                                           
                                        
                                    </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
 
        </div>
        
        
        
    </div>





    </div>








    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</body>

</html>