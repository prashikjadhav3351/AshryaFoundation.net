<?php
session_start();

$username = "Neural";
$server = "localhost";
$password = "AshrayaFoundation";
$db = "Ashraya";

$conn = mysqli_connect($server, $username, $password, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$registration_number = $_GET['registration_number'];

$reg_sql = "SELECT * FROM studentdetails WHERE registration_number = '$registration_number'";
$reg_result = mysqli_query($conn, $reg_sql);

if ($reg_result && mysqli_num_rows($reg_result) > 0) {
    $reg_row = mysqli_fetch_assoc($reg_result);
    $adhar_card_path = $reg_row['Adhar'];
    
     // Check if the file exists
    if (file_exists($adhar_card_path)) {
        // Determine whether to view or download based on 'view' parameter
        $view = isset($_GET['view']) && $_GET['view'] == 'true';

        if ($view) {
            // Determine MIME type dynamically
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime_type = finfo_file($finfo, $adhar_card_path);
            finfo_close($finfo);

            // Set appropriate Content-Type header
            header('Content-Type: ' . $mime_type);

            // Output the file
            readfile($adhar_card_path);
            exit;
        } else {
            // Force download
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($adhar_card_path) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($adhar_card_path));

            // Output the file
            readfile($adhar_card_path);
            exit;
        }
    } else {
        
       
        echo $registration_number;
        // Redirect to docs.php with parameters
        // header("Location: docs.php?registration_number=$registration_number&document=adhar");
        // exit;
    }
} else {
    exit("Error fetching Aadhaar card details: " . mysqli_error($conn));
}

mysqli_close($conn);
?>