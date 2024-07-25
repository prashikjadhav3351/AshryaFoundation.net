<?php
session_start();
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
    // echo("database connected succesfully <br>");
}

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: reglog.php");
    exit();
}

$username = $_SESSION['email'];
$reg_sql = "SELECT registration_number FROM users WHERE email = '$username'";
$reg_result = mysqli_query($conn, $reg_sql);

if ($reg_result && mysqli_num_rows($reg_result) > 0) {
    $reg_row = mysqli_fetch_assoc($reg_result);
    $registration_number = $reg_row['registration_number'];
     
} else {
    echo "Error fetching registration number: " . mysqli_error($conn);
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data here
    // For demonstration purposes, let's assume we're updating the user's profile in the database
    
    $name = $_POST['name'];
    // $email = $_POST['email'];
    // $address = $_POST['address'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];


    // File upload handling
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file is uploaded
if ($_FILES["profile_picture"]["error"] == UPLOAD_ERR_OK) {
    // Check file size
    if ($_FILES["profile_picture"]["size"] > 1048576) {
        header("Location:build_profile.php?status=image too large.");
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowed_extensions)) {
        // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        // echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
            // echo "The file ". htmlspecialchars( basename( $_FILES["profile_picture"]["name"])). " has been uploaded.";
        } else {
            // echo "Sorry, there was an error uploading your file.";
            
        }
    }
}


$_SESSION['registration_number'] = $registration_number;
    // Now, you can include the $profile_picture variable in your SQL query to insert it into the database
        $sql = "INSERT INTO user_profile (name, email, phone, dob, registration_number, profile_picture) 
        VALUES ('$name', '$username', '$phone', '$dob', '$registration_number', '$target_file')";
    if (mysqli_query($conn, $sql)) {
        // Redirect back to the dashboard or any other page after updating the profile
        // echo "done";
        
        header("Location: sform.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Build Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
            max-width: 500px;
        }
        .form-group {
            margin-bottom: 25px;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-save {
            background-color: #4caf50;
            color: #fff;
            transition: background-color 0.3s ease;
        }
        .btn-save:hover {
            background-color: #45a049;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Build Profile</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
           
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
          <div class="form-group">
                <label for="dob">Date of birth</label>
                <input type="date" class="form-control-file" id="dob" name="dob">
                    </div>
            <div class="form-group">
                <label for="profile_picture">Profile Picture</label>
                <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">
            </div>
            <button type="submit" class="btn btn-info btn-block">Save</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

