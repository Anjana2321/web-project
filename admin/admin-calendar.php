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
</head>
<body>
    <section class="container mt-4">
        <h3 class="h3-head mb-3 text-center">Calender Form</h3>
        <form method="POST" action="admin-calendarbk.php" class="cal-form">

            <div class="col-md-12">
                <label for="fullName" class="form-label">Name</label>
                <input type="text" name="title" class="form-control" id="fullName" placeholder="Enter Title" required>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" name="start_date" class="form-control" id="birthDate" required>
                    </div>
                    <div class="col-md-6">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" name="end_date" class="form-control" id="birthDate" >

                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <label for="emailAddress" class="form-label">Description</label>
                <input type="text" name="description" class="form-control" id="emailAddress" placeholder="Enter Description" required>
            </div>

            <div class="col-md-12">
            <div class="row">

                <div class="col-md-4">
                    <label for="country" class="form-label">Leave Type</label>
                    <select name="type" class="form-control" id="type">
                        <option selected>Choose...</option>
                        <option value="event">Event</option>
                        <option value="holiday">Holiday</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="country" class="form-label">Every Year</label>
                    <select name="every_year" class="form-control" id="country">
                        <option selected>Choose...</option>
                        <option value="1">True</option>
                        <option value="0">False</option>
                    </select>
                </div>

                <div class="col-md-4">
                <label for="fullName" class="form-label">Badge</label>
                <input type="text" name="badge" class="form-control" id="fullName" placeholder="mm/dd - mm/dd" >
                </div>

            </div>
            </div>

            <button type="submit" class="btn btn-submit mt-3">Submit</button>
        </form>
        
    </section>

    <?php include('admin-footer.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
