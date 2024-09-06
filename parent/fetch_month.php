<?php

include "../includes/db_conn.php";

try {
  if (isset($_POST['monthIndex'])) {
    $monthIndex = date('m', strtotime($_POST['monthIndex']));
    // Log the received month index value
    file_put_contents('debug.log', 'Received month index: ' . $monthIndex . PHP_EOL, FILE_APPEND);
  
  } else {
    $monthIndex = date('m');
  }

  

  // Query to select rows with dates in the selected month
  $query = "SELECT * FROM calender WHERE MONTH(date) = '$monthIndex'";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    throw new Exception("Error fetching data: " . mysqli_error($conn));
  }

  // Initialize variable to hold HTML content
  $html = '';

  // Process the fetched data and generate HTML content
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      // Append leave details HTML
      $html .= '<br>';
      $html .= '<div class="leave">';
      $html .= '<div class="date-circle">';
      $html .= '<div class="day">' . date('d', strtotime($row['date'])) . '</div>';
      $html .= '</div>';
      $html .= '<div class="leave-info">';
      $html .= '<h3>' . $row['name'] . '</h3>';
      $html .= '<p>' . $row['description'] . '</p>';
      $html .= '</div>';
      $html .= '</div>';
    }
  } else {
   
    $html .= '<br>';
      $html .= '<div class="leave">';
      $html .= '<div class="leave-info">';
      $html .= '<h3 style="text-align:center;">No Data Found </h3>';
      $html .= '</div>';
      $html .= '</div>';
  }

  // Output HTML content
  echo $html;

  mysqli_close($conn);
} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}
?>
