<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Database connection parameters
    $username = "root";

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

    // Retrieve user ID from the URL
    $user_id = $_GET['id'];

    // Retrieve the registration number associated with the user
    $registration_sql = "SELECT registration_number FROM users WHERE id = $user_id";
    $result = mysqli_query($conn, $registration_sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $registration_number = $row['registration_number'];

        // Delete associated records in user_profile table
        $delete_profile_sql = "DELETE FROM user_profile WHERE registration_number = '$registration_number'";
        if (!mysqli_query($conn, $delete_profile_sql)) {
            echo "<script>
                alert('Error deleting user profile: " . mysqli_error($conn) . "');
                window.location.href = 'admin_dashboard.php';
            </script>";
            exit();
        }

        // Delete associated records in studentdetails table
        $delete_studentdetails_sql = "DELETE FROM studentdetails WHERE registration_number = '$registration_number'";
        if (!mysqli_query($conn, $delete_studentdetails_sql)) {
            echo "<script>
                alert('Error deleting student details: " . mysqli_error($conn) . "');
                window.location.href = 'admin_dashboard.php';
            </script>";
            exit();
        }

        // Delete user from the database
        $delete_user_sql = "DELETE FROM users WHERE id = $user_id";
        if (mysqli_query($conn, $delete_user_sql)) {
            echo "<script>
                alert('User deleted successfully');
                window.location.href = 'admin_dashboard.php';
            </script>";
        } else {
            echo "<script>
                alert('Error deleting user: " . mysqli_error($conn) . "');
                window.location.href = 'admin_dashboard.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('User not found');
            window.location.href = 'admin_dashboard.php';
        </script>";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
