<?php

session_start();
$username="Neural";
$server="localhost";
$password="AshrayaFoundation";
$db="Ashraya";


$conn=mysqli_connect($server,$username,$password,$db);
if(!$conn){
    die (mysqli_connect_error);
}
else{
    // echo("database connected succesfully <br>");
}
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
    $_SESSION['registration_number'] = $registration_number; // Store registration_number in the session
} else {
   
    header("Location: reglog.php?error=registration is required#register");
    exit();
}
?>






<!DOCTYPE html>
<html lang="en">

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">-->
            <!--<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">-->

        
        
        
        
        

    <script>
        function validateForm() {

            var fname = document.getElementById("fname").value;
            var lname = document.getElementById("lname").value;
            var email = document.getElementById("email").value;
            var phone = document.getElementById("phone").value;
            var address = document.getElementById("address").value;


            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var phoneRegex = /^\d{10}$/;


            if (fname.trim() === '') {
                alert("Please enter your first name.");
                return false;
            }
            if (lname.trim() === '') {
                alert("Please enter your last name.");
                return false;
            }
            if (address.trim() === '') {
                alert("Please enter your Address.");
                return false;
            }
            if (!emailRegex.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }
            if (!phoneRegex.test(phone)) {
                alert("Please enter a valid 10-digit phone number.");
                return false;
            }

            return true;
        }
    </script>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarship Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Custom CSS */

        body {
            /* background-color: red; */


        }



        .container {
            background-color: white;
            opacity: 0.79;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-label {
            font-weight: 700;
        }

        .btn-primary {
            background-color: skyblue;
            border-color: #007bff;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .form-control {
            /* width: 80%; */
            background-color: white;
            opacity: 1;
            margin: 10px auto;
            padding: 6px;
            font-size: 14px;
            border-radius: 6px;
            border: solid 1.8px black;
            outline: none;

        }

        /* .bg {
            display: flex;
            justify-content: center; */
        /* Horizontally center items */
        /* align-items: center; */
        /* Vertically center items */
        /* flex-wrap: wrap;
            width: 100%;
            height: 50%;
            border-radius: 50%;
        } */

        /* .bg img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 50%;
        } */

        .head {
            
            margin-top: -58px;
            
        }

        .bg {
            width: 70%;
            margin-top: 15px;
            margin-left: 250px;
            position: absolute;
            z-index: -1;
            opacity: 0.6;
        }
    </style>

    <style>
        .head {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .head img:first-child {
            flex-shrink: 0;
            /* Prevents the first image from shrinking */
            margin-left: 10px;
            /* Adds some space between the images */
            width: 200px;
        }

        .head .right-section {

            display: flex;
            flex-direction: column;
            flex-grow: 1;
           
            margin-top: 50px;
        }

        .head .right-section img {
            width: 1000px;
            height: 200px;
            display: flex;
           
        }

        .head h3 {

            text-align: center;
            /* Aligns the h3 to the right */
        }

       

.logo {
    max-width: 70%; 
    margin-left:0 ;
}

.im {
    max-width: 100%; 
}

h3 {
    font-size: 16px; /* Initial font size */
    margin: 0; /* Remove default margins */
}

/* Media query for smaller screens */
@media only screen and (max-width: 600px) {
    .head img:first-child {
            flex-shrink: ;
            
            margin-left: -25px;
            /* Adds some space between the images */
            width: 200px;
        }
        .head .right-section img {
            width: 1400px;
            height: 100px;
            display: flex;
           
        }
    .logo {
        max-width: 80px; /* Adjust the logo size for smaller screens */
    }

    .im {
        display: none;
        
    }

    h3 {
        font-size: 14px; /* Reduce font size for smaller screens */
        margin: 10px 0; /* Add some margin between elements in smaller screens */
    }
}

@media only screen and (max-width: 420px) {
    .head img:first-child {
            flex-shrink: ;
            
            margin-left: -15px;
            
            width: 100px;
        }
        .head img{
           
        }
        .head .right-section .im {
            margin-left: 5px;
            width: 1000px;
            height: 70px;
            display: flex;
           

        }
        .head .right-section .lg {
            margin-top: -10px;
        }
        h3 {
        font-size: 10px; 
        margin: -1px 0; 
}
.container {
    margin-top:0px ;
}
}
    </style>

    <script>
        async function handleSubmit(event) {
            event.preventDefault();

            const form = document.getElementById('applicationForm');
            const formData = new FormData(form);

            try {
                // Submit the form data to sform_submit.php (for database insertion)
                const response1 = await fetch('sform-submit.php', {
                    method: 'POST',
                    body: formData
                });

                if (!response1.ok) {
                    throw new Error('Error submitting the form data to sform_submit.php');
                }

                // Submit the form data to pd.php to generate the PDF
                const response2 = await fetch('pd1.php', {
                    method: 'POST',
                    body: formData
                });

                if (!response2.ok) {
                    throw new Error('Error generating the PDF');
                }

                // Create a blob from the PDF response and get the download URL
                const blob = await response2.blob();
                const downloadUrl = window.URL.createObjectURL(blob);

                // Redirect to the confirmation page with a query parameter for the PDF URL
                window.location.href = `confirm.php?url=${encodeURIComponent(downloadUrl)}`;
            } catch (error) {
                console.error('Error:', error);
                // Optionally, show an error message to the user here
            }
        }

    </script>


    <div class="container">
        <div class="head">
            <img src="./Images/Add_a_subheading__1_-removebg-preview.png" alt="ASHRAYA_LOGO" class="lg">
            <div class="right-section">
                <img src="./Images/WhatsApp Image 2024-06-04 at 12.06.34.jpeg" alt="ASHRAYA FOUNDATION" class="im">
                <h3 >(Registered under Mumbai Public Trust Act, vide Registration No. E-31308)</h3>
            </div>
        </div>

        <h1 class="text-center mt-5 mb-4">Scholarship Application Form</h1>
        <form action="sform-submit.php" method="post" name="as" enctype="multipart/form-data" id="applicationForm">
            <!-- Personal Information -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fname" name="fname">
                </div>
                <div class="col-md-4">
                    <label for="faName" class="form-label">Father's Name</label>
                    <input type="text" class="form-control" id="faname" name="faname">
                </div>
                <div class="col-md-4">
                    <label for="mName" class="form-label">Mother's Name</label>
                    <input type="text" class="form-control" id="mname" name="mname">
                </div>
            </div>
            <!-- Address -->
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3"></textarea>
            </div>
            <!-- Contact Information -->
            <div class="row mb-3">
                <!-- <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div> -->
                 
                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="phone" name="phone">
                </div>
                <div class="col-md-6">
                <label for="Aphone" class="form-label">Alternate Contact</label>
                <input type="tel" class="form-control" id="aphone" name="aphone">
            </div>
            </div>

           
            <!-- Academic Information -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="qualification" class="form-label">Qualification</label>
                    <input type="text" class="form-control" id="qualification" name="qualification">
                </div>
                <div class="col-md-6">
                    <label for="course" class="form-label">Course to be Pursued</label>
                    <select class="form-select" id="course" name="course">
                        <option value="">Select a course</option>
                        <option value="Computer Science">Computer Science</option>
                        <option value="Engineering">Engineering</option>
                        <option value="Medicine">Medicine</option>
                    </select>
                </div>
            </div>
            <!-- Institution Information -->
            <div class="mb-3">
                <label for="institution" class="form-label">Institution</label>
                <input type="text" class="form-control" id="institution" name="institution">
            </div>
            <!-- Academic Performance -->
            <h3 class="mt-4 mb-3">Past Performance For 3 Years</h3>
            <!-- Year 1 -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="year1" class="form-label">Academic Year</label>
                    <input type="text" class="form-control" id="year1" name="year1">
                </div>
                <div class="col-md-3">
                    <label for="course1" class="form-label">Course</label>
                    <input type="text" class="form-control" id="course1" name="course1">
                </div>
                <div class="col-md-3">
                    <label for="term1" class="form-label">Term</label>
                    <input type="text" class="form-control" id="term1" name="term1">
                </div>
                <div class="col-md-3">
                    <label for="marksObtained1" class="form-label">Marks Obtained /Total Marks</label>
                    <input type="text" class="form-control" id="marksObtained1" name="marksObtained1" placeholder="50/100">
                </div>
            </div>
            <!-- Year 2 -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="year2" class="form-label">Academic Year</label>
                    <input type="text" class="form-control" id="year2" name="year2">
                </div>
                <div class="col-md-3">
                    <label for="course2" class="form-label">Course</label>
                    <input type="text" class="form-control" id="course2" name="course2">
                </div>
                <div class="col-md-3">
                    <label for="term2" class="form-label">Term</label>
                    <input type="text" class="form-control" id="term2" name="term2">
                </div>
                <div class="col-md-3">
                    <label for="marksObtained2" class="form-label">Marks Obtained / Total Marks</label>
                    <input type="text" class="form-control" id="marksObtained2" name="marksObtained2"  placeholder="50/100">
                </div>
            </div>
            <!-- Year 3 -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="year3" class="form-label">Academic Year</label>
                    <input type="text" class="form-control" id="year3" name="year3">
                </div>
                <div class="col-md-3">
                    <label for="course3" class="form-label">Course</label>
                    <input type="text" class="form-control" id="course3" name="course3">
                </div>
                <div class="col-md-3">
                    <label for="term3" class="form-label">Term</label>
                    <input type="text" class="form-control" id="term3" name="term3">
                </div>
                <div class="col-md-3">
                    <label for="marksObtained3" class="form-label">Obtained Marks / Total Marks</label>
                    <input type="text" class="form-control" id="marksObtained3" name="marksObtained3"  placeholder="50/100">
                </div>
            </div>
            <!-- Estimated Expenses -->
            <h3 class="mt-4 mb-3">Estimated Expenses For Current Year</h3>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="fees" class="form-label">School/ College Fees</label>
                    <input type="number" class="form-control" id="fees" name="fees" >
                </div>
                <div class="col-md-6">
                    <label for="tfees" class="form-label">Other Amount Payable to College (Except Tuition, Term, and
                        Exam Fees)</label>
                    <input type="number" class="form-control" id="tfees" name="tfees" >
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="otherExpenses" class="form-label">All Other Expenses for Studies (Outside Coaching,
                        Hostel, etc.)</label>
                    <input type="number" class="form-control" id="otherExpenses" name="otherExpenses" >
                </div>
                <div class="col-md-6">
                    <label for="totalFees" class="form-label">Total</label>
                    <input type="number" class="form-control" id="totalFees" name="totalFees" readonly>
                </div>
            </div>
            <script>
                function calculateTotal() {
                    // Get the values of the fees inputs
                    const fees = parseFloat(document.getElementById('fees').value) || 0;
                    const tfees = parseFloat(document.getElementById('tfees').value) || 0;
                    const otherExpenses = parseFloat(document.getElementById('otherExpenses').value) || 0;

                    // Calculate the total fees
                    const totalFees = fees + tfees + otherExpenses;

                    // Set the total fees value
                    document.getElementById('totalFees').value = totalFees;
                }

                // Add event listeners to the inputs to trigger the calculation on change
                document.addEventListener('DOMContentLoaded', (event) => {
                    document.getElementById('fees').addEventListener('input', calculateTotal);
                    document.getElementById('tfees').addEventListener('input', calculateTotal);
                    document.getElementById('otherExpenses').addEventListener('input', calculateTotal);
                });
            </script>


            <style>
                .flat-detail {
                    /* border: 1px solid #fabebe; */
                    padding: 15px;
                    border-radius: 5px;
                    margin-bottom: 10px;
                    background-color: #f9f9f9;
                }

                h3,
                .form-label {
                    color: black;
                    /* Change the color to black */
                }
            </style>



            <!-- Association with Oberoi Woods -->
            <h3 class="mb-4">Association with Oberoi Woods</h3>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="reln" class="form-label">Name and Relation with person (working at Oberoi Woods)</label>
                    <input type="text" class="form-control" id="reln" name="reln">
                </div>
                <div class="col-md-6">
                    <label for="job" class="form-label">Staff of Oberoi Woods Society (Working As)</label>
                    <select class="form-select form-control" id="job" name="job" onchange="showReasonInput()">
                        <option value="">Select</option>
                        <option value="Gardener">Gardener</option>
                        <option value="Security">Security</option>
                        <option value="Electrician">Electrician</option>
                        <option value="Carpenter">Carpenter</option>
                        <option value="Painter">Painter</option>
                        <option value="Housekeeping">Housekeeping</option>
                        <option value="Gym instructor">Gym instructor</option>
                        <option value="Housemaid">House maid</option>
                        <option value="Cook">Cook</option>
                        <option value="others">Others..</option>
                    </select>
                </div>


                <div id="reasonInput" style="display: none;">
                    <div class="col-md-6">
                        <label for="reason" class="form-label">Please specify</label>
                        <input type="text" class="form-control" id="reason" name="reason">
                    </div>
                </div>

                <div id="cookHousemaidInput" style="display: none;">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="numFlats" class="form-label">Number of Flats they Work At</label>


                            <select class="form-select form-control" id="numFlats" name="numFlats" min="1" max="10"
                                onchange="generateFlatFields()">
                                <option value="">Select</option>
                                <?php
                                
                                for ($i = 1; $i <= 10; $i++) {
                                             echo "<option value=\"$i\">$i</option>";
                                                            }
                                                            ?>
                            </select>

                        </div>
                    </div>
                    <div id="flatDetails"></div>
                </div>
            </div>

            <script>
                function showReasonInput() {
                    var jobSelect = document.getElementById("job");
                    var reasonInput = document.getElementById("reasonInput");
                    var cookHousemaidInput = document.getElementById("cookHousemaidInput");

                    if (jobSelect.value === "Cook" || jobSelect.value === "Housemaid") {
                        reasonInput.style.display = "none";
                        cookHousemaidInput.style.display = "block";
                    } else if (jobSelect.value === "others") {
                        reasonInput.style.display = "block";
                        cookHousemaidInput.style.display = "none";
                    } else {
                        reasonInput.style.display = "none";
                        cookHousemaidInput.style.display = "none";
                    }
                }

                function generateFlatFields() {
                    var numFlats = document.getElementById("numFlats").value;
                    var flatDetails = document.getElementById("flatDetails");
                    flatDetails.innerHTML = '';  // Clear any existing fields

                    for (var i = 1; i <= numFlats; i++) {
                        var flatDiv = document.createElement("div");
                        flatDiv.className = "flat-detail";

                        var rowDiv = document.createElement("div");
                        rowDiv.className = "row";

                        var colDiv1 = document.createElement("div");
                        colDiv1.className = "col-md-6";

                        var workPlaceLabel = document.createElement("label");
                        workPlaceLabel.className = "form-label";
                        workPlaceLabel.innerHTML = "Where do you work (Flat " + i + ")";
                        colDiv1.appendChild(workPlaceLabel);

                        var workPlaceInput = document.createElement("input");
                        workPlaceInput.type = "text";
                        workPlaceInput.className = "form-control";
                        workPlaceInput.name = "workPlace" + i;
                        colDiv1.appendChild(workPlaceInput);

                        var colDiv2 = document.createElement("div");
                        colDiv2.className = "col-md-6";

                        var facilityLabel = document.createElement("label");
                        facilityLabel.className = "form-label";
                        facilityLabel.innerHTML = "Facilities provided by the owner (Flat " + i + ")";
                        colDiv2.appendChild(facilityLabel);

                        var facilityInput = document.createElement("input");
                        facilityInput.type = "text";
                        facilityInput.className = "form-control";
                        facilityInput.name = "facility" + i;
                        colDiv2.appendChild(facilityInput);

                        rowDiv.appendChild(colDiv1);
                        rowDiv.appendChild(colDiv2);
                        flatDiv.appendChild(rowDiv);

                        var rowDiv2 = document.createElement("div");
                        rowDiv2.className = "row mt-3";

                        var colDiv3 = document.createElement("div");
                        colDiv3.className = "col-md-6";

                        var ownerNameLabel = document.createElement("label");
                        ownerNameLabel.className = "form-label";
                        ownerNameLabel.innerHTML = "Owner's Name (Flat " + i + ")";
                        colDiv3.appendChild(ownerNameLabel);

                        var ownerNameInput = document.createElement("input");
                        ownerNameInput.type = "text";
                        ownerNameInput.className = "form-control";
                        ownerNameInput.name = "ownerName" + i;
                        colDiv3.appendChild(ownerNameInput);

                        var colDiv4 = document.createElement("div");
                        colDiv4.className = "col-md-6";

                        var ownerContactLabel = document.createElement("label");
                        ownerContactLabel.className = "form-label";
                        ownerContactLabel.innerHTML = "Owner's Contact Number (Flat " + i + ")";
                        colDiv4.appendChild(ownerContactLabel);

                        var ownerContactInput = document.createElement("input");
                        ownerContactInput.type = "text";
                        ownerContactInput.className = "form-control";
                        ownerContactInput.name = "ownerContact" + i;
                        colDiv4.appendChild(ownerContactInput);

                        rowDiv2.appendChild(colDiv3);
                        rowDiv2.appendChild(colDiv4);
                        flatDiv.appendChild(rowDiv2);

                        flatDetails.appendChild(flatDiv);
                    }
                }
            </script>




            <!-- Other Information -->
            <h3 class="mt-4 mb-3">Other Information</h3>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="laptop" class="form-label">Do You Have a Laptop?</label>
                    <select class="form-select" id="laptop" name="laptop">
                        <option value="">Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="pc" class="form-label">Do You Have a PC?</label>
                    <select class="form-select" id="pc" name="pc">
                        <option value="">Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
            </div>
            <!--<div class="row mb-3">-->
            <!--    <div class="col-md-6">-->
            <!--        <label for="tuition" class="form-label">Do You Have Online Tuition?</label>-->
            <!--        <select class="form-select" id="tuition" name="tuition">-->
            <!--            <option value="">Select</option>-->
            <!--            <option value="Yes">Yes</option>-->
            <!--            <option value="No">No</option>-->
            <!--        </select>-->
            <!--    </div>-->
                
                
                
                
                
                    <script>
        function handleTuitionChange() {
            var tuitionSelect = document.getElementById('tuition');
            var specifyDiv = document.getElementById('specify-div');

            if (tuitionSelect.value === 'Yes') {
                specifyDiv.style.display = 'block';
            } else {
                specifyDiv.style.display = 'none';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            var tuitionSelect = document.getElementById('tuition');
            tuitionSelect.addEventListener('change', handleTuitionChange);
        });
    </script>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="tuition" class="form-label">Do You Have Online Tuition?</label>
                <select class="form-select" id="tuition" name="tuition">
                    <option value="">Select</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
                
                <div class="row mb-3" id="specify-div" style="display: none;">
            <div class="col-md-6">
                <label for="specify" class="form-label">Please specify:</label>
                <input type="text" class="form-control" id="tuition" name="tuition">
            </div>
        </div>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
            <!--    <div class="col-md-6">-->
            <!--        <label for="hobbies" class="form-label">If you are good at other activities, then give-->
            <!--            details</label>-->
            <!--        <select class="form-select" id="hobbies" name="hobbies">-->
            <!--            <option value="">Select</option>-->
            <!--            <option value="Drawing">Drawing</option>-->
            <!--            <option value="Dancing">Dancing</option>-->
            <!--            <option value="Sports">Sports</option>-->
            <!--            <option value="Music">Music</option>-->
            <!--            <option value="Acting">Acting</option>-->
            <!--            <option value="Reading">Reading</option>-->
            <!--            <option value="Swimming">Swimming</option>-->
            <!--            <option value="Poetry">Poetry</option>-->
            <!--            <option value="Others">Others</option>-->
            <!--        </select>-->
            <!--    </div>-->
            <!--</div>-->
            

    <div class="col-md-6">
        <style>
        /* CSS for dropdown menu */
        .dropdown-menu {
            position: absolute;
            display: none;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 10px;
            width: 300px; /* Adjust width as needed */
            max-height: 300px; /* Optional: Add max-height for scrolling if content exceeds */
            overflow-y: auto; /* Optional: Add vertical scrolling if content exceeds max-height */
            z-index: 1000; /* Ensure it's above other content */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional: Add shadow for a floating effect */
        }

        .dropdown-menu.show {
            display: block;
        }
    </style>
        <label for="hobbiesDropdown" class="form-label">If you are good at other activities, then give details</label>
        <div class="dropdown">
            <div id="hobbiesDropdown" class="dropdown-toggle">Select</div>
            <div class="dropdown-menu">
                        <div class="form-check dropdown-item">
        <input class="form-check-input" type="checkbox" value="Drawing" id="drawing" name="hobbies[]">
        <label class="form-check-label" for="drawing">Drawing</label>
    </div>
    <div class="form-check dropdown-item">
        <input class="form-check-input" type="checkbox" value="Dancing" id="dancing" name="hobbies[]">
        <label class="form-check-label" for="dancing">Dancing</label>
    </div>
    <div class="form-check dropdown-item">
        <input class="form-check-input" type="checkbox" value="Sports" id="sports" name="hobbies[]">
        <label class="form-check-label" for="sports">Sports</label>
    </div>
    <div class="form-check dropdown-item">
        <input class="form-check-input" type="checkbox" value="Music" id="music" name="hobbies[]">
        <label class="form-check-label" for="music">Music</label>
    </div>
    <div class="form-check dropdown-item">
        <input class="form-check-input" type="checkbox" value="Acting" id="acting" name="hobbies[]">
        <label class="form-check-label" for="acting">Acting</label>
    </div>
    <div class="form-check dropdown-item">
        <input class="form-check-input" type="checkbox" value="Reading" id="reading" name="hobbies[]">
        <label class="form-check-label" for="reading">Reading</label>
    </div>
    <div class="form-check dropdown-item">
        <input class="form-check-input" type="checkbox" value="Swimming" id="swimming" name="hobbies[]">
        <label class="form-check-label" for="swimming">Swimming</label>
    </div>
    <div class="form-check dropdown-item">
        <input class="form-check-input" type="checkbox" value="Poetry" id="poetry" name="hobbies[]">
        <label class="form-check-label" for="poetry">Poetry</label>
    </div>
    <div class="form-check dropdown-item">
        <input class="form-check-input" type="checkbox" value="Others" id="others" name="hobbies[]">
        <label class="form-check-label" for="others">Others</label>
    </div>
            </div>
        </div>
    <input type="hidden" id="concatenatedHobbies" name="hobbies">

    <script>
    
            function updateConcatenatedHobbies() {
                // Get all checkboxes
                let checkboxes = document.querySelectorAll('input[name="hobbies[]"]:checked');
            
                // Create an array to store selected hobby values
                let selectedHobbies = [];
            
                // Iterate over checked checkboxes and push their values to the array
                checkboxes.forEach(function(checkbox) {
                    selectedHobbies.push(checkbox.value);
                });
            
                // Join the selected hobbies into a single string separated by commas
                let concatenatedString = selectedHobbies.join(', ');
            
                // Set the concatenated string as the value of the hidden input field
                document.getElementById('concatenatedHobbies').value = concatenatedString;
            }
            
            // Add event listener to checkboxes to update concatenated hobbies on click
            document.querySelectorAll('input[name="hobbies[]"]').forEach(function(checkbox) {
                checkbox.addEventListener('click', updateConcatenatedHobbies);
            });
    
        document.getElementById('hobbiesDropdown').addEventListener('click', function() {
            this.nextElementSibling.classList.toggle('show');
        });

        document.addEventListener('click', function(e) {
            const dropdown = document.querySelector('.dropdown-menu');
            if (!dropdown.contains(e.target) && e.target.id !== 'hobbiesDropdown') {
                dropdown.classList.remove('show');
            }
        });

        const checkboxes = document.querySelectorAll('.form-check-input');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const selected = Array.from(checkboxes).filter(i => i.checked).map(i => i.nextElementSibling.textContent).join(', ');
                document.getElementById('hobbiesDropdown').textContent = selected || 'Select';
            });
        });
    </script>
</div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="ashrayaSupport" class="form-label">What should Ashraya do for you?</label>
                    <select class="form-select" id="ashrayaSupport" name="ashrayaSupport">
                        <option value="">Select</option>
                        <option value="Aptitude-test">Aptitude test</option>
                        <option value="Personality-development">Personality development</option>
                        <option value="Sponsor-outside-coaching">Sponsor outside coaching</option>
                        <option value="Employment-training">Employment training</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
              
                
                    <script>
        function toggleYearsDropdown() {
            const scholarshipPast = document.querySelector('input[name="scholarshipPast"]:checked').value;
            const yearsDropdown = document.getElementById('yearsDropdown');
            if (scholarshipPast === 'yes') {
                yearsDropdown.style.display = 'block';
            } else {
                yearsDropdown.style.display = 'none';
            }
        }
    </script>
                
                    <div class="col-md-6">
        <label for="scholarshipPast" class="form-label">Did you get a scholarship from Ashraya in the past? If yes, for how many years?</label><br>
        <div>
            <input type="radio" id="scholarshipPastNo" name="scholarshipPast" value="yes" onclick="toggleYearsDropdown()">
            <label for="scholarshipPastYes">Yes</label>
        </div>
        <div>
            <input type="radio" id="scholarshipPastNo" name="scholarshipPast" value="no" onclick="toggleYearsDropdown()">
            <label for="scholarshipPastNo">No</label>
        </div>
    </div>
    <div class="col-md-6" id="yearsDropdown" style="display: none;">
        <label for="yearsOfScholarship" class="form-label">Select number of years:</label>
        <select class="form-control" id="scholarshipPastYes" name="scholarshipPast">
            <option value="1">1 year</option>
            <option value="2">2 years</option>
            <option value="3">3 years</option>
            <option value="4">4 years</option>
            <option value="5">5 years</option>
            <option value="6">6 years</option>
            <option value="7">7 years</option>
            <option value="8">8 years</option>
        </select>
    </div>

            
        
            
          
                
                
                
                
                 <script>
        function toggleDetails() {
            var otherScholarship = document.getElementById("otherScholarship");
            var detailsDiv = document.getElementById("scholarshipDetails");
            if (otherScholarship.value === "Yes") {
                detailsDiv.style.display = "block";
            } else {
                detailsDiv.style.display = "none";
            }
        }
    </script>
    
    <div class="row mb-3">
            <div class="col-md-6">
                <label for="otherScholarship" class="form-label">Have you applied for a scholarship elsewhere? If yes, give details</label>
                <select class="form-select" id="otherScholarship" name="otherScholarship" onchange="toggleDetails()">
                    <option value="">Select</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
        <div class="row mb-3" id="scholarshipDetails" style="display:none;">
            <div class="col-md-6">
                <label for="scholarshipDetailsInput" class="form-label">Please specify where you applied for the scholarship</label>
                <input type="text" class="form-control" id="otherScholarship" name="otherScholarship">
            </div>
        </div>
                
                
                
                
                
                
                
                
                
                
                

                
                
                
                
                
                
                
                <!-- Upload Documents -->
               <div class="col-md-6">
    <label for="fileupload" class="form-label">Upload Your Aadhar Card</label><br>
    <input type="file" class="form-control" id="Adhar" name="Adhar">
    <span id="imgValidationMessage" style="color:red;"></span>
</div>

<div class="col-md-6">
    <label for="marksheet" class="form-label">Upload Your Marksheets</label><br>
    <input type="file" class="form-control" id="Marksheet" name="Marksheet">
    <span id="pdfValidationMessageMarksheet" style="color:red;"></span>
</div>

<div class="col-md-6">
    <label for="fee_rec" class="form-label">Upload Your Fee Receipt</label><br>
    <input type="file" class="form-control" id="fee_rec" name="fee_rec">
    <span id="pdfValidationMessageFeeRec" style="color:red;"></span>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#Marksheet").on("change", function() {
            var fileInput = $(this)[0];
            var maxFileSize = 5*1024 * 1024;
            var allowedExtension = "pdf";
            var errorMessageSpan = $("#pdfValidationMessageMarksheet");
            var fileExtension = fileInput.value.split('.').pop().toLowerCase();

            if (fileExtension !== allowedExtension) {
                errorMessageSpan.text("Only PDF files are allowed.").slideDown("slow");
                fileInput.value = ""; // Clear the file input
            } else {
                errorMessageSpan.slideUp("slow"); // Hide error message
            }
              // Check file size
            if (fileInput.files[0].size > maxFileSize) {
                errorMessageSpan.text("File should be less than 5 MB.").slideDown("slow");
                fileInput.value = ""; // Clear the file input
            } else {
                errorMessageSpan.slideUp("slow"); // Hide error message for size
            }
        });

        $("#fee_rec").on("change", function() {
            var fileInput = $(this)[0];
            var maxFileSize = 5*1024 * 1024;
            var allowedExtension = "pdf";
            var errorMessageSpan = $("#pdfValidationMessageFeeRec");
            var fileExtension = fileInput.value.split('.').pop().toLowerCase();

            if (fileExtension !== allowedExtension) {
                errorMessageSpan.text("Only PDF files are allowed.").slideDown("slow");
                fileInput.value = ""; // Clear the file input
            } else {
                errorMessageSpan.slideUp("slow"); // Hide error message
            }
            
            // Check file size
            if (fileInput.files[0].size > maxFileSize) {
                errorMessageSpan.text("File should be less than 5 MB.").slideDown("slow");
                fileInput.value = ""; // Clear the file input
            } else {
                errorMessageSpan.slideUp("slow"); // Hide error message for size
            }
            
        });

        $("#Adhar").on("change", function() {
            var fileInput = $(this)[0];
            var allowedExtensions = ["jpg", "jpeg", "png","pdf"];
            var maxFileSize = 1024 * 1024; // 1 MB in bytes
            var errorMessageSpan = $("#imgValidationMessage");
            
            // Check file extension
            var fileExtension = fileInput.value.split('.').pop().toLowerCase();
            if (!allowedExtensions.includes(fileExtension)) {
                errorMessageSpan.text("Only jpg,pdf, png, and jpeg files are allowed.").slideDown("slow");
                fileInput.value = ""; // Clear the file input
                return; // Exit function if extension is not allowed
            } else {
                errorMessageSpan.slideUp("slow"); // Hide error message for extension
            }
        
            // Check file size
            if (fileInput.files[0].size > maxFileSize) {
                errorMessageSpan.text("Image should be less than 1 MB.").slideDown("slow");
                fileInput.value = ""; // Clear the file input
            } else {
                errorMessageSpan.slideUp("slow"); // Hide error message for size
            }
        });

        
    });
</script>
     
            
            <!-- Submit Button -->
            <br>
            <br>
            <div class="text-center">
                <input type="submit" class="btn btn-primary btn-lg btn-block"></input>
            </div>
        </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>-->

    </body>

</html>