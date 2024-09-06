<?php
include "../includes/db_conn.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $event_title = mysqli_real_escape_string($conn, $_POST['event_title']);
    $event_description = mysqli_real_escape_string($conn, $_POST['event_description']);
    $event_date = mysqli_real_escape_string($conn, $_POST['event_date']);

    $sql = "UPDATE events SET event_title='$event_title', event_description='$event_description', event_date='$event_date' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Event Updated Successfully')
        window.location.href=' event.php';
        </SCRIPT>");
        header("Location: event.php"); // Redirect to your main page
    } else {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Error Updating the Event')
        window.location.href=' event.php';
        </SCRIPT>");;
    }

    $conn->close();
}
?>
