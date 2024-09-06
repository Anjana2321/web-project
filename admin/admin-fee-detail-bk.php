<?php

include "../includes/db_conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    

    $feetype = $_POST['feetype'];
    $fee_cat = $_POST['fee_cat'];
    $feeamount = $_POST['feeamount'];
    $strd = $_POST['strd'];
    $last_date = $_POST['last_date'];
    

    $insertSQL = "INSERT INTO `student_fees` (feetype, feecategory, feeamount, class, last_date) 
                      VALUES ('$feetype', '$fee_cat', '$feeamount', '$strd', '$last_date')";
        
    $insertResult = mysqli_query($conn, $insertSQL);

    if ($insertResult) {
            // User is successfully inserted
            // Handle success as needed
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Added Fees Details successfully.')
            window.location.href='admin-fee-detail.php';
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
    header("Location: admin-fee-detail.php");
    exit();
}

?>
