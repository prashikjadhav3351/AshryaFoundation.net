
<?php
session_start();
$username="Neural";
$server="localhost";
$password="AshrayaFoundation";
$db="Ashraya";


$conn=mysqli_connect($server,$username,$password,$db);
if(!$conn){
    header("Location:sform.php?error=an error occured");
}
else{
    // echo("database connected succesfully <br>");
}

// Check if the username is set in the session
if (isset($_SESSION['email'])) {
    // Retrieve the registration number from the session
    $registration_number = $_SESSION['registration_number'];
    $email=$_SESSION['email'];
    
} else {
    
    exit(); // Exit the script
}

$username = $_SESSION['email'];

// Check if data exists in the studentdetails table for the given registration number
$student = "SELECT * FROM studentdetails WHERE registration_number = '$registration_number'";
$res2 = mysqli_query($conn, $student);

// Check if data is found
$dataFound = ($res2 && mysqli_num_rows($res2) > 0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin-top: 50px;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .image-container {
            flex: 1 1 100px;
            text-align: center;
        }
        .image-container img {
            max-width: 70%;
            height: auto;
            border-radius: 15px;
        }
        .content-container {
            flex: 2 1 400px;
            padding: 20px;
        }
        .message {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .download-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .download-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="image-container">
        <img src="./Images/5995357.jpg" alt="Image Description">
    </div>
    <div class="content-container">
        <?php if ($dataFound): ?>
            <!-- Display Submission Successful message if data is found -->
            <h1>Submission Successful</h1>
            
            <p class="message"> Your application has been successfully submitted. <br>
                <b>Registration number:<?php echo $registration_number?></b>  <br>
                <b>Email: <?php echo $email?></b>  <br>

                Please note down your registration number for future reference.

            </p>
            <p>
                <a id="viewLink" class="download-link" href="./index.php " target="_blank">Back to Home</a>
                <span> | </span>
                <a id="downloadLink" class="download-link" href="./pd1.php">Download form</a>
            </p>
        <?php else: ?>
            <!-- Display message if data is not found -->
            <h1>Form Not Submitted</h1>
            <p class="message">Your form has not been submitted.</p>
            <p>
                <a id="viewLink" class="download-link" href="./index.html">Back to Home</a>
                <span> | </span>
                <a id="downloadLink" class="download-link" href="./sform.php">Fill Form</a>
            </p>
        <?php endif; ?>
    </div>
</div>
</body>
</html>




