<?php
include "../includes/db_conn.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    // SQL query to delete the event
    $sql = "DELETE FROM events WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: event.php"); // Redirect to your main page
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}
?>
