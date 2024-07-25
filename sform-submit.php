<?php

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

$username = $_SESSION['email'];
// echo "email: " . $username . "<br>";
$reg_sql = "SELECT * FROM user_profile WHERE email = '$username'";
$reg_result = mysqli_query($conn, $reg_sql);

// Check if the query executed successfully
if ($reg_result) {
    // Check the number of rows returned by the query
    $num_rows = mysqli_num_rows($reg_result);
    // echo "Number of rows returned: " . $num_rows . "<br>";

    // Fetch the row from the result set
    if ($num_rows > 0) {
        $row = mysqli_fetch_assoc($reg_result);
        // echo "Registration Number: " . $row['registration_number'] . ", Name: " . $row['name'] . "<br>";
    } else {
        // echo "No rows returned.";
    }
} else {
    // If the query fails, display the error message
    // echo "Error executing query: " . mysqli_error($conn);
}



// $username = $_SESSION['email'];
// echo "email: " . $username . "<br>";
$reg2 = "SELECT * FROM user_profile WHERE email = '$username'";
$reg_result2 = mysqli_query($conn, $reg2);

// var_dump($reg_result2);
if ($reg_result2 && mysqli_num_rows($reg_result2) > 0) {
    $reg_row = mysqli_fetch_assoc($reg_result2);
    // echo "Registration Number: " . $reg_row['registration_number'] . ", Name: " . $reg_row['name'] . "<br>";

    $registration_number = $reg_row['registration_number'];
    $_SESSION['registration_number'] = $registration_number; // Store registration_number in the session
    $name = $reg_row['name'];
    $_SESSION['name'] = $name; // Store name in the session
    // $email=$_SESSION['email'];
    // $_SESSION['email']=$email;
} else {
    // echo "Error fetching registration number: " . mysqli_error($conn);
    
    exit();
}

$fname = $_POST["fname"];
$faname = $_POST["faname"];
$mname = $_POST["mname"];
$address = $_POST["address"];
// $email = $_POST["email"];
$phone = $_POST["phone"];
$aphone=$_POST["aphone"];
$qualification = $_POST["qualification"];
$course = $_POST["course"];
$institution = $_POST["institution"];
$year1 = $_POST["year1"];
$course1 = $_POST["course1"];
$term1 = $_POST["term1"];
$marksObtained1 = $_POST["marksObtained1"];
$year2 = $_POST["year2"];
$course2 = $_POST["course2"];
$term2 = $_POST["term2"];
$marksObtained2 = $_POST["marksObtained2"];
$year3 = $_POST["year3"];
$course3 = $_POST["course3"];
$term3 = $_POST["term3"];
$marksObtained3 = $_POST["marksObtained3"];
$fees = $_POST["fees"];
$tfees = $_POST["tfees"];
$otherExpenses = $_POST["otherExpenses"];
$totalFees = $_POST["totalFees"];
$reln=$_POST["reln"];
$job=$_POST["job"];
$laptop = $_POST["laptop"];
$pc = $_POST["pc"];
$tuition = $_POST["tuition"];

// $hobbies = isset($_POST["hobbies"]) ? $_POST["hobbies"] : [];
$hobbies = $_POST["hobbies"];

$ashrayaSupport = $_POST["ashrayaSupport"];
$scholarshipPast = $_POST["scholarshipPast"];
$otherScholarship = $_POST["otherScholarship"];

// $username = $_SESSION['email'];
$form = "SELECT name FROM user_profile WHERE email = '$username'";
$file = mysqli_query($conn, $form);






// File upload handling for Aadhar Card
$target_adhar = "uploads/" . $name . $registration_number . "/adhar/";
if (!file_exists($target_adhar)) {
    mkdir($target_adhar, 0777, true); // Create directory for user if it doesn't exist
}
$adhar = $target_adhar . basename($_FILES["Adhar"]["name"]);
$uploadOk = 1;
$imageFileType_adhar = strtolower(pathinfo($adhar, PATHINFO_EXTENSION));

// Check if file is uploaded
if ($_FILES["Adhar"]["error"] == UPLOAD_ERR_OK) {
    // Check file size
    if ($_FILES["Adhar"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowed_extensions_adhar = array("jpg", "jpeg", "png","pdf");
    if (!in_array($imageFileType_adhar, $allowed_extensions_adhar)) {
        // echo "Sorry, only JPG, JPEG, PNG  files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        // echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["Adhar"]["tmp_name"], $adhar)) {
            // echo "The file ". htmlspecialchars( basename( $_FILES["Adhar"]["name"])). " has been uploaded.";
        } else {
            // echo "Sorry, there was an error uploading your file.";
        }
    }
}

//Marsksheet pdf handling
// Check if file is uploaded
if ($_FILES["Marksheet"]["error"] == UPLOAD_ERR_OK) {
    // Check file size
    if ($_FILES["Marksheet"]["size"] > 5000000) { 
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only PDF file format
    $allowed_extension = "pdf";
    $file_extension = strtolower(pathinfo($_FILES["Marksheet"]["name"], PATHINFO_EXTENSION));
    if ($file_extension != $allowed_extension) {
        echo "Sorry, only PDF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Define upload directory and file path
        $upload_directory = "uploads/" . $name . $registration_number . "/marksheet/";
        if (!file_exists($upload_directory)) {
            mkdir($upload_directory, 0777, true); // Create directory for user if it doesn't exist
        }
        $marksheets_path = $upload_directory . basename($_FILES["Marksheet"]["name"]);

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES["Marksheet"]["tmp_name"], $marksheets_path)) {
            // echo "The file " . htmlspecialchars(basename($_FILES["Marksheet"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}


//fees reciept
// Check if file is uploaded
if ($_FILES["fee_rec"]["error"] == UPLOAD_ERR_OK) {
    // Check file size
    if ($_FILES["fee_rec"]["size"] > 5000000) { // Increased file size limit to 5 MB
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only PDF file format
    $allowed_extension = "pdf";
    $file_extension = strtolower(pathinfo($_FILES["fee_rec"]["name"], PATHINFO_EXTENSION));
    if ($file_extension != $allowed_extension) {
        echo "Sorry, only PDF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Define upload directory and file path
        $upload_directory = "uploads/" . $name . $registration_number . "/fee_rec/";
        if (!file_exists($upload_directory)) {
            mkdir($upload_directory, 0777, true); // Create directory for user if it doesn't exist
        }
        $fee_rec = $upload_directory . basename($_FILES["fee_rec"]["name"]);

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES["fee_rec"]["tmp_name"], $fee_rec)) {
            // echo "The file " . htmlspecialchars(basename($_FILES["fee_rec"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading fee reciept". $_FILES["fee_rec"]["error"];
        }
    }
}


$sql_insert = "INSERT INTO studentdetails (
    registration_number, First_Name, Fathers_Name, Mothers_Name, Address, Email, Phone, Alternate_Contact,
    Qualification, Course_To_Be_Pursued, Institution,
    Academic_Year1, Course1, Term1, Marks_Obtained1,
    Academic_Year2, Course2, Term2, Marks_Obtained2,
    Academic_Year3, Course3, Term3, Marks_Obtained3,
    School_College_Fees, Other_Amount_Payable_To_College, All_Other_Expenses, Total_Fees,
    Relation, Working_As, Have_Laptop, Have_PC, Have_Online_Tuition,
    Hobbies, Ashraya_Support, Scholarship_From_Ashraya_Past, Applied_For_Scholarship_Elsewhere,Adhar,marksheet,fee_rec
) VALUES (
    '$registration_number', '$fname', '$faname', '$mname', '$address', '$username', '$phone', '$aphone',
    '$qualification', '$course', '$institution',
    '$year1', '$course1', '$term1', '$marksObtained1',
    '$year2', '$course2', '$term2', '$marksObtained2',
    '$year3', '$course3', '$term3', '$marksObtained3',
    '$fees', '$tfees', '$otherExpenses', '$totalFees',
    '$reln', '$job', '$laptop', '$pc', '$tuition',
    '$hobbies', '$ashrayaSupport', '$scholarshipPast', '$otherScholarship','$adhar','$marksheets_path','$fee_rec'
)";


if (mysqli_query($conn,$sql_insert)) {
    // echo("data inserted<br>");
    header("Location:confirm.php");
 }
 else{
    //  echo("error inserting data<br>");
    header("Location:confirm.php?error=Error getting data");
 }


if(isset($_POST["numFlats"]) && ($job === 'Cook' || $job === 'Housemaid')) {
    
    $flatNumbers = [];
    $facilities = [];
    $ownerNames = [];
    $ownerContacts = [];
    $numFlats=$_POST["numFlats"];

    if (($job === 'Cook' || $job === 'Housemaid')) {
     // Collect flat details up to 10 times
     for ($i = 1; $i <= 10; $i++) {
         if (($i<=$numFlats)) {
        $flatNumbers[$i-1] = isset($_POST["workPlace$i"]) ? $_POST["workPlace$i"] : null;
        // echo $_POST["workPlace$i"];
        $facilities[$i-1] = isset($_POST["facility$i"]) ? $_POST["facility$i"] : null;
        // echo $_POST["facilities$i"];
        $ownerNames[$i-1] = isset($_POST["ownerName$i"]) ? $_POST["ownerName$i"] : null;
        // echo $_POST["ownerNames$i"];
        $ownerContacts[$i-1] = isset($_POST["ownerContact$i"]) ? $_POST["ownerContact$i"] : null;
        // echo $_POST["ownerContacts$i"];

      
        } 

    }
    }

  
    

// Construct the SQL query string
$sql = "INSERT INTO emp_details (
    registration_number,
    flat_number1, facilities1, owner_name1, owner_contact1, 
    flat_number2, facilities2, owner_name2, owner_contact2, 
    flat_number3, facilities3, owner_name3, owner_contact3, 
    flat_number4, facilities4, owner_name4, owner_contact4, 
    flat_number5, facilities5, owner_name5, owner_contact5, 
    flat_number6, facilities6, owner_name6, owner_contact6, 
    flat_number7, facilities7, owner_name7, owner_contact7, 
    flat_number8, facilities8, owner_name8, owner_contact8, 
    flat_number9, facilities9, owner_name9, owner_contact9, 
    flat_number10, facilities10, owner_name10, owner_contact10,numFlat
) VALUES (
    '$registration_number',";

// Loop to construct the values part of the query
for ($i = 0; $i <= 9; $i++) {
    if (isset($flatNumbers[$i])) {
        $sql .= "'{$flatNumbers[$i]}', '{$facilities[$i]}', '{$ownerNames[$i]}', '{$ownerContacts[$i]}', ";
    } else {
        
        $sql .= "NULL, NULL, NULL, NULL, ";
    }
}


// Remove the extra comma and space from the end of the query
$sql = rtrim($sql, ", ");

// Complete the SQL query
// $sql .= "";
if (($numFlats!=0)) {
    $sql .= ",'$numFlats')";
}
else{
    $sql.=")";
}



// Execute the query
if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
    header("Location:confirm.php");
} else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
    header("Location:confirm.php?error=error getting flat details");
}

}
else{
    // echo "not entered flat details";
    exit();
}

mysqli_close($conn);



?>