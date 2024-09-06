<?php
// Fetch unread notifications count from the database
$unreadCount = 0; // Default value
include "../includes/db_conn.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) AS count FROM notifications WHERE is_read = FALSE";
$result = $conn->query($sql);

if ($result && $row = $result->fetch_assoc()) {
    $unreadCount = $row['count'];
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KRP</title>
    <link rel="stylesheet" href="../css/style.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<nav class="navbar bg-blue navbar-expand-xl navbar-dark p-0 sticky-top  ">
    <div class="container">
        <a href="calendar.php" class="navbar-brand"><img class="nav-logo" alt="Brand" src="../Image/LOGO.png"></a>
        <button class="navbar-toggler" type="button"
            data-bs-toggle="offcanvas" 
            data-bs-target="#navbarOffcanvas"
            aria-controls="navbarOffcanvas"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" id="navbarOffcanvas"
            tabindex="-1" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-light" id="offcanvasNavbarLabel"></h5>
                <button type="button" class="btn-close btn-close-dark text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">          
                <div class="navbar-nav justify-content-end flex-grow-1 pe-3 align-items-center navigation">
                    <a class="nav-item nav-link " aria-current="page" href="calender.php"><i class="fa me-2 fa-home" aria-hidden="true"></i> Home</a>
                    <a class="nav-item nav-link" href="  "><i class="fa me-2 fa-file-calendar-o" aria-hidden="true"></i> Attendence</a>
                    <a class="nav-item nav-link" href="  "><i class="fa me-2 fa-files-o" aria-hidden="true"></i> Report</a>
                    <a class="nav-item nav-link" href="student_profile.php"><i class="fa me-2 fa-graduation-cap" aria-hidden="true"></i> Student Profile</a>
                    <a class="nav-item nav-link" href="staff-event.php"><i class="fa me-2 fa fa-first-order" aria-hidden="true"></i> Events</a>
                    <a class="nav-item nav-link" href="homework.php"><i class="fa me-2 fa-file-text-o" aria-hidden="true"></i> Homework</a>
                    <a class="nav-item nav-link" href="staff_notification.php">
                        <i class="fa me-2 fa-bell-o" aria-hidden="true"></i> Notification
                        <?php if ($unreadCount > 0): ?>
                            <span class="position-absolute badge rounded-pill bg-danger top-10"><?= $unreadCount ?></span>
                        <?php endif; ?>
                    </a>
                    <a class="nav-item nav-link mob-nav" href="admin-profile.php"><i class="fa me-2 fa-user" aria-hidden="true"></i> Profile</a>
                    <a class="nav-item nav-link mob-nav" href="change-password.php"><i class="fa me-2 fa-lock" aria-hidden="true"></i> Change Password</a>
                    <a class="nav-item nav-link mob-nav" href="../index.php"><i class="fa me-2 fa-sign-out" aria-hidden="true"></i> Logout</a>
                </div>
                <div class="d-flex align-items-center">
                    <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../Image/admin.png" alt="profile" class="head-prof" />
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="admin-profile.php"><i class="fa me-2 fa-user" aria-hidden="none"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="change-password.php"><i class="fa me-2 fa-lock" aria-hidden="none"></i> Change Password</a></li>
                    </ul>
                    <a href="../index.php" class="logout"><i class="fa me-2 fa-sign-out" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>  
    </div>
</nav>

<script>
    // Add active class to the current nav item (highlight it)
  var header = document.getElementById("navbarLinks");
    var btns = document.querySelectorAll('.nav-link');
    btns.forEach(function(btn) {
      btn.addEventListener("click", function() {
        var current = document.getElementsByClassName("active");
        if (current.length > 0) {
          current[0].classList.remove("active");
        }
        this.classList.add("active");
      });
    });

    // Optionally, add active class based on current URL
    var currentLocation = window.location.href;
    btns.forEach(function(btn) {
      if (currentLocation.includes(btn.getAttribute('href'))) {
        btn.classList.add('active');
      }
    });
// If un
// If unreadCount is zero, hide the badge
document.addEventListener('DOMContentLoaded', function () {
    const unreadCount = <?= $unreadCount ?>;
    if (unreadCount === 0) {
        document.querySelector('.staff-notification .badge').style.display = 'none';
    }
});
</script>

</body>
</html>