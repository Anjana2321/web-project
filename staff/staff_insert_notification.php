<?php
// Database connection
include "../includes/db_conn.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST['type'];
    $message = $_POST['message'];
    $brief_detail = $_POST['brief_detail'];
    $date = $_POST['date'];
    $file = $_FILES['file'];
    $uploaded_by=$_POST['uploaded_by'];

    // File upload handling
    $target_dir = "../uploads/";
    $target_file = $target_dir . uniqid() . '_' . basename($file["name"]);
    $uploadOk = 1;

    // Allow certain file formats
    $allowedFileTypes = ["jpg", "jpeg", "png", "gif", "pdf", "doc", "docx", "xls", "xlsx", "ppt", "pptx"];
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (in_array($fileType, $allowedFileTypes)) {
        $uploadOk = 1;
    } else {
        echo "Sorry, only JPG, JPEG, PNG, GIF, PDF, DOC, DOCX, XLS, XLSX, PPT, and PPTX files are allowed.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Sorry, file already exists.')
                    window.location.href='  staff_notification.php';
                    </SCRIPT>");
        $uploadOk = 0;
    }

    // Check file size
    if ($file["size"] > 5000000) { // 5MB limit
        echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Sorry, your file is too large.')
                    window.location.href='  staff_notification.php';
                    </SCRIPT>");
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Sorry, there was an error uploading your file.')
                    window.location.href='  staff_notification.php';
                    </SCRIPT>");
    } else {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            // Prepare and bind the SQL statement
            $stmt = $conn->prepare("INSERT INTO  staff_notifications (type, message, brief_detail, date, file, is_read,uploaded_by) VALUES (?, ?, ?, ?, ?, FALSE,?)");
            $stmt->bind_param("ssssss", $type, $message, $brief_detail, $date, $target_file,$uploaded_by);

            // Execute the statement
            if ($stmt->execute()) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert(' staff_notification uploaded sucessfully.')
                    window.location.href='  staff_notification.php';
                    </SCRIPT>");
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        } else {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Sorry, there was an error uploading your file.')
                    window.location.href='  staff_notification.php';
                    </SCRIPT>");
        }
    }
}else {
    // Redirect to the form page if accessed directly without a POST request
    header("Location:   staff_notification.php");
    exit();
}
$conn->close();
?>
