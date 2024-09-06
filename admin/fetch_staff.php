<?php
include "../includes/db_conn.php";

if(isset($_POST['staff_id'])) {
    $staff_id = $_POST['staff_id'];

    $sql = "SELECT * FROM student_details WHERE staff_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $staff_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(["error" => "No record found"]);
    }
}
?>
