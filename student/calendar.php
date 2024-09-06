<?php include('student-header.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> KRP</title>
  <link rel="icon" type="image/x-icon" href="../Image/LOGO.png">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/font-awesome.css">
  <link rel="stylesheet" href="../calendar/css/evo-calendar.css" />
  <link rel="stylesheet" href="../calendar/css/evo-calendar.midnight-blue.css" />
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="../calendar/js/evo-calendar.js"></script>
  <style>
    .leave {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .date-circle {
      width: 50px;
      height: 50px;
      background-color: #0fbbbf;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      text-align: center;
      align-items: center;
      color: #fff;
      font-size: 20px;
      font-weight: bold;
      margin-right: 20px;
      padding: 15px;
    }

    .date-circle .day {
      font-size: 24px;

    }

    .date-circle .month {
      font-size: 14px;
    }

    .leave-info {
      background-color: #fff;
      padding: 15px;
      border-radius: 10px;
      flex-grow: 1;
      box-shadow: 1px 1px 5px #ccc;
    }

    .leave-info h3 {
      margin-top: 0;
      margin-bottom: 5px;
      font-size: 14px;
      color: #333;
    }

    .leave-info p {
      margin: 0;
      color: #666;
    }

    .calendar-active {
      background-color: rgb(55, 231, 121);
      color: #fff;

    }
  </style>
</head>

<body>
 
  <div class="container">
    <div id="evoCalendar"></div>

    <?php


    $query = "SELECT * FROM calender";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Initialize an empty array to store the events
    $myEvents = [];

    // Checking if the query was successful
    if ($result) {
      // Fetch associative array of the result row by row
      while ($row = mysqli_fetch_assoc($result)) {

        $everyYear = $row['every_year'] == 1 ? true : false;

        $startDate = new DateTime($row['date'], new DateTimeZone("Asia/Kolkata"));
        $formattedStartDate = $startDate->format("m/d/Y");

        // Check if end_date is empty or null
        if (empty($row['end_date'])) {
          $formattedDate = $formattedStartDate; // Use only the start date
        } else {
          $endDate = new DateTime($row['end_date'], new DateTimeZone("Asia/Kolkata"));
          $formattedEndDate = $endDate->format("m/d/Y");
          $formattedDate = [$formattedStartDate, $formattedEndDate]; // Use both dates
        }

        // Construct the event object
        $event = [
          'id' => $row['id'],
          'name' => $row['name'],
          'badge' => $row['badge'],
          'date' => $formattedDate,
          'description' => $row['description'],
          'everyYear' => $everyYear,
          'type' => $row['type']
        ];

        // Add the event to the myEvents array
        $myEvents[] = $event;
      }
    }

    $myEventsJson = json_encode($myEvents);

    mysqli_close($conn);
    ?>


    <div class="leave-details-container"></div>



    <script>
      var myEvents = <?php echo $myEventsJson; ?>;

      $('#evoCalendar').evoCalendar({
        calendarEvents: myEvents
      });

      console.log(myEvents);
    </script>




    <script>
      $(document).ready(function() {
        // Fetch current month details when the page loads
        $.ajax({
          url: 'fetch_month.php',
          type: 'POST',
          data: {
            monthIndex: '<?php echo date('F'); ?>'
          },
          success: function(response) {
            $('.leave-details-container').html(response);
          },
          error: function(xhr, status, error) {
            console.error('Error fetching current month data: ' + error);
          }
        });
      });
    </script>

    <script>
      $('#evoCalendar').evoCalendar({
        format: 'mm/dd/yyyy',
        titleFormat: 'MM yyyy',
        eventHeaderFormat: 'MM d, yyyy'
      }).on('selectMonth', function(activeMonth, monthIndex) {
        console.log(monthIndex);
        $.ajax({
          url: 'fetch_month.php',
          type: 'POST',
          data: {
            monthIndex: monthIndex
          },
          success: function(response) {
            $('.leave-details-container').html(response);
          },
          error: function(xhr, status, error) {
            console.error('Error updating month: ' + error);
          }
        });
      });
    </script>
  </div>
  <footer class="footer mt-auto py-2 bg-blue fs-14">
    <div class="container">
      <span>&copy; Copyright - 2024.</span>
    </div>
  </footer>

  <div class="bottom-footer">
    <div class="container">
      <ul>
        <li><a href="student-profile.php"><i class="fa fa-user" aria-hidden="true"></i></a></li>
        <li><a href="calendar.php" class="mob-home"><i class="fa fa-home"></i></a></li>
        <li><a href="parent-payment-page.php"><i class="fa fa-file-text" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>