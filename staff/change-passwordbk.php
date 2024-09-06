<?php
include "../includes/db_conn.php";

$admission_no = $_SESSION["admission_number"];

$old_password = $_POST['oldPassword'];
$new_password = $_POST['newPassword'];
$confirm_password = $_POST['confirmPassword'];

// Check if the old password matches the password in the transporter_signup table
$check_sql = "SELECT * FROM `userlogin` WHERE admission_number = ? AND password = ?";
$check_stmt = $conn->prepare($check_sql);

if (!$check_stmt) {
    die("SQL query error: " . $conn->error);
}

$check_stmt->bind_param("ss", $admission_no, $old_password);
$check_stmt->execute();
$check_result = $check_stmt->get_result();

if ($check_result->num_rows == 1) {
    // Old password is a match, check if new password and confirm password match
    if ($new_password === $confirm_password) {
        // Update the password in the transporter_signup table
        $update_sql = "UPDATE `userlogin` SET password = ? WHERE admission_number = ?";
        $update_stmt = $conn->prepare($update_sql);

        if (!$update_stmt) {
            die("SQL query error: " . $conn->error);
        }

        $update_stmt->bind_param("ss", $new_password, $admission_no);

        if ($update_stmt->execute()) {
            // Password updated successfully
          
            echo "<script type='text/javascript'>alert('Updated Successfully');window.location.href='change-password.php';</script>";

           // Make sure to exit to prevent further script execution
        } else {
            echo "Error updating password: " . $conn->error;
        }

        $update_stmt->close();
    } else {
       
            echo "<script type='text/javascript'>alert('New password and confirm password do not match. ');window.location.href='change-password.php';</script>";

    
    }
} else {
    // Old password does not match
    echo "<script type='text/javascript'>alert(' Old password does not match.. ');window.location.href='change-password.php';</script>";

}

$check_stmt->close();
$conn->close();
?>
