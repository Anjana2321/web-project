<?php 
  include('staff-header.php'); 
  ?>
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
    <style>
        select {
            -webkit-appearance: menulist;
            -moz-appearance: menulist;
            appearance: menulist;
        }

        select.form-control {
            background-image: url("../image/drop-down.png");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 10px;
        }

        input#datepicker {
            background-image: url("../image/calendar.png");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 15px;
        }

        @media (max-width: 576px) {
            .form .column {
                flex-wrap: wrap;
            }
        }

        .studentimage {
            text-align: center;
        }

        .studentimage img {
            width: 100px;
            height: 100px;
            border-radius: 15px;
            text-align: center;
        }

        .studentdetail {
            margin-top: 15px;
        }

        h3 {
            font-size: 18px;
        }

        th {
            color: black;
        }
    </style>
</head>

<body>

    <div id="includeHtml"></div>

    <div class="container mt-4">

        <h3 class="h3-head mb-3 text-center">Student Profile</h3>

        <section class="admission-det">
            <div class="row">
                <form method="POST" action="" class="d-flex mt-3">
                    <input type="text" name="admission_number" class="searchTerm" placeholder="Enter Admission Number" required>
                    <button type="submit" class="searchButton">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
        </section>

        <?php
        $user = null;

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['admission_number'])) {
            $admission_number = $_POST['admission_number'];

            $sql = "SELECT admission_number, student_name, date_of_birth, contact_number, blood_group, class, section, image_name, email, gender FROM userlogin WHERE admission_number = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $admission_number);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
            } else {
                echo "<p>No user found with Admission Number: " . htmlspecialchars($admission_number) . "</p>";
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
            $name = $_POST['name'];
            $class = $_POST['class'];
            $section = $_POST['section'];
            $admission_number = $_POST['admission_number'];
            $register_number = $_POST['register_number'];
            $email = $_POST['email'];
            $date_of_birth = $_POST['date_of_birth'];
            $gender = $_POST['gender'];
            $blood_group = $_POST['blood_group'];
            $contact_number = $_POST['contact_number'];

            // Handle file upload
            if ($_FILES['image']['name']) {
                $image_name = $_FILES['image']['name'];
                $target_dir = "../student_image/";
                $target_file = $target_dir . basename($image_name);
                move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
            } else {
                $image_name = $user['image_name'];
            }

            $sql_update = "UPDATE userlogin SET student_name=?, class=?, section=?, register_number=?, email=?, date_of_birth=?, gender=?, blood_group=?, contact_number=?, image_name=? WHERE admission_number=?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("ssssssssssi", $name, $class, $section, $register_number, $email, $date_of_birth, $gender, $blood_group, $contact_number, $image_name, $admission_number);

            if ($stmt_update->execute()) {
                echo "<p>Student details updated successfully.</p>";
            } else {
                echo "<p>Error updating student details: " . $conn->error . "</p>";
            }
        }
        ?>

        <?php if ($user) : ?>
            <div class="studentdetail">
                <div class="col-md-12">
                    <div class="email-signature">
                        <div class="signature-img">
                            <img src="../student_image/<?php echo htmlspecialchars($user['image_name']); ?>" alt="Profile Image">
                        </div>
                        <div class="signature-details">
                            <h2 class="title"><?php echo htmlspecialchars($user['student_name']); ?><span class="edit-icon"><a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></span></h2>
                            <span class="post"><?php echo htmlspecialchars($user['class']); ?> '<?php echo htmlspecialchars($user['section']); ?>'</span>
                        </div>
                        <ul class="signature-content">
                            <li><span class="">Admission Number :</span> <?php echo htmlspecialchars($user['admission_number']); ?></li>
                            <li><span class="">Date of Birth :</span> <?php echo htmlspecialchars($user['date_of_birth']); ?></li>
                            <li><span class="">Phone Number :</span> <?php echo htmlspecialchars($user['contact_number']); ?></li>
                            <li><span class="">Blood Group :</span> <?php echo htmlspecialchars($user['blood_group']); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Student Details</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="" class="" enctype="multipart/form-data">
                            <input type="hidden" name="update" value="1">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($user['student_name']); ?>" name="name" placeholder="Student Name" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <select id="standard" name="class" class="form-control">
                                                <option value="0">Select Standard</option>
                                                <option value="PreKG" <?php echo $user['class'] == 'PreKG' ? 'selected' : ''; ?>>PreKG</option>
                                                <option value="LKG" <?php echo $user['class'] == 'LKG' ? 'selected' : ''; ?>>LKG</option>
                                                <option value="UKG" <?php echo $user['class'] == 'UKG' ? 'selected' : ''; ?>>UKG</option>
                                                <option value="1" <?php echo $user['class'] == '1' ? 'selected' : ''; ?>>1</option>
                                                <option value="2" <?php echo $user['class'] == '2' ? 'selected' : ''; ?>>2</option>
                                                <option value="3" <?php echo $user['class'] == '3' ? 'selected' : ''; ?>>3</option>
                                                <option value="4" <?php echo $user['class'] == '4' ? 'selected' : ''; ?>>4</option>
                                                <option value="5" <?php echo $user['class'] == '5' ? 'selected' : ''; ?>>5</option>
                                                <option value="6" <?php echo $user['class'] == '6' ? 'selected' : ''; ?>>6</option>
                                                <option value="7" <?php echo $user['class'] == '7' ? 'selected' : ''; ?>>7</option>
                                                <option value="8" <?php echo $user['class'] == '8' ? 'selected' : ''; ?>>8</option>
                                                <option value="9" <?php echo $user['class'] == '9' ? 'selected' : ''; ?>>9</option>
                                                <option value="10" <?php echo $user['class'] == '10' ? 'selected' : ''; ?>>10</option>
                                                <option value="11" <?php echo $user['class'] == '11' ? 'selected' : ''; ?>>11</option>
                                                <option value="12" <?php echo $user['class'] == '12' ? 'selected' : ''; ?>>12</option>
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <select id="section" name="section" class="form-control">
                                                <option value="0">Select Section</option>
                                                <option value="A" <?php echo $user['section'] == 'A' ? 'selected' : ''; ?>>A</option>
                                                <option value="B" <?php echo $user['section'] == 'B' ? 'selected' : ''; ?>>B</option>
                                                <option value="C" <?php echo $user['section'] == 'C' ? 'selected' : ''; ?>>C</option>
                                                <option value="D" <?php echo $user['section'] == 'D' ? 'selected' : ''; ?>>D</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" name="admission_number" value="<?php echo htmlspecialchars($user['admission_number']); ?>" placeholder="Admission Number" required >
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" name="register_number" placeholder="Register Number" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" placeholder="Email" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" id="datepicker" name="date_of_birth" value="<?php echo htmlspecialchars($user['date_of_birth']); ?>" class="form-control" placeholder="DOB">
                                        </div>
                                        <div class="col-md-4">
                                            <select id="gender" name="gender" class="form-control">
                                                <option value="">Select Gender</option>
                                                <option value="male" <?php if ($user['gender'] == 'male') echo 'selected'; ?>>Male</option>
                                                <option value="female" <?php if ($user['gender'] == 'female') echo 'selected'; ?>>Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="col-md-12 form-group">
                                                <select id="blood" name="blood_group" class="form-control">
                                                    <option value="">Select Blood Group</option>
                                                    <option value="A+" <?php if ($user['blood_group'] == 'A+' || $user['blood_group'] == 'A+ve') echo 'selected'; ?>>A+</option>
                                                    <option value="O+" <?php if ($user['blood_group'] == 'O+' || $user['blood_group'] == 'O+ve') echo 'selected'; ?>>O+</option>
                                                    <option value="B+" <?php if ($user['blood_group'] == 'B+' || $user['blood_group'] == 'B+ve') echo 'selected'; ?>>B+</option>
                                                    <option value="B-" <?php if ($user['blood_group'] == 'B-' || $user['blood_group'] == 'B-ve') echo 'selected'; ?>>B-</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" name="contact_number" value="<?php echo htmlspecialchars($user['contact_number']); ?>" placeholder="Mobile Number" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="file" class="form-control" name="image" placeholder="Upload Image">
                                    <?php if ($user['image_name']): ?>
                                        <img src="../student_image/<?php echo htmlspecialchars($user['image_name']); ?>" alt="Profile Image" width="100">
                                    <?php endif; ?>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-submit mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
            
            <div class="container">
            <div class="report-table">
                <!-- <div>
                <h3>Attendence Report</h3>
                <div>
                    <div class='table-responsive'>
                        <table class='bg-white w-100 p-3'>
                            <thead class="bg-gray-400">
                                <tr>
                                    <th width="25%"> Suject </th>
                                    <th width="25%"> Faculty Name </th>
                                    <th width="25%"> Attendence Percentage </th>
                                    <th width="25%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Student Name</td>
                                    <td>Faculty Name </td>
                                    <td>95% </td>
                                    <td> </td>

                                </tr>
                                <tr>
                                    <td>Student Name</td>
                                    <td>Faculty Name </td>
                                    <td>95% </td>
                                    <td> </td>

                                </tr>
                                <tr>
                                    <td>Student Name</td>
                                    <td>Faculty Name </td>
                                    <td>95% </td>
                                    <td> </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
                <div>
                    <h3>Scores</h3>
                    <div>
                        <div class='table-responsive'>
                            <table class='bg-white w-100 p-3'>
                                <thead>
                                    <tr>
                                        <th width="25%"> Suject </th>
                                        <th width="25%"> Quaterly Exam </th>
                                        <th width="25%"> Half Yearly Exam </th>
                                        <th width="25%"> Annual Exam </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Subject</td>
                                        <td>98</td>
                                        <td>95 </td>
                                        <td>97</td>
                                    </tr>
                                    <tr>
                                        <td>Subject</td>
                                        <td>98</td>
                                        <td>95 </td>
                                        <td>97</td>
                                    </tr>
                                    <tr>
                                        <td>Subject</td>
                                        <td>98</td>
                                        <td>95 </td>
                                        <td>97</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> -->


                <?php
                if ($user) {
                    try {

                        $class = $user['class'];

                        $class_sql = "SELECT * FROM student_fees WHERE class = ?";
                        $class_stmt = $conn->prepare($class_sql);
                        if (!$class_stmt) {
                            throw new Exception("Failed to prepare statement: " . $conn->error);
                        }

                        $class_stmt->bind_param("s", $class);
                        if (!$class_stmt->execute()) {
                            throw new Exception("Failed to execute statement: " . $class_stmt->error);
                        }

                        $class_result = $class_stmt->get_result();
                        if ($class_result->num_rows === 0) {
                            throw new Exception("No fee details found for the class: $class");
                        }

                        $fees = [];
                        while ($row = $class_result->fetch_assoc()) {
                            $fees[] = $row;
                        }

                        // Fetch all paid fees for the user
                        $paid_sql = "SELECT paid_fees FROM fees_table WHERE admission_no = ?";
                        $paid_stmt = $conn->prepare($paid_sql);
                        if (!$paid_stmt) {
                            throw new Exception("Failed to prepare statement: " . $conn->error);
                        }

                        $paid_stmt->bind_param("s", $admission_number);
                        if (!$paid_stmt->execute()) {
                            throw new Exception("Failed to execute statement: " . $paid_stmt->error);
                        }

                        $paid_result = $paid_stmt->get_result();
                        $paidFees = [];

                        while ($row = $paid_result->fetch_assoc()) {
                            $fees_json = json_decode($row['paid_fees'], true);
                            if (json_last_error() === JSON_ERROR_NONE && is_array($fees_json)) {
                                $paidFees = array_merge($paidFees, $fees_json);
                            }
                        }

                        // Determine the status of each fee
                        foreach ($fees as &$fee) {
                            $feeType = htmlspecialchars($fee['feetype']);
                            $fee['status'] = isset($paidFees[$feeType]) && $paidFees[$feeType] == $fee['feeamount'] ? 'paid' : 'not paid';
                        }
                        unset($fee); // break the reference with the last element
                    } catch (Exception $e) {
                        $errorMessage = $e->getMessage();
                        // echo "<p>Error: " . htmlspecialchars($errorMessage) . "</p>";
                        // exit();
                    }
                }
                ?>


                <?php if ($user) : ?>
                    <div class="">
                        <h3>Financial Record</h3>
                        <h4 class="text-danger">Due List</h4>
                        <div>
                            <div class='table-responsive'>
                                <table class='bg-white w-100'>
                                    <thead>
                                        <tr>
                                            <th width="25%"> Fee Type </th>
                                            <th width="25%"> Fee Category </th>
                                            <th width="25%"> Amount </th>
                                            <th width="25%"> Status </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($fees)) : ?>
                                            <tr>
                                                <td colspan="4" style="text-align:center;">No due fees found - <?php echo $class; ?></td>
                                            </tr>
                                        <?php else : ?>
                                            <?php foreach ($fees as $fee) : ?>
                                                <?php if ($fee['status'] === 'not paid') : ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($fee['feetype']); ?></td>
                                                        <td><?php echo htmlspecialchars($fee['feecategory']); ?></td>
                                                        <td><?php echo htmlspecialchars($fee['feeamount']); ?></td>
                                                        <td><span class="text-white bg-danger px-2 rounded-pill">Not paid</span></td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <h4 class="text-success">Paid List</h4>
                        <div>
                            <div class='table-responsive'>
                                <table class='bg-white w-100'>
                                    <thead>
                                        <tr>
                                            <th width="25%"> Fee Type </th>
                                            <th width="25%"> Fee Category </th>
                                            <th width="25%"> Amount </th>
                                            <th width="25%"> Status </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($fees)) : ?>
                                            <tr>
                                                <td colspan="4" style="text-align:center;">No paid fees found - <?php echo $class; ?></td>
                                            </tr>
                                        <?php else : ?>
                                            <?php foreach ($fees as $fee) : ?>
                                                <?php if ($fee['status'] === 'paid') : ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($fee['feetype']); ?></td>
                                                        <td><?php echo htmlspecialchars($fee['feecategory']); ?></td>
                                                        <td><?php echo htmlspecialchars($fee['feeamount']); ?></td>
                                                        <td><span class="text-white bg-success px-2 rounded-pill">Paid</span></td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
            </div>
    </div>



    <?php include('staff-footer.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.8.0/css/pikaday.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.8.0/pikaday.min.js"></script>
    <script>
        var picker = new Pikaday({
            field: document.getElementById('datepicker'),
            format: 'YYYY-MM-DD',
            onSelect: function() {
                document.getElementById('datepicker').value = picker.toString();
            }
        });
        var picker = new Pikaday({
            field: document.getElementById('datepicker1'),
            format: 'YYYY-MM-DD',
            onSelect: function() {
                document.getElementById('datepicker1').value = picker.toString();
            }
        });
    </script>
</body>

</html>