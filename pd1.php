<?php

require('fpdf.php');
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

// Check if the username is set in the session
if (isset($_SESSION['registration_number'])) {
    $username = $_SESSION['email'];
    $registration_number = $_SESSION['registration_number'];
} else {
    
//     echo "Session username not set.";
    exit(); 
}


// $reg_sql = "SELECT * FROM studentdetails WHERE registration_number = (SELECT registration_number FROM users WHERE username = '$username')";
$reg_sql = "SELECT s.*, p.profile_picture, e.*
FROM studentdetails s
JOIN user_profile p ON s.registration_number = p.registration_number
LEFT JOIN emp_details e ON s.registration_number = e.registration_number
WHERE s.registration_number = (SELECT registration_number FROM users WHERE email = '$username')
";
$reg_result = mysqli_query($conn, $reg_sql);

if ($reg_result && mysqli_num_rows($reg_result) > 0) {
    $reg_row = mysqli_fetch_assoc($reg_result);
    foreach ($reg_row as $key => $value) {
        // Assign each field value to a variable with the same name as the field
        ${$key} = $value;
    }
    // $registration_number = $reg_row['registration_number'];
    // $_SESSION['registration_number'] = $registration_number; 
    // Store registration_number in the session
} else {
    // echo "Error fetching registration number: " . mysqli_error($conn);
    exit();
}


// Create PDF
$pdf = new FPDF();
$pdf->AddPage();

// $profile_picture = "";
if (!empty($profile_picture) && file_exists($profile_picture)) {
    $pdf->Image($profile_picture, 170, 55, 30, 0); // Adjust x, y, width, and height as needed
}




// Inserting first image at top left
$pdf->Image('./Images/Add_a_subheading__1_-removebg-preview.png', 5, -4, 50); // X, Y, Width


// Get width of the second image to fit the remaining space on the right
$remainingWidth = $pdf->GetPageWidth() - 60; // 10 (left margin) + 50 (width of first image)

// Inserting second image
$pdf->Image('./Images/WhatsApp Image 2024-06-04 at 12.06.34.jpeg', 56, 8, $remainingWidth); // X, Y, Width
$pdf->Ln(23);
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(55);
// $pdf->SetY(45);
// Add the text after the images

$pdf->Cell(0, 10, '(Registered under Mumbai Public Trust Act, vide Registration No. E-31308)', 0, 1);
$pdf->Cell(0, 0, '', 'B', 1);



// Add form data to PDF
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(0, 10, 'Scholarship Application Form', 0, 1, 'C');
$pdf->Ln(4);

// Personal Information Section
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'Personal Information: ', 0, 1);
$pdf->SetFont('Arial', '', 12);
$pdf->Ln(8);

$registration_number = $_SESSION['registration_number'];
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(42, 10, 'Registration number:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(0, 8, $registration_number, 'B', 1);


// Full Name
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(40, 10, 'Full Name:', 0, 0);
// $pdf->Cell(0, 10, $fname, 1, 1);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(0, 10, $First_Name, 'B', 1);

// Father's Name
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(40, 10, "Father's Name:", 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(0, 10, $Fathers_Name, 'B', 1);

// Mother's Name
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(40, 10, "Mother's Name:", 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(0, 10, $Mothers_Name, 'B', 1);

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(40, 10, 'Address:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->MultiCell(0, 10, $Address, '0', 'L');

// Get the current position
$x = $pdf->GetX();
$y = $pdf->GetY();

// Calculate the width of the multiline address
$width = $pdf->GetStringWidth($Address);

// Draw an underline
$pdf->Line(200, $y, $x + $width, $y);

// Move to the next line
$pdf->Ln();


$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(40, 10, 'Email:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(0, 10, $Email, 'B', 1);

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(40, 10, 'Phone:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(0, 10, $Phone, 'B', 1);


$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(40, 10, 'Alternate Contact:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(0, 10, $Alternate_Contact, 'B', 1);



$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(40, 10, 'Qualification:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(0, 10, $Qualification, 'B', 1);

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(40, 10, 'Course :', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(0, 10, $Course_To_Be_Pursued, 'B', 1);

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(40, 10, 'Institution:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(0, 10, $Institution, 'B', 1);


$pdf->SetFont('Arial', 'B', 14);
$pdf->Ln(6);
$pdf->Cell(0, 10, 'Past performance of 3 years :', 0, 1);
$pdf->SetFont('Arial', '', 12);
// $pdf->Ln(3);


// Set font for field names
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(40, 8, 'Academic Year 1:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(40, 6, $Academic_Year1, 'B', 0); 

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(10, 0, '', 0, 0);
$pdf->Cell(40, 12, 'Course:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(40, 8, $Course1, 'B', 1); 

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(90, 0, '', 0, 0);
$pdf->Cell(40, 12, 'Term:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(40, 8, $Term1, 'B', 1); 

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(90, 0, '', 0, 0);
$pdf->Cell(40, 12, 'Percentage of Marks:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(40, 8, $Marks_Obtained1, 'B', 1); 


$pdf->Ln(8);
// Set font for field names
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(40, 8, 'Academic Year 2:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(40, 6, $Academic_Year2, 'B', 0);  

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(10, 0, '', 0, 0);
$pdf->Cell(40, 12, 'Course:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(40, 8, $Course2, 'B', 1); 

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(90, 0, '', 0, 0);
$pdf->Cell(40, 12, 'Term:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(40, 8, $Term2, 'B', 1); 

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(90, 0, '', 0, 0);
$pdf->Cell(40, 12, 'Percentage of Marks:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(40, 8, $Marks_Obtained2, 'B', 1); 

$pdf->Ln(8);
// Set font for field names
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(40, 10, 'Academic Year 1:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(40, 6, $Academic_Year3, 'B', 0); 

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(10, 0, '', 0, 0);
$pdf->Cell(40, 12, 'Course:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(40, 8, $Course3, 'B', 1); 

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(90, 0, '', 0, 0);
$pdf->Cell(40, 12, 'Term:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(40, 8, $Term3, 'B', 1); 

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(90, 0, '', 0, 0);
$pdf->Cell(40, 12, 'Percentage of Marks:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(40, 8, $Marks_Obtained3, 'B', 1); 


$pdf->Ln(6);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Ln(4);
$pdf->Cell(0, 10, 'Estimated Expenses For Current Year: ', 0, 1);
$pdf->SetFont('Arial', '', 12);
$pdf->Ln(5);


$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(45, 8, 'School/ College Fees:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(40, 6, $School_College_Fees, 'B', 0); 

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(10, 10, '', 0, 0);
$pdf->Cell(45, 8, 'Other Amount Payable:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(40, 8, $Other_Amount_Payable_To_College, 'B', 1); 

$pdf->SetFont('Arial', 'B', 11);
// $pdf->Cell(90, 90, '', 0, 0);
$pdf->Cell(41, 15, 'Other Expenses:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(45, 9, $All_Other_Expenses, 'B', 0); 

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(10, 10, '', 0, 0);
$pdf->Cell(45, 15, 'Total Amount :', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(40, 9, $Total_Fees, 'B', 1); 

$pdf->Ln(6);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Ln(4);
$pdf->Cell(0, 10, 'Parent details: ', 0, 1);
$pdf->SetFont('Arial', '', 12);
$pdf->Ln(5);


$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(35, 8, 'Parents Name:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(40, 6, $Relation, 'B', 0); 

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(24, 10, '', 0, 0);
$pdf->Cell(35, 8, 'Working As:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(40, 8, $Working_As, 'B', 1);


$pdf->Ln(6);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Ln(4);
$pdf->Cell(0, 10, 'Employer Details : ', 0, 1);
$pdf->SetFont('Arial', '', 12);
$pdf->Ln(5);


$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(45, 8, 'Flat no.:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(40, 6, $flat_number1, 'B', 0);

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(10, 10, '', 0, 0);
$pdf->Cell(45, 8, 'Support by owner:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(40, 8, $facilities1, 'B', 1); 

$pdf->SetFont('Arial', 'B', 11);
// $pdf->Cell(90, 90, '', 0, 0);
$pdf->Cell(41, 15, 'Employer Name:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(45, 9, $owner_name1, 'B', 0); 

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(10, 10, '', 0, 0);
$pdf->Cell(45, 15, 'Employer contact :', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(40, 9, $owner_contact1, 'B', 1); 

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(45, 8, 'Flat no.:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(40, 6, $flat_number2, 'B', 0);

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(10, 10, '', 0, 0);
$pdf->Cell(45, 8, 'Support by owner:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(40, 8, $facilities2, 'B', 1); 

$pdf->SetFont('Arial', 'B', 11);
// $pdf->Cell(90, 90, '', 0, 0);
$pdf->Cell(41, 15, 'Employer Name:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(45, 9, $owner_name2, 'B', 0); 

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(10, 10, '', 0, 0);
$pdf->Cell(45, 15, 'Employer contact :', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(40, 9, $owner_contact2, 'B', 1);

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(45, 8, 'Flat no.:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(40, 6, $flat_number3, 'B', 0);

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(10, 10, '', 0, 0);
$pdf->Cell(45, 8, 'Support by owner:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(40, 8, $facilities3, 'B', 1); 

$pdf->SetFont('Arial', 'B', 11);
// $pdf->Cell(90, 90, '', 0, 0);
$pdf->Cell(41, 15, 'Employer Name:', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(45, 9, $owner_name3, 'B', 0); 

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(10, 10, '', 0, 0);
$pdf->Cell(45, 15, 'Employer contact :', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(40, 9, $owner_contact3, 'B', 1);


$pdf->SetFont('Arial', 'B', 14);
$pdf->Ln(8);
$pdf->Cell(0, 10, 'Other Information: ', 0, 1);
$pdf->SetFont('Arial', '', 12);
$pdf->Ln(3);


$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(45, 8, 'Do You Have a Laptop?', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(40, 6, $Have_Laptop, 'B', 0); 

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(10, 8, '', 0, 0);
$pdf->Cell(45, 8, 'Do You Have a PC?', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(40, 6, $Have_PC, 'B', 1); 

$pdf->SetFont('Arial', 'B', 11);
// $pdf->Cell(90, 90, '', 0, 0);

$pdf->Cell(55, 11, 'Do You Have Online Tuition?', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(45, 9, $Have_Online_Tuition, 'B', 1); 

$pdf->SetFont('Arial', 'B', 11);
// $pdf->Cell(10, 10, '', 0, 0);
$pdf->Cell(45, 12, 'Other activities :', 15, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(0, 9, $Hobbies, 'B', 1);

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(74, 14, 'What should Ashraya do for you?', -14, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(0, 10, $Ashraya_Support, 'B', 1); 

$pdf->SetFont('Arial', 'B', 11);
// $pdf->Cell(10, 10, '', 0, 0);
$pdf->Cell(80, 13, 'Scholarship from Ashraya in the past?', 0, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(0, 10, $Scholarship_From_Ashraya_Past, 'B', 1); 

$pdf->SetFont('Arial', 'B', 11);
// $pdf->Cell(90, 90, '', 0, 0);
$pdf->Cell(88, 11, 'Have you applied for a scholarship elsewhere?',-14, 0);
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(0, 9, $Applied_For_Scholarship_Elsewhere, 'B', 0); 

// Dynamic filename
$filename = "{$First_Name}_{$registration_number}" . date('') . ".pdf";


// Check if the 'view' parameter is set and true
$viewPDF = isset($_GET['view']) && $_GET['view'] === 'true';

if ($viewPDF) {
    // Output PDF to the browser for viewing
   
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="' . $filename . '"');
    $pdf->Output();
} else {
    // Force download of the PDF
    $pdf->Output('F', $filename);
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    readfile($filename);
}





// Save the PDF to a file
// $pdf->Output('F', $filename);
  
// Serve the file for download

// header('Content-Type: application/pdf');
// header('Content-Disposition: attachment; filename="' . $filename . '"');
// readfile($filename);

// Output PDF
// $pdf->Output();
?>
