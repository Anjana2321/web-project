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
                <h3 class="h3-head mb-3 text-center">Notification Form</h3>
                <form method="POST" action="insert_notification.php" class="reg-form homework-form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="type" class="form-label">Notification Type</label>
                            <input type="text" class="form-control" name="type" id="type" placeholder="Enter notification type" required>
                        </div>
                        <div class="col-md-6">
                            <label for="message" class="form-label">Message</label>
                            <input type="text" class="form-control" name="message" id="message" placeholder="Enter message" required>
                        </div>
                        <div class="col-md-6">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" name="date" id="date" placeholder="Enter date" required>
                        </div>
                        <div class="col-md-6">
                            <label for="uploaded_by" class="form-label">Uploaded By</label>
                            <input type="uploaded_by" class="form-control" name="uploaded_by" value="Admin" id="uploaded_by" placeholder="Enter Uploaded By" required readonly>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="brief_detail" class="form-label">Description</label>
                            <input type="text" class="form-control" name="brief_detail" id="brief_detail" placeholder="Description of the message" required>
                        </div>
                        <div class="col-md-6">
                            <label for="file" class="form-label">File Upload</label>
                            <input type="file" class="form-control" name="file" id="file" required>
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
