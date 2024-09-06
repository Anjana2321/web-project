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
            <div id="notificationForm" class="registration-form mt-3">
                <h3 class="h3-head mb-3 text-center">Event Form</h3>
                <form method="POST" action="insert_event.php" class="reg-form homework-form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="event_title" class="form-label">Event Title</label>
                            <input type="text" class="form-control" name="event_title" id="event_title" placeholder="Enter Event Title" required>
                        </div>
                        <div class="col-md-6">
                            <label for="event_date" class="form-label">Event Date</label>
                            <input type="date" class="form-control" name="event_date" id="event_date" placeholder="Enter Event Date" required>
                        </div>
                        <div class="col-md-12">
                            <label for="event_description" class="form-label">Event Description</label>
                            <textarea type="text" class="form-control" name="event_description" id="event_description" placeholder="Enter Event Description" required></textarea>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-submit mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include('admin-footer.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>
