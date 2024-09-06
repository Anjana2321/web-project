<?php include('admin-header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> KRP</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="icon" type="image/x-icon" href="../Image/LOGO.png">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/font-awesome.css">
</head>
<body>
     <!-- <div class="topnav" id="myTopnav">
        <div class="navbar-header">
              <img class="nav-logo" alt="Brand" src="../Image/LOGO.png">
              <div class="nav-right">
                <div class="keys">
                    <a >Attendence Marking</a>
                    <a>Dashboard</a>
                    <a>Staff Details</a>
                    <a>Student Details</a>
                    <a>Financial Record</a>
                    <a>Upload</a>
              
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
                <div class="common">
                        <img class="profile-pic" src="../Image/background.jpg">
                        <h6 class="admin">Admin Name</h6>
                        <ion-icon class=" logout-logo"name="log-out-outline"></ion-icon>
                </div>
                </div>
        </div>
        
    </div> -->


    <div class="container mt-5 admin-home">
        <!-- <h3 class="h3-head">All Activites</h3> -->
        <div class="col-md-12">
            <div class="row mt-5">
                <div class="col-md-2">
                    <a href="admin-attendance.php" class="activity-box">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <span>Attendance</span>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="admin_financial.php" class="activity-box">
                        <i class="fa fa-university" aria-hidden="true"></i>
                        <span>Finance</span>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="event.php" class="activity-box">
                        <i class="fa fa-first-order" aria-hidden="true"></i>
                        <span>Events</span>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="staff-detail.php" class="activity-box">
                        <i class="fa fa-address-book" aria-hidden="true"></i>
                        <span>Staff Details</span>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="student-profile.php" class="activity-box">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        <span class="text-nowrap">Student Details</span>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="regform.php" class="activity-box">
                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                        <span>Registration</span>
                    </a>
                </div>
            </div>
        </div>
    </div>



    <?php include('admin-footer.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>