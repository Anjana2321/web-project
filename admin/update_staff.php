<?php
include "../includes/db_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $staff_id = $_POST['staff_id'];
    $staff_name = $_POST['staff_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $subject = $_POST['subject'];
    $gender = $_POST['gender'];
    $dateofjoining = $_POST['dateofjoining'];
    $experience = $_POST['experience'];
    $address = $_POST['address'];
    $status = $_POST['status'];

    $sql_update = "UPDATE student_details SET staff_name=?, email=?, phone=?, dob=?,  subject=?, gender=?, dateofjoining=?, experience=?, address=?, status=? WHERE staff_id=?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("sssssssssss", $staff_name, $email, $phone, $dob, $subject, $gender, $dateofjoining, $experience, $address, $status, $staff_id);

    if ($stmt_update->execute()) {
        echo "Staff details updated successfully.";
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Staff details updated successfully.')
        window.location.href=' staff-detail.php';
        </SCRIPT>");;
    } else {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Error updating staff details: ')
        window.location.href='  staff-detail.php';
        </SCRIPT>");;
    }
}
?>
