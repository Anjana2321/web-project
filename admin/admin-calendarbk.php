<?php

include "../includes/db_conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $every_year = $_POST['every_year'];
    $badge = $_POST['badge'];

    $insertSQL = "INSERT INTO `calender` (name, date, end_date, type, every_year, description, badge) 
                      VALUES ('$title', '$start_date', '$end_date', '$type', '$every_year', '$description', '$badge')";

    $insertResult = mysqli_query($conn, $insertSQL);

    if ($insertResult) {
        // User is successfully inserted
        // Handle success as needed
        echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Registered successfully.')
            window.location.href='admin-calendar.php';
            </SCRIPT>");
    } else {
        // Handle insertion error
        echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Error registering. Please try again later.')
            window.location.href='javascript:history.go(-1)';
            </SCRIPT>");
    }
} else {
    // Redirect to the form page if accessed directly without a POST request
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Something Went Wrong.')
    window.location.href='admin-calendar.php';
    </SCRIPT>");
  
    exit();
}
