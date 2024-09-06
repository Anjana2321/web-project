<?php 
include "admin-header.php";

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
    <div class="row">
                <div class="col-md-12">
                    <a href="./create_event.php" class="btn btn-submit create fw-600 float-end">Create Event</a>
                </div>
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
                            echo '        <h3 class="title">' . $row["event_title"] . ' <form class="event-btn " method="POST" action="delete_event.php">
                                                                <input type="hidden" name="id" value="' . $row["id"] . '">
                                                                <button type="submit" class="event-btn " onclick="return confirm(\'Are you sure you want to delete this event?\')">
                                                                    <i class="fa fa-trash " style="font-size:14px; line-height:22px" aria-hidden="true"></i>
                                                                </button>
                                                            </form><button  class="edit-btn event-btn me-1" data-bs-toggle="modal" data-bs-target="#exampleModalnew1"
                                                            data-id="' . $row["id"] . '"
                                                            data-title="' . htmlspecialchars($row["event_title"]) . '" 
                                                            data-description="' . htmlspecialchars($row["event_description"]) . '" 
                                                            data-date="' . htmlspecialchars($row["event_date"]) . '"><i class="fa fa-pencil-square-o me-3" style="font-size:14px" aria-hidden="true"></i></button></h3>';
                            
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
        <div class="modal fade" id="exampleModalnew1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Event</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="update_event.php" enctype="multipart/form-data">
                                <input type="hidden" id="edit-id" name="id">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="edit-title" name="event_title" placeholder="Title" required>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="edit-description" name="event_description" placeholder="Event Description" required>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="date" class="form-control" id="edit-date" name="event_date" placeholder="Year-Month-Day" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-submit mt-3" name="update">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <script>
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const title = this.getAttribute('data-title');
                const description = this.getAttribute('data-description');
                const date = this.getAttribute('data-date');

                // Populate edit modal fields
                document.getElementById('edit-id').value = id;
                document.getElementById('edit-title').value = title;
                document.getElementById('edit-description').value = description;
                document.getElementById('edit-date').value = date;
            });
        });
    </script>
    <?php include('admin-footer.php'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
