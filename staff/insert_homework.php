<?php
// Database connection
include "../includes/db_conn.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $class = $_POST['class'];
    $section = $_POST['section'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $last_date = $_POST['last_date'];
    $file = $_FILES['file'];

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
        echo "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Sorry, file already exists.');
                window.location.href='homework.php';
              </SCRIPT>";
        $uploadOk = 0;
    }

    // Check file size
    if ($file["size"] > 5000000) { // 5MB limit
        echo "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Sorry, your file is too large.');
                window.location.href='homework.php';
              </SCRIPT>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Sorry, there was an error uploading your file.');
                window.location.href='homework.php';
              </SCRIPT>";
    } else {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            // Prepare and bind the SQL statement
            $stmt = $conn->prepare("INSERT INTO homework (class, section, subject, date, last_date, description, file) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $class, $section, $subject, $date, $last_date, $description, $target_file);

            // Execute the statement
            if ($stmt->execute()) {
                echo "<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Homework uploaded successfully.');
                        window.location.href='homework.php';
                      </SCRIPT>";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        } else {
            echo "<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Sorry, there was an error uploading your file.');
                    window.location.href='homework.php';
                  </SCRIPT>";
        }
    }
} else {
    // Redirect to the form page if accessed directly without a POST request
    header("Location: homework.php");
    exit();
}

$conn->close();
?>
