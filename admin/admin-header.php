<?php
// Fetch unread notifications count from the database
$unreadCount = 0; // Default value
include "../includes/db_conn.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) AS count FROM notifications WHERE is_read = FALSE ";
$result = $conn->query($sql);

if ($result && $row = $result->fetch_assoc()) {
    $unreadCount = $row['count'];
}

?> 
  <style>
    /* Navigation link styles */
    .navigation a {
      position: relative;
    }
    .navigation a::after {
      content: '';
      position: absolute;
      bottom: -6px;
      left: 22%;
      height: 3px;
      width: 50%;
      background: #fff;
      transform-origin: right;
      transform: scaleX(0);
      transition: transform 0.5s;
    }
    .navigation a:hover::after,
    .navigation a.active::after {
      transform-origin: center;
      transform: scaleX(1);
    }

    /* Style the active class for navbar items */8
    .navbar-nav .nav-item .nav-link.active {
      background-color: #000; /* Active background color */
      color: white; /* Active text color */
      border-radius: 4px; /* Optional: add rounded corners */
    }

    /* Optionally, style the hover state for better UX */
    .navbar-nav .nav-item .nav-link:hover {
      background-color: #555; /* Hover background color */
      color: white; /* Hover text color */
      border-radius: 4px; /* Optional: add rounded corners */
    }

    /* Optional: Add transition for smooth background color change */
    .navbar-nav .nav-item .nav-link {
      transition: background-color 0.3s ease, color 0.3s ease;
    }

  </style>
<nav class="navbar bg-blue navbar-expand-xl navbar-dark p-0 sticky-top">
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
            <a class="nav-item nav-link" aria-current="page" href="admin-home.php"><i class="fa me-2 fa-home" aria-hidden="true"></i> Home</a>
              <a class="nav-item nav-link" href="regform.php"><i class="fa me-2 fa-file-text-o" aria-hidden="true"></i> Registration</a>
              <a class="nav-item nav-link" href="student-profile.php"><i class="fa me-2 fa-graduation-cap" aria-hidden="true"></i> Student Profile</a>
              <a class="nav-item nav-link" href="admin_financial.php"><i class="fa me-2 fa-files-o" aria-hidden="true"></i> Finance Report</a>
              <a class="nav-item nav-link" href="admin-fee-detail.php"><i class="fa me-2 fa-money" aria-hidden="true"></i> Fees Details</a>
              <a class="nav-item nav-link" href="admin-calendar.php"><i class="fa me-2 fa-calendar-o" aria-hidden="true"></i> Calendar</a>

            <a class="nav-item nav-link" href="notification.php"><i class="fa me-2 fa-bell-o" aria-hidden="true"></i> Notification <?php if ($unreadCount > 0): ?>
                            <span class="position-absolute badge rounded-pill bg-danger top-10"><?= $unreadCount ?></span>
                        <?php endif; ?></a>
            <a class="nav-item nav-link mob-nav" href="admin-profile.php"><i class="fa me-2 fa-user" aria-hidden="true"></i> Profile</a>
            <a class="nav-item nav-link mob-nav" href="change-password.php"><i class="fa me-2 fa-lock" aria-hidden="true"></i> Change Password</a>
            <a class="nav-item nav-link mob-nav" href="../index.php"><i class="fa me-2 fa-sign-out" aria-hidden="true"></i> Logout</a>
          </div>
          <div class="d-flex align-items-center">
            <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../Image/profile.png" alt="profile" class="head-prof" />
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="admin-profile.php"><i class="fa me-2 fa-user" aria-hidden="true"></i> Profile</a></li>
                <li><a class="dropdown-item" href="change-password.php"><i class="fa me-2 fa-lock" aria-hidden="true"></i> Change Password</a></li>
            </ul>
            <a href="../index.php" class="logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
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
    // If unreadCount is zero, hide the badge
document.addEventListener('DOMContentLoaded', function () {
    const unreadCount = <?= $unreadCount ?>;
    if (unreadCount === 0) {
        document.querySelector('notification.badge').style.display = 'none';
    }
});
</script>
