<?php include('admin-header.php'); ?>
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
    th, td {
        white-space: nowrap;
    }
    th {
        background: #17a7e1 !important;
        color: #fff;
    }
    td {
        font-size: 13px;
    }
    .date-input {
        position: relative;
    }
    .date-input input[type="date"] {
        position: relative;
        z-index: 1;
        background-color: transparent;
    }
    .date-input input[type="date"]::before {
        content: attr(data-placeholder);
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        color: #aaa;
        pointer-events: none;
        z-index: 0;
    }
    .date-input input[type="date"]:focus::before,
    .date-input input[type="date"]:valid::before {
        content: '';
    }
    .pika-table th {
        color: #fff !important;
    }
    abbr[title] {
        text-decoration: none !important;
    }
    .pika-button {
        background: #fff !important;
    }
    .pika-button:hover {
        background: #17a7e1 !important;
    }
    select {
        -webkit-appearance: menulist;
        -moz-appearance: menulist;
        appearance: menulist;
    }
    /* Additional styles to match Bootstrap appearance */
    select.form-control {
        background-image: url("../image/drop-down.png");
        background-repeat: no-repeat;
        background-position: right 0.75rem center;
        background-size: 10px;
    }
    input#datepicker, input#datepicker1 {
        background-image: url("../image/calendar.png");
        background-repeat: no-repeat;
        background-position: right 0.75rem center;
        background-size: 15px;
    }
</style>
</head>
<body>

<section class="container mt-4">
    <h3 class="h3-head mb-3 text-center">Staff Details</h3>
    <div class="table-responsive staff-det">
        <table class="table border">
            <thead>
                <tr>
                    <th>Staff ID</th>
                    <th>Staff Name</th>
                    <th>Email ID</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Subject</th>
                    <th>Mobile Number</th>
                    <th>Address</th>
                    <th>Date of Joining</th>
                    <th>Experience</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="border">
                <?php
                // Fetch data from database
                $sql = "SELECT * FROM student_details";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["staff_id"] . "</td>";
                        echo "<td>" . $row["staff_name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["gender"] . "</td>";
                        echo "<td>" . $row["dob"] . "</td>";
                        echo "<td>" . $row["subject"] . "</td>";
                        echo "<td>" . $row["phone"] . "</td>";
                        echo "<td>" . $row["address"] . "</td>";
                        echo "<td>" . $row["dateofjoining"] . "</td>";
                        echo "<td>" . $row["experience"] . "</td>";
                        echo "<td>" . ($row["status"] == "Working" ? "<span class='text-success'>Working</span>" : "<span class='text-danger'>Resigned</span>") . "</td>";
                        echo '<td><a href="#" class="text-primary edit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-staffid="'.$row["staff_id"].'"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='13'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Staff Detail</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="update_staff.php" class="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" class="form-control" id="edit-staff-id" name="staff_id" required>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="edit-staff-name" name="staff_name" placeholder="Staff Name" required>
                            </div>
                            <div class="col-md-12">
                                <input type="email" class="form-control" id="edit-email" name="email" placeholder="Email ID" required>
                            </div>
                            <div class="col-md-12">
                                <select id="edit-gender" class="form-control" name="gender">
                                    <option selected="true" disabled="disabled">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <input type="text" id="datepicker" class="form-control" id="edit-dob" name="dob" placeholder="DOB">
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="edit-address" name="address" placeholder="Address" required>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="edit-subject" name="subject" placeholder="Subject" required>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="edit-phone" name="phone" placeholder="Mobile Number" required>
                            </div>
                            <div class="col-md-12">
                                <input type="text" id="datepicker1" class="form-control" id="edit-dateofjoining" name="dateofjoining" placeholder="DOJ">
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="edit-experience" name="experience" placeholder="Experience" required>
                            </div>
                            <div class="col-md-12">
                                <select id="edit-status" class="form-control" name="status">
                                    <option selected="true" disabled="disabled">Select Status</option>
                                    <option value="Working">Working</option>
                                    <option value="Resigned">Resigned</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-submit mt-3" name="update">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('admin-footer.php'); ?>
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
    var picker1 = new Pikaday({
        field: document.getElementById('datepicker1'),
        format: 'YYYY-MM-DD',
        onSelect: function() {
            document.getElementById('datepicker1').value = picker1.toString();
        }
    });

    $(document).on('click', '.edit-btn', function() {
        var staffId = $(this).data('staffid');
        $.ajax({
            url: 'fetch_staff.php',
            type: 'POST',
            data: {staff_id: staffId},
            success: function(data) {
                var staff = JSON.parse(data);
                $('#edit-staff-id').val(staff.staff_id);
                $('#edit-staff-name').val(staff.staff_name);
                $('#edit-email').val(staff.email);
                $('#edit-gender').val(staff.gender);
                $('#edit-dob').val(staff.dob);
                $('#edit-address').val(staff.address);
                $('#edit-subject').val(staff.subject);
                $('#edit-phone').val(staff.phone);
                $('#edit-dateofjoining').val(staff.dateofjoining);
                $('#edit-experience').val(staff.experience);
                $('#edit-status').val(staff.status);
                
                // Autofill gender and status
                $('#edit-gender').val(staff.gender).change();
                $('#edit-status').val(staff.status).change();
            }
        });
    });
</script>
</body>
</html>
