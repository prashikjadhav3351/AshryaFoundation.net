<?php
session_start();
$username="Neural";
$server="localhost";
$password="AshrayaFoundation";
$db="Ashraya";


$con=mysqli_connect($server,$username,$password,$db);
if(!$con){
    die ("connection not asjhdywfsdhdone".mysqli_connect_error);
}
else{
    // echo("database connected succesfully <br>");
}




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['email'];
    $password = $_POST['pw'];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

        if (empty($username)){
                    header("Location: reglog.php?error=email is required");
                    exit();
                

                }else if (empty($password)){
                        header("Location: reglog.php?error=password is required");
                        exit();

                }


                
                }

   if ($user && $password === $user['password']) {
       
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['registration_number'] = $user['registration_number'];
        

        $registration_number = $_SESSION['registration_number'];
        // $sql2 = "SELECT * FROM user_profile WHERE registration_number = '$registration_number'";
        // $userdetails = mysqli_query($con, $sql2);
        // $submission = mysqli_fetch_assoc($userdetails);
        // var_dump($userdetails);

        $sql2 = "SELECT * FROM studentdetails WHERE registration_number = ?";
        $stmt2 = mysqli_prepare($con, $sql2);
        mysqli_stmt_bind_param($stmt2, 's', $registration_number);
        mysqli_stmt_execute($stmt2);
        $userdetails = mysqli_stmt_get_result($stmt2);
        $submission = mysqli_fetch_assoc($userdetails);

        // Debugging information
        // var_dump($userdetails);
        // var_dump($submission);

        

        echo "email: " . $username . "<br>";
        echo $registration_number;
        // $username = $_SESSION['email'];
        $reg_sql = "SELECT registration_number FROM user_profile WHERE email = '$username'";
        $reg_result = mysqli_query($con, $reg_sql);
        $reg_row = mysqli_fetch_assoc($reg_result);
        var_dump($reg_result);
        echo mysqli_num_rows($reg_result);
        if ($reg_result && mysqli_num_rows($reg_result) > 0) {
    if (($submission['scholarship_amt'])<=0) {
        header("Location: confirm.php");
    } else {
        header("Location: student.php");
    }
    // $reg_row = mysqli_fetch_assoc($reg_result);
    $registration_number = $reg_row['registration_number'];
    $_SESSION['registration_number'] = $registration_number; // Store registration_number in the session
} else {
    header("Location: build_profile.php");
    // echo "Error fetching registration number: " . mysqli_error($con);
    exit();
}

       
        

        // header("Location: build_profile.php");
        exit();
    } else {
        
        header("Location: reglog.php?login_error_msg=invalid email or password");
                exit();
        
        // echo "Invalid username or password.";
        exit();
    }

    



    mysqli_stmt_close($stmt);


mysqli_close($con);
?>