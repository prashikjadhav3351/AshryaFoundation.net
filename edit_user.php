<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Database connection parameters
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

    // Retrieve user details based on the ID
    $user_id = $_GET['id'];
    $user_sql = "SELECT * FROM users WHERE id = $user_id";
    $user_result = mysqli_query($conn, $user_sql);
    $user = mysqli_fetch_assoc($user_result);

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>

<body>
    <h2>Edit User</h2>
    <form method="POST" action="update_user.php">
        <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
        Registration Number: <input type="text" name="registration_number" value="<?php echo $user['registration_number']; ?>"><br>
        Username: <input type="text" name="username" value="<?php echo $user['username']; ?>"><br>
        <!-- Add other fields as needed -->
        
        <input type="submit" value="Submit">
    </form>
</body>

</html>
