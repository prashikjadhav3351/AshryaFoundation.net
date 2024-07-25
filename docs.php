<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
$username="Neural";
$server="localhost";
$password="AshrayaFoundation";
$db="Ashraya";


$con=mysqli_connect($server,$username,$password,$db);
if(!$con){
    die ("connection not done".mysqli_connect_error);
}


// Function to retrieve the file path of the document from the database
function getDocumentPath($registration_number, $document_type, $con) {
    $sql = "";
    switch ($document_type) {
        case 'adhar':
            $sql = "SELECT Adhar FROM studentdetails WHERE registration_number = ?";
            break;
        case 'marksheet':
            $sql = "SELECT marksheet FROM studentdetails WHERE registration_number = ?";
            break;
        case 'fee_rec':
            $sql = "SELECT fee_rec FROM studentdetails WHERE registration_number = ?";
            break;
        default:
            die("Invalid document type");
    }

    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $registration_number); // Assuming registration_number is a string
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($document_path);
    $stmt->fetch();
    $stmt->close();
    return $document_path;
}

if (!isset($_GET['registration_number']) || !isset($_GET['document'])) {
    die("Registration number or document type not provided");
}

$registration_number = $_GET['registration_number'];
$document_type = $_GET['document'];

$document_path = getDocumentPath($registration_number, $document_type, $con);

if (empty($document_path)) {
    die("Document not found");
}

// Determine whether to view or download the document based on user choice
$view = isset($_GET['view']) ? $_GET['view'] : false;



// Set appropriate headers to force download
header('Content-Description: File Transfer');
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . $document_type . '_' . $registration_number . '.pdf"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($document_path));

// Output the content of the PDF file
readfile($document_path);
exit();
?>


?>
