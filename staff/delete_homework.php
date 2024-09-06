<?php
include "../includes/db_conn.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = mysqli_real_escape_string($conn, $_POST['hwid']);

    // SQL query to delete the event
    $sql = "DELETE FROM homework WHERE hwid='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: homework.php"); // Redirect to your main page
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}
?>
