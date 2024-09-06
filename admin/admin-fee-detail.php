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
    
    <div class="container mt-4">
        <h3 class="h3-head mb-3 text-center">Fee Details Form</h3>
        <form action="admin-fee-detail-bk.php" method="post" class="fee-form">
            
            <div class="mb-3">
                <label for="feeType" class="form-label">Fee Type</label>
                <input type="text" name="feetype" class="form-control" id="feeType" placeholder="Enter Fee Type" required>
            </div>
            <div class="row g-3" style="margin-bottom: 10px;">
                <div class="col-md-12">
                    <label for="feeCategory" class="form-label">Fee Category</label>
                    <select name="fee_cat" class="form-select" id="class">
                        <option selected>Choose...</option>
                        <option>Tution Fee</option>
                        <option>Transport Fee</option>
                        <option>Activity Fee</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="feeAmount" class="form-label">Amount</label>
                <input type="number" name="feeamount" class="form-control" id="feeAmount" placeholder="Enter Fee Amount" required>
            </div>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="class" class="form-label">Class</label>
                    <select name="strd" class="form-select" id="class">
                        <option selected>Choose...</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="lastDate" class="form-label">Last Date</label>
                    <input type="date" name="last_date" class="form-control" id="lastDate" required>
                </div>
            </div>
                <button type="submit" class="btn btn-submit mt-3">Submit</button>
    
            </div>
            
        </form>
    </div>
    
    <?php include('admin-footer.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>