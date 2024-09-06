<?php include('admin-header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> KRP</title>
    <link rel="icon" type="image/x-icon" href="../Image/LOGO.png">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <style>
        .field-icon {
            float: right;
            position: relative;
            z-index: 2;
            top: -33px;
            left: -6px;
            color: #999;
        }
    </style>
</head>
<body>
<div class="change-password">
    <div class="container mt-4">
    <h3 class="h3-head mb-3 text-center">Change Password</h2>
        <form action="change-passwordbk.php" method="POST">
            <div class="form-group mb-3">
                <label for="oldPassword">Old Password:</label>
                <input type="password" class="form-control" id="old-password" name="oldPassword" autocomplete="off" required="">
                <span toggle="#old-password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>
            <div class="form-group mb-3">
                <label for="newPassword">New Password:</label>
                <input type="password" class="form-control" id="new-password" name="newPassword" autocomplete="off" required="">
                <span toggle="#new-password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>
            <div class="form-group mb-3">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm-password" name="confirmPassword" autocomplete="off" required="">
                <span toggle="#confirm-password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>
            <div class="centered-form">
                <button type="submit" class="btn btn-submit mt-3">Submit</button>
            </div>
        </form>
    </div>        
</div>
<?php include('admin-footer.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
        $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } 
            else {
                input.attr("type", "password");
            }
        });
    </script>
</body>
</html>