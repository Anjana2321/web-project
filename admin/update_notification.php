<?php
if (isset($_POST['update'])) {
    $msgid = $_POST['msgid'];
    $type = $_POST['type'];
    $message = $_POST['message'];
    $brief_detail = $_POST['brief_detail'];
    
    $file = $_FILES['file']['name'];
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($file);
    
    
    if (!empty($file)) {
        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
            // File upload success
        } else {
            echo "Error uploading file.";
            exit;
        }
    } else {
        $file = ""; // If no new file is uploaded
    }

    // Database connection
    include "../includes/db_conn.php";
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (!empty($file)) {
        $sql = "UPDATE notifications SET type=?, message=?, brief_detail=?, file=? WHERE msgid=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssi', $type, $message, $brief_detail, $file, $msgid);
    } else {
        $sql = "UPDATE notifications SET type=?, message=?, brief_detail=? WHERE msgid=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssi', $type, $message, $brief_detail, $msgid);
    }
    
    if ($stmt->execute()) {
        echo "<script>alert('Notification updated successfully.')</script>";
        echo $msgid." ".$type." ".$message;
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    header("Location: notification.php"); // Redirect back to notifications page
    exit; // Make sure to exit after header redirection
}
?>
