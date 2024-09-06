
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
    .select-wrapper {
        position: relative;
        display: inline-block;
        width: 100%;
    }

    .select-wrapper select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background: url('data:image/svg+xml;charset=US-ASCII,<svg%20xmlns="http://www.w3.org/2000/svg"%20viewBox="0%200%2024%2024"%20width="24"%20height="24"><path%20d="M7%2010l5%205%205-5z"/></svg>') no-repeat right 10px center;
        background-size: 16px 16px;
        padding-right: 30px; /* Space for the arrow */
        border: 1px solid #ccc;
        border-radius: 4px;
        height: 38px;
    }
</style>
</head>
<body>
<?php include('admin-header.php'); ?>
<section class="mt-4 container">
    <div class="row">
        <div class="col-md-12">

            <div class="admission-det">
                <label for="registrationForm" class="form-label d-block"></label><br><br>
                <div class="select-wrapper">
                    <select name="registrationForm" class="form-control d-block" id="registrationForm">
                        <option selected>Choose Registration Form</option>
                        <option value="student">Student Registration Form</option>
                        <option value="staff">Staff Registration Form</option>
                    </select>
                </div>
            </div>
            
            <!-- Student Registration Form -->
            <div id="studentForm" class="registration-form mt-3 mb-5" style="display:none;">
                <h3 class="h3-head mb-3 text-center">Student Registration Form</h3>
                <form method="POST" action="regformbk.php" class="reg-form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="stu_name" id="fullName" placeholder="Enter full name" required>
                        </div>
                        <div class="col-md-3">
                            <label for="emailAddress" class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email" id="emailAddress" placeholder="Enter email address" required>
                        </div>
                        <div class="col-md-3">
                            <label for="phoneNumber" class="form-label">Phone Number</label>
                            <input type="number" class="form-control" name="phone" id="phoneNumber" placeholder="Enter phone number" required>
                        </div>
                        <div class="col-md-3">
                            <label for="student_img" class="form-label">Student Image</label>
                            <input type="file" class="form-control" name="student_img" id="student_img" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="birthDate" class="form-label">Birth Date</label>
                            <input type="date" name="dob" class="form-control" id="birthDate" required>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="classNumber" class="form-label">Class</label>
                                    <input type="text" name="class" class="form-control" id="classNumber" placeholder="Enter Class" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="sectionNumber" class="form-label">Blood Group</label>
                                    <input type="text" name="blood" class="form-control" id="sectionNumber" placeholder="Enter Blood Group" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <legend class="col-form-label pt-0">Gender</legend>
                            <div class="form-input d-flex">
                                <div class="form-check me-3">
                                    <input class="form-check-input" name="gender" type="radio" id="genderMale" value="male" checked>
                                    <label class="form-check-label" for="genderMale">Male</label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" name="gender" type="radio" id="genderFemale" value="female">
                                    <label class="form-check-label" for="genderFemale">Female</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="gender" type="radio" id="genderOther" value="other">
                                    <label class="form-check-label" for="genderOther">Prefer not to say</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Enter street address" required>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="country" class="form-label">Country</label>
                            <select name="country" class="form-control" id="country">
                                <option selected>Choose...</option>
                                <option>America</option>
                                <option>Japan</option>
                                <option>India</option>
                                <option>Nepal</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="city" class="form-label">City</label>
                            <input type="text" name="city" class="form-control" id="city" placeholder="Enter your city" required>
                        </div>
                        <div class="col-md-4">
                            <label for="postalCode" class="form-label">Zip Code</label>
                            <input type="number" name="pincode" class="form-control" id="postalCode" placeholder="Enter zip code" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-submit mt-3">Submit</button>
                </form>
            </div>
            
            <!-- Staff Registration Form -->
            <div id="staffForm" class="registration-form mt-3 mb-5" style="display:none;">
                <h3 class="h3-head mb-3 text-center">Staff Registration Form</h3>
                <form method="POST" action="detail_edit.php" class="reg-form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="staff_name" id="Name" placeholder="Enter full name" required>
                        </div>
                        <div class="col-md-3">
                            <label for="emailAddress" class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email" id="emailAddress" placeholder="Enter email address" required>
                        </div>
                        <div class="col-md-3">
                            <label for="phoneNumber" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name="phone" id="phoneNumber" placeholder="Enter phone number" required>
                        </div>
                        <div class="col-md-3">
                            <label for="staff_id" class="form-label">Staff ID</label>
                            <input type="text" class="form-control" name="staff_id"  placeholder="staff_id" required id="staff_id">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="birthDate" class="form-label">Birth Date</label>
                            <input type="date" name="dob" class="form-control" id="birthDate" required>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" name="subject" class="form-control" id="subject" placeholder="Enter Subject" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="sectionNumber" class="form-label">Blood Group</label>
                                    <input type="text" name="blood" class="form-control" id="Blood Groupr" placeholder="Enter Blood Group" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <legend class="col-form-label pt-0">Gender</legend>
                            <div class="form-input d-flex">
                                <div class="form-check me-3">
                                    <input class="form-check-input" name="gender" type="radio" id="genderMale" value="male" checked>
                                    <label class="form-check-label" for="genderMale">Male</label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" name="gender" type="radio" id="genderFemale" value="female">
                                    <label class="form-check-label" for="genderFemale">Female</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="gender" type="radio" id="genderOther" value="other">
                                    <label class="form-check-label" for="genderOther">Prefer not to say</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="experiencet" class="form-label">Experience</label>
                            <input type="text" name="experience" class="form-control" id="experience" placeholder="Enter Experience" required>
                        </div>
                        <div class="col-md-4">
                            <label for="dateofjoining" class="form-label">Date of joining</label>
                            <input type="date" name="dateofjoining" class="form-control" id="dateofjoining" required>
                        </div>
                        <div class="col-md-6">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Enter street address" required>
                        </div>
                        <div class="col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" name="status" class="form-control" id="status" placeholder="status" required>
                        </div>
                    </div>
                    <button type="submit"  class="btn btn-submit mt-3">Submit</button>
                </form>
            </div>
            
        </div>
    </div>
</section>

<?php include('admin-footer.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#registrationForm').change(function() {
            if ($(this).val() == 'student') {
                $('#studentForm').show();
                $('#staffForm').hide();
            } else if ($(this).val() == 'staff') {
                $('#staffForm').show();
                $('#studentForm').hide();
            } else {
                $('#studentForm').hide();
                $('#staffForm').hide();
            }
        });
    });
</script>
</body>
</html>
