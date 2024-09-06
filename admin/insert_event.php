<?php
// Database connection
include "../includes/db_conn.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_title = $_POST['event_title'];
    $event_description = $_POST['event_description'];
    $event_date = $_POST['event_date'];
            // Prepare and bind the SQL statement
            $stmt = $conn->prepare("INSERT INTO events (event_title, event_description, event_date) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $event_title, $event_description, $event_date);

            // Execute the statement
            if ($stmt->execute()) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Event uploaded sucessfully.')
                    window.location.href=' event.php';
                    </SCRIPT>");
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        
}else {
    // Redirect to the form page if accessed directly without a POST request
    header("Location: event.php");
    exit();
}
$conn->close();
?>
