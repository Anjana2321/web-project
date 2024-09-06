<?php
include "../includes/db_conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetch the last admission number from the database
    $lastAdmissionSQL = "SELECT MAX(admission_number) AS last_admission FROM `userlogin` WHERE user_belongs_group = 2";
    $lastAdmissionResult = mysqli_query($conn, $lastAdmissionSQL);

    if (!$lastAdmissionResult) {
        die("Error fetching last admission number: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($lastAdmissionResult);
    $lastAdmissionNumber = $row['last_admission'];

    // If there is no previous data in the database, start from 5000
    $admissionNumber = empty($lastAdmissionNumber) ? 5000 : $lastAdmissionNumber + 1;

    $stu_name = $_POST['stu_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = 'Welcome';
    $dob = $_POST['dob'];
    $class = $_POST['class'];
    $blood = $_POST['blood'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $user_group = "2";
    $parentid="p".$admissionNumber;

    // Check if the Admission Number already exists
    $checkExistingSQL = "SELECT * FROM `userlogin` WHERE admission_number = '$admissionNumber'";
    $existingResult = mysqli_query($conn, $checkExistingSQL);

    if (!$existingResult) {
        die("Error checking existing admission number: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($existingResult) > 0) {
        // Admission Number already exists
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Admission Number already exists. Please choose a different Admission Number.')
        window.location.href='javascript:history.go(-1)';
        </SCRIPT>");
    } else {
        // Admission Number is unique, proceed with insertion
        $insertSQL = "INSERT INTO `userlogin` (admission_number, student_name, email, contact_number, password, date_of_birth, class, blood_group, gender, address, country, city, pincode, user_belongs_group,parentid) 
                      VALUES ('$admissionNumber', '$stu_name', '$email', '$phone', '$password', '$dob', '$class', '$blood', '$gender', '$address', '$country', '$city', '$pincode', '$user_group','$parentid')";
        
        $insertResult = mysqli_query($conn, $insertSQL);

        if ($insertResult) {
            // User is successfully inserted
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('User registered successfully.')
            window.location.href='regform.php';
            </SCRIPT>");
        } else {
            // Handle insertion error
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Error registering user. Please try again later.')
            window.location.href='javascript:history.go(-1)';
            </SCRIPT>");
        }
    }
} else {
    // Redirect to the form page if accessed directly without a POST request
    header("Location: regform.php");
    exit();
}

$conn->close();
?>
