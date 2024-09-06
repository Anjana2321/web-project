<?php

  
include "../includes/db_conn.php";
// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming the form fields have the following names

$staff_name = htmlspecialchars($_POST['staff_name']);
$email = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);
$staff_id = htmlspecialchars($_POST['staff_id']);
$dob = htmlspecialchars($_POST['dob']);
$subject = htmlspecialchars($_POST['subject']);
$blood = htmlspecialchars($_POST['blood']);
$gender = htmlspecialchars($_POST['gender']);
$experience = htmlspecialchars($_POST['experience']);
$dateofjoining = htmlspecialchars($_POST['dateofjoining']);
$address = htmlspecialchars($_POST['address']);
$status = htmlspecialchars($_POST['status']);

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO student_details (staff_name,email,phone,staff_id,dob,subject,blood,gender,experience,dateofjoining,address,status) VALUES (?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?,?)");
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}
$stmt->bind_param("ssssssssssss", $staff_name, $email,$phone,$staff_id,$dob,$subject,$blood,$gender,$experience,$dateofjoining,$address,$status);

// Execute the statement
if ($stmt->execute()) {
    echo '<script>alert("Thank You..! Your Feedback is Valuable to Us"); location.replace(document.referrer);</script>';
} else {
    echo '<script>alert("Error inserting data: ' . $stmt->error . '"); location.replace(document.referrer);</script>';
}

$stmt->close();
$conn->close();

?>
