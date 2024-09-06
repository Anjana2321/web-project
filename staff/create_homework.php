<?php include('staff-header.php'); ?>
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
<section class="mt-4 container">
    <div class="row">
        <div class="col-md-12">
            <!-- Notification Form -->
            <div id="notificationForm" class="registration-form mt-3 w">
                <h3 class="h3-head mb-3 text-center">Homework Form</h3>
                <form method="POST" action="insert_homework.php" class="reg-form homework-form " enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="class" class="form-label">Class</label>
                            <select name="class" class="form-control" id="class">
                                <option selected>Choose Class</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="section" class="form-label">Section</label>
                            <input type="text" class="form-control" name="section" id="section" placeholder="Enter section" required>
                        </div>
                        <div class="col-md-6">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter subject" required>
                        </div>
                        <div class="col-md-6">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" name="description" id="description" placeholder="Enter description" required>
                        </div>
                        <div class="col-md-6">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" name="date" id="date" placeholder="Enter date" required>
                        </div>
                        <div class="col-md-6">
                            <label for="last_date" class="form-label">Last Date</label>
                            <input type="date" class="form-control" name="last_date" id="last_date" placeholder="Enter last date" required>
                        </div>
                    </div>
                        <div class="col-md-6">
                            <label for="file" class="form-label">File Upload</label>
                            <input type="file" class="form-control" name="file" id="file" required>
                        </div>
                    <button type="submit" class="btn btn-submit mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include('staff-footer.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>
