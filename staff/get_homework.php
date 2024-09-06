<?php
header('Content-Type: application/json');
require '../includes/db_conn.php'; // Include your database connection

// Fetch notifications from the database
$query = "SELECT hwid,class,section,subject,date,last_date,description,file FROM homework";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $notifications = [];
    while ($row = $result->fetch_assoc()) {
        $notifications[] = $row;
    }
    echo json_encode($notifications);
} else {
    echo json_encode([]);
}

$conn->close();
?>
