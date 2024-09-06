<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KRP</title>
    <link rel="icon" type="image/x-icon" href="../Image/LOGO.png">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.css">

</head>

<body>
    <?php include('parent-header.php'); ?>
    <section class="mt-4">
        <h3 class="h3-head mb-3 text-center">Profile Details</h2>
        <div class="page-content page-container" id="page-content">
            <div class="container">
                <div class="row d-flex justify-content-center mt-4">
                    <div class="col-xl-12 col-md-12">
                        <div class="staff-card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-sm-3 bg-c-lite-green user-profile">
                                    <div class="card-block text-center text-white">
                                        <div class="m-b-25">
                                        <img src="../Image/student.png" width='100px' height='100px' id="profile_image" class="img-radius" alt="User-Profile-Image">                                        </div>
                                        <h6 class="f-w-600" id="student_name"></h6>
                                        <p id="standard_section"></p>
                                        <i class="mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Personal Information</h6>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <p class="mb-2 f-w-600">Student Name</p>
                                                <h6 class="text-secondary f-w-400" id="student_name_detail"></h6>
                                            </div>
                                            <div class="col-sm-3">
                                                <p class="mb-2 f-w-600">Standard</p>
                                                <h6 class="text-secondary f-w-400" id="standard"></h6>
                                            </div>
                                            <div class="col-sm-3">
                                                <p class="mb-2 f-w-600">Section</p>
                                                <h6 class="text-secondary f-w-400" id="section"></h6>
                                            </div>
                                            <div class="col-sm-3">
                                                <p class="mb-2 f-w-600">Admission Number</p>
                                                <h6 class="text-secondary f-w-400" id="admission_no"></h6>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <p class="mb-2 f-w-600">Registration Number</p>
                                                <h6 class="text-secondary f-w-400" id="registration_no"></h6>
                                            </div>
                                            <div class="col-sm-3">
                                                <p class="mb-2 f-w-600">DOB</p>
                                                <h6 class="text-secondary f-w-400" id="dob"></h6>
                                            </div>
                                            <div class="col-sm-3">
                                                <p class="mb-2 f-w-600">Gender</p>
                                                <h6 class="text-secondary f-w-400" id="gender"></h6>
                                            </div>
                                            <div class="col-sm-3">
                                                <p class="mb-2 f-w-600">Blood Group</p>
                                                <h6 class="text-secondary f-w-400" id="blood_group"></h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-2 f-w-600">Email</p>
                                                <h6 class="text-secondary f-w-400" id="email"></h6>
                                            </div>
                                            <div class="col-sm-3">
                                                <p class="mb-2 f-w-600">Mobile Number</p>
                                                <h6 class="text-secondary f-w-400" id="phone"></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'fetch_user_details.php',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.error) {
                        alert('Error: ' + response.error);
                    } else {
                        $('#student_name').text(response.student_name);
                        $('#standard_section').text(response.class + " '" + response.section + "'");
                        $('#student_name_detail').text(response.student_name);
                        $('#standard').text(response.class);
                        $('#section').text(response.section);
                        $('#admission_no').text(response.admission_number);
                        $('#registration_no').text(response.register_number);
                        $('#dob').text(response.date_of_birth);
                        $('#gender').text(response.gender);
                        $('#blood_group').text(response.blood_group);
                        $('#email').text(response.email);
                        $('#phone').text(response.contact_number);
                        $('#profile_image').attr('src', '../student_image/' + response.image_name);                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                    alert('An error occurred while fetching the user details.');
                }
            });
        });
    </script>
</body>
</html>
