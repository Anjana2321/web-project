<?php
    include('parent-header.php');
?>

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
</head>

<body>

    
    <div id="includeHtml"></div>
    <div class="container mt-5">

        <?php

        if (!isset($_SESSION['user_id'])) {
            // Redirect to login page if session ID is not set
            header("Location: ../index.php");
            exit();
        }

        $user_id = $_SESSION["user_id"];

        $sql = "SELECT admission_number, student_name, date_of_birth, contact_number, blood_group, class, section, image_name FROM userlogin WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
        } else {
            // Handle case where no user is found
            echo "No user found.";
            exit();
        }
        ?>

        <div class="studentdetail">
            <div class="col-md-12">
                <div class="email-signature">
                    <div class="signature-img">
                        <img src="../student_image/<?php echo htmlspecialchars($user['image_name']); ?>" alt="Profile Image">
                    </div>
                    <div class="signature-details">
                        <h2 class="title"><?php echo htmlspecialchars($user['student_name']); ?></h2>
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

                try {

                    $admission_no = $_SESSION["admission_number"];
                    $user_id = $_SESSION['user_id'];

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
                        throw new Exception("No fee details found for the class:$class");
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

                    $paid_stmt->bind_param("s", $admission_no);
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
                        $feeType = htmlspecialchars($fee['feetype']) ;
                        $fee['status'] = isset($paidFees[$feeType]) && $paidFees[$feeType] == $fee['feeamount'] ? 'paid' : 'not paid';
                    }
                    unset($fee); // break the reference with the last element

                } catch (Exception $e) {
                    $errorMessage = $e->getMessage();
                    echo "<script type='text/javascript'>
                                    alert('Error: " . addslashes($errorMessage) . "');
                                    
                                </script>";
                    exit();
                }
            ?>

            <div>
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
                                        <td colspan="4">No due fees found.</td>
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
                                        <td colspan="4">No paid fees found.</td>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
</body>

</html>