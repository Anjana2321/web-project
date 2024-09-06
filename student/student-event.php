<?php 
include "student-header.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$searchDate = $_GET['searchDate'] ?? ''; // Get search date from query parameter

// SQL query with conditional date filtering
$sql = "SELECT id, event_date, event_title, event_description FROM events"; // Assuming there's an `id` column in the `events` table
if (!empty($searchDate)) {
    $sql .= " WHERE event_date = '" . mysqli_real_escape_string($conn, $searchDate) . "'";
}

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KRP</title>
    <link rel="icon" type="image/x-icon" href="../Image/LOGO.png">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.8.335/pdf.min.js"></script>
</head>
<body>

<div class="container mt-4">
<h3 class="h3-head mb-3 text-center">Events</h3>
<div class="admission-det">
        <section class="admission-det">
            <form method="GET" action="">
                <div class="search mb-5">
                    <input type="text" class="searchTerm" autocomplete="off" name="searchDate" value="<?php echo htmlspecialchars($searchDate); ?>" placeholder="Year-Month-Day">
                    <button type="submit" class="searchButton">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
        </section>           
    </div>
    
        <div class="event-list">
        <div class="row">
        
            <div class="col-md-12">
                <div class="main-timeline">
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $eventDate = htmlspecialchars($row["event_date"]); // Ensure HTML safety
                            $highlightClass = ($eventDate === $searchDate) ? 'highlight' : '';
                            echo '<div class="timeline">';
                            echo '    <a href="#" class="timeline-content">';
                            echo '        <div class="timeline-year">' . $row["event_date"] . '</div>';
                            echo '        <h3 class="title">' . $row["event_title"] . '</h3>';
                            
                            echo '        <p class="description">' . $row["event_description"] . '</p>';
                            echo '    </a>';
                            echo '</div>';
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
        </div>
    </div>
    
    <?php include "student-footer.php";?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
