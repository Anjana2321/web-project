<!DOCTYPE html>
<html lang="'en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> KRP</title>
    <link rel="icon" type="image/x-icon" href="Image/LOGO.png">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/loginold.css"> -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <style>
        .field-icon {
            float: right;
            position: relative;
            z-index: 111;
            top: -34px;
            left: 90%;
            color: #999;
        }
        .pswd{
            width: 84% !important;
        }
    </style>
</head>

<body class="loginbg">
    <div class="main">
        <div class="card">
            
            <img class="main-logo" src="Image/LOGO.png">
            <div class="main-heading">
                <h1>KRP Matriculation</h1>
                <h2>Higher Secondary School</h2>
            </div>
            <div class="card-body">
                <form action="#" id="login" class="login-form">

                    <input type="hidden" name="action" value="login">

                    <div class="input-group form-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" id="admission_no" name="admission_no" class="form-control" placeholder="Register Number" autocomplete="off">
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-key"></i></span>
                        </div>
                        <input type="password" id="password" name="password" class="form-control pswd" placeholder="Password" autocomplete="off">
                        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                    <div class="form-group text-center  mb-2">
                        <input type="button" id="bt_login" value="Login" class="btn login_btn">
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#" class="text-decoration-none">Forgot password?</a>
                    </div>
                </form>
            </div>
            

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>   
    <script src="js/script.js"></script>
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