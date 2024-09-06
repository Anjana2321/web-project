

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
    <script src="parent-paymant-page.js" defer></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/parentold.css">
    <style>
        .round {
            height: auto;
            width: 80px;
            border-radius: 50px;
            padding: 5px 10px;
            font-weight: 600;
        }
    </style>

</head>

<body>
<?php

include('parent-header.php'); 
try {
    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        throw new Exception('User not logged in.');
    }

    $user_id = $_SESSION['user_id'];

    // Fetch the student's class based on the session ID
    $sql = "SELECT class FROM userlogin WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        throw new Exception("Failed to prepare statement: " . $conn->error);
    }

    $stmt->bind_param("i", $user_id);
    if (!$stmt->execute()) {
        throw new Exception("Failed to execute statement: " . $stmt->error);
    }

    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
        throw new Exception("User not found.");
    }

    $user = $result->fetch_assoc();
    $class = $user['class'];

    // Initialize arrays for fee categories
    $fees = [];
    $transportFees = [];
    $activityFees = [];

    // Fetch the fee details based on the student's class for each category
    $categories = ['Tution Fee', 'Transport Fee', 'Activity Fee'];

    foreach ($categories as $category) {
        $sql = "SELECT * FROM student_fees WHERE class = ? AND feecategory = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            throw new Exception("Failed to prepare statement: " . $conn->error);
        }

        $stmt->bind_param("ss", $class, $category);
        if (!$stmt->execute()) {
            throw new Exception("Failed to execute statement: " . $stmt->error);
        }

        $result = $stmt->get_result();
        if ($result->num_rows === 0) {
            switch ($category) {
                case 'Tution Fee':
                    $fees = 'No data found';
                    break;
                case 'Transport Fee':
                    $transportFees = 'No data found';
                    break;
                case 'Activity Fee':
                    $activityFees = 'No data found';
                    break;
            }
        } else {
            while ($row = $result->fetch_assoc()) {
                switch ($category) {
                    case 'Tution Fee':
                        $fees[] = $row;
                        break;
                    case 'Transport Fee':
                        $transportFees[] = $row;
                        break;
                    case 'Activity Fee':
                        $activityFees[] = $row;
                        break;
                }
            }
        }
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    echo "<script type='text/javascript'>
            alert('Error: " . addslashes($errorMessage) . "');
            window.location.href = 'calendar.php';
        </script>";
    exit();
}

?>
    <div class="container my-5">
        <div class="payment-sec">
            <div id="includeHtml"></div>

            <div class="pay-nav">
                <div class="input-box" id="t1">
                    <label class="details">Tuition Fee</label>
                </div>
                <div class="input-box" id="t2">
                    <label class="details">Transport Fee</label>
                </div>
                <div class="input-box" id="t3">
                    <label class="details">Activity Fee</label>
                </div>
            </div>

            <!-- Paid Fees DB -->
            <?php

            $userid = $_SESSION['admission_number'];

            // Fetch all paid fees from the database for the user
            $sql = "SELECT paid_fees FROM fees_table WHERE admission_no = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $userid);
            $stmt->execute();
            $result = $stmt->get_result();
            $paidFees = [];

            while ($row = $result->fetch_assoc()) {
                $fees1 = json_decode($row['paid_fees'], true);

                if (json_last_error() === JSON_ERROR_NONE && is_array($fees1)) {
                    $paidFees = array_merge($paidFees, $fees1);
                }
            }
            $stmt->close();
            ?>

            <?php
                // Function to check if a fee is paid
                function isFeePaid($feeType, $feeAmount, $paidFees)
                {
                    return isset($paidFees[$feeType]) && $paidFees[$feeType] == $feeAmount;
                }

                try {
                    // Process each fee type for tuition fees
                    if (is_array($fees)) {
                        foreach ($fees as &$fee) {
                            $feeType = htmlspecialchars($fee['feetype']);
                            $fee['status'] = isFeePaid($feeType, $fee['feeamount'], $paidFees) ? 'paid' : 'not paid';
                        }
                        unset($fee); // break the reference with the last element
                    } else {
                        throw new Exception('');
                    }
                } catch (Exception $e) {
                    // Handle the error, for example by logging it or showing a message
                    echo "<p></p>";
                }

                try {
                    // Process each fee type for transport fees
                    if (is_array($transportFees)) {
                        foreach ($transportFees as &$fee) {
                            $feeType = htmlspecialchars($fee['feetype']);
                            $fee['status'] = isFeePaid($feeType, $fee['feeamount'], $paidFees) ? 'paid' : 'not paid';
                        }
                        unset($fee); // break the reference with the last element
                    } else {
                        throw new Exception('');
                    }
                } catch (Exception $e) {
                    // Handle the error, for example by logging it or showing a message
                    echo "<p></p>";
                }

                try {
                    // Process each fee type for activity fees
                    if (is_array($activityFees)) {
                        foreach ($activityFees as &$fee) {
                            $feeType = htmlspecialchars($fee['feetype']);
                            $fee['status'] = isFeePaid($feeType, $fee['feeamount'], $paidFees) ? 'paid' : 'not paid';
                        }
                        unset($fee); // break the reference with the last element
                    } else {
                        throw new Exception('');
                    }
                } catch (Exception $e) {
                    // Handle the error, for example by logging it or showing a message
                    echo "<p></p>";
                }
            ?>


            <div id="div1">
                <div class="container p-0">
                    <div class="row">
                        <div class="">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <?php if ($fees === 'No data found') : ?>
                                            <tr>
                                                <td colspan="3" style="text-align:center;">No data found</td>
                                            </tr>
                                        <?php else : ?>
                                            <?php foreach ($fees as $fee) : ?>
                                                <tr class="border-bottom">
                                                    <td>
                                                        <div class="form-check" id="example">
                                                            <input class="form-check-input fee-checkbox" name="fees[]" type="checkbox" value="<?php echo htmlspecialchars($fee['feeamount']); ?>" id="flexCheckChecked" <?php echo $fee['status'] === 'paid' ? 'disabled' : ''; ?>>
                                                            <span class="em" id="payment_detais" style="display:none;">Select Any Fee Type</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex-column">
                                                            <label><span class="grey"><?php echo htmlspecialchars($fee['feetype']); ?> Fee</span></label>
                                                            <p>Rs <?php echo htmlspecialchars($fee['feeamount']); ?></p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="round" style="background-color: <?php echo $fee['status'] === 'paid' ? 'green' : 'red'; ?>;">
                                                            <span class="text-white"><?php echo $fee['status'] === 'paid' ? 'Paid' : 'Not Paid'; ?></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="payment-summary">
                            <p class="fw-bold pt-lg-0 pt-4">Payment Summary</p>
                            <div>
                                <div class="d-flex flex-column b-bottom" id="payment-summary-details">
                                    <!-- Individual fee summaries will be dynamically inserted here -->
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <p class="text-muted fw-bold">Total Amount</p>
                                    <p id="total-amount">Rs 0</p>
                                </div>
                            </div>
                        </div>
                        <a href='javascript:void(0)' class='buy_now justify-content-center d-flex' data-amount="0" data-id=''>
                            <button class="btn btn-lg btn-block pay-now">Pay Now</button>
                        </a>
                    </div>
                </div>
            </div>

            <div id="div2">
                <div class="container p-0">
                    <div class="row">
                        <div class="">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <?php if ($transportFees === 'No data found') : ?>
                                            <tr>
                                                <td colspan="3" style="text-align:center;">No data found</td>
                                            </tr>
                                        <?php else : ?>
                                            <?php foreach ($transportFees as $fee) : ?>
                                                <tr class="border-bottom">
                                                    <td style="margin-left: 30px;">
                                                        <div class="form-check">
                                                            <input class="form-check-input tfee-checkbox" type="checkbox" name="fees[]" value="<?php echo htmlspecialchars($fee['feeamount']); ?>" id="flexCheckChecked" <?php echo $fee['status'] === 'paid' ? 'disabled' : ''; ?>>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex-column">
                                                            <label><span class="grey"><?php echo htmlspecialchars($fee['feetype']); ?></span></label>
                                                            <p>Rs <?php echo htmlspecialchars($fee['feeamount']); ?></p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="round" style="background-color: <?php echo $fee['status'] === 'paid' ? 'green' : 'red'; ?>;">
                                                            <span class="text-white"><?php echo $fee['status'] === 'paid' ? 'Paid' : 'Not Paid'; ?></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="payment-summary">
                            <p class="fw-bold pt-lg-0 pt-4">Payment Summary</p>
                            <div>
                                <div class="d-flex flex-column b-bottom" id="tpayment-summary-details">
                                    <!-- Individual fee summaries will be dynamically inserted here -->
                                </div>
                                <div class="d-flex justify-content-between py-3">
                                    <p class="text-muted fw-bold">Total Amount</p>
                                    <p id="ttotal-amount">Rs 0</p>
                                </div>
                            </div>
                        </div>
                        <a href='javascript:void(0)' class='buy_now justify-content-center d-flex' data-amount="0" data-id=''>
                            <button class="btn btn-lg btn-block pay-now">Pay Now</button>
                        </a>
                        <!-- <button type="submit" class="btn btn-primary btn-lg btn-block pay-now">Pay Now</button> -->
                    </div>
                </div>
            </div>

            <div id="div3">
                <div class="container p-0">
                    <div class="row">
                        <div class="">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <?php if ($activityFees === 'No data found') : ?>
                                            <tr>
                                            <td colspan="3" style="text-align:center;">No data found</td>
                                            </tr>
                                        <?php else : ?>
                                            <?php foreach ($activityFees as $fee) : ?>
                                                <tr class="border-bottom">
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input afee-checkbox" type="checkbox" name="fees[]" value="<?php echo htmlspecialchars($fee['feeamount']); ?>" id="flexCheckChecked" <?php echo $fee['status'] === 'paid' ? 'disabled' : ''; ?>>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex-column">
                                                            <label><span class="grey"><?php echo htmlspecialchars($fee['feetype']); ?></span></label>
                                                            <p class="display-3 ">Rs <?php echo htmlspecialchars($fee['feeamount']); ?></p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="round" style="background-color: <?php echo $fee['status'] === 'paid' ? 'green' : 'red'; ?>;">
                                                            <span class="text-white"><?php echo $fee['status'] === 'paid' ? 'Paid' : 'Not paid'; ?></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="payment-summary">
                            <p class="fw-bold pt-lg-0 pt-4">Payment Summary</p>
                            <div>
                                <div class="d-flex flex-column b-bottom" id="apayment-summary-details">
                                    <!-- Individual fee summaries will be dynamically inserted here -->
                                </div>
                                <div class="d-flex justify-content-between py-3">
                                    <p class="text-muted fw-bold">Total Amount</p>
                                    <p id="atotal-amount">Rs 0</p>
                                </div>
                            </div>
                        </div>
                        <a href='javascript:void(0)' class='buy_now justify-content-center d-flex' data-amount="0" data-id=''>
                            <button class="btn btn-lg btn-block pay-now">Pay Now</button>
                        </a>
                        <!-- <button type="submit" class="btn btn-primary btn-lg btn-block pay-now">Pay Now</button> -->
                    </div>
                </div>
            </div>


            <script>
                $(document).ready(function() {
                    function updatePaymentSummary() {
                        var totalAmount = 0;
                        var paymentDetailsHtml = '';
                        var selectedFees = {};

                        $('.fee-checkbox:checked').each(function() {
                            var feeAmount = parseFloat($(this).val());
                            if (isNaN(feeAmount)) {
                                console.error("Invalid fee amount:", $(this).val());
                                return;
                            }
                            var feeType = $(this).closest('tr').find('span.grey').text();
                            totalAmount += feeAmount;

                            selectedFees[feeType] = feeAmount;

                            paymentDetailsHtml += `
                    <div class="d-flex justify-content-between py-3">
                        <p class="text-muted fw-bold">${feeType}</p>
                        <p>Rs ${feeAmount.toFixed(2)}</p>
                    </div>`;
                        });

                        $('#payment-summary-details').html(paymentDetailsHtml);
                        $('#total-amount').text('Rs ' + totalAmount.toFixed(2));

                        // Update the data-amount attribute of the buy_now link
                        $('.buy_now').attr('data-amount', parseInt(totalAmount));
                        // Update the data-id attribute with the selected fees JSON
                        $('.buy_now').attr('data-id', JSON.stringify(selectedFees));
                    }

                    // Initial calculation on page load
                    updatePaymentSummary();

                    // Update the summary whenever a checkbox is changed
                    $('.fee-checkbox').on('change', function() {
                        updatePaymentSummary();
                    });
                });
            </script>



            <script>
                $(document).ready(function() {
                    function tupdatePaymentSummary() {
                        var totalAmount = 0;
                        var paymentDetailsHtml = '';
                        var selectedFees = {};

                        $('.tfee-checkbox:checked').each(function() {
                            var feeAmount = parseFloat($(this).val());
                            if (isNaN(feeAmount)) {
                                console.error("Invalid fee amount:", $(this).val());
                                return;
                            }
                            var feeType = $(this).closest('tr').find('span.grey').text();
                            totalAmount += feeAmount;

                            selectedFees[feeType] = feeAmount;

                            paymentDetailsHtml += `
                    <div class="d-flex justify-content-between py-3">
                        <p class="text-muted fw-bold">${feeType}</p>
                        <p>Rs ${feeAmount.toFixed(2)}</p>
                    </div>`;
                        });

                        $('#tpayment-summary-details').html(paymentDetailsHtml);
                        $('#ttotal-amount').text('Rs ' + totalAmount.toFixed(2));

                        // Update the data-amount attribute of the buy_now link
                        $('.buy_now').attr('data-amount', parseInt(totalAmount));
                        // Update the data-id attribute with the selected fees JSON
                        $('.buy_now').attr('data-id', JSON.stringify(selectedFees));
                    }

                    // Initial calculation on page load
                    tupdatePaymentSummary();

                    // Update the summary whenever a checkbox is changed
                    $('.tfee-checkbox').on('change', function() {
                        tupdatePaymentSummary();
                    });
                });
            </script>



            <script>
                $(document).ready(function() {
                    function aupdatePaymentSummary() {
                        var totalAmount = 0;
                        var paymentDetailsHtml = '';
                        var selectedFees = {};

                        $('.afee-checkbox:checked').each(function() {
                            var feeAmount = parseFloat($(this).val());
                            if (isNaN(feeAmount)) {
                                console.error("Invalid fee amount:", $(this).val());
                                return;
                            }
                            var feeType = $(this).closest('tr').find('span.grey').text();
                            totalAmount += feeAmount;

                            selectedFees[feeType] = feeAmount;

                            paymentDetailsHtml += `
                    <div class="d-flex justify-content-between py-3">
                        <p class="text-muted fw-bold">${feeType}</p>
                        <p>Rs ${feeAmount.toFixed(2)}</p>
                    </div>`;
                        });

                        $('#apayment-summary-details').html(paymentDetailsHtml);
                        $('#atotal-amount').text('Rs ' + totalAmount.toFixed(2));

                        // Update the data-amount attribute of the buy_now link
                        $('.buy_now').attr('data-amount', parseInt(totalAmount));
                        // Update the data-id attribute with the selected fees JSON
                        $('.buy_now').attr('data-id', JSON.stringify(selectedFees));
                    }

                    // Initial calculation on page load
                    aupdatePaymentSummary();

                    // Update the summary whenever a checkbox is changed
                    $('.afee-checkbox').on('change', function() {
                        aupdatePaymentSummary();
                    });
                });
            </script>

            <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

            <script>
                $('body').on('click', '.buy_now', function(e) {

                    var list = $("input[name='fees[]']:checked").map(function() {
                        return this.value;
                    }).get();

                    var totalAmount = $(this).attr("data-amount");
                    var product_id = $(this).attr("data-id");

                    if (list == "") {

                        // $(".em").hide()

                        // $("#routesname").show()

                        alert('Select Fees.');
                        return false;
                    }

                    // var routeName = $('#route_name').val();

                    var options = {
                        "key": "rzp_test_H2UTYFN9YkS4xf",
                        "amount": (totalAmount * 100), // 2000 paise = INR 20
                        "name": "KPR School",
                        "image": "../Image/LOGO.png",
                        "description": "Payment",

                        "handler": function(response) {
                            $.ajax({
                                url: 'paymentbk.php',
                                type: 'post',
                                dataType: 'json',
                                data: {
                                    razorpay_payment_id: response.razorpay_payment_id,
                                    totalAmount: totalAmount,
                                    product_id: product_id,
                                },
                                success: function(msg) {
                                    window.location.href = 'payment-success.php';
                                }
                            });

                        },

                        "theme": {
                            "color": "#528FF0"
                        }
                    };

                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                    e.preventDefault();
                });
            </script>

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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Show div1 by default
            document.getElementById('div1').style.display = 'block';
            document.getElementById('div2').style.display = 'none';
            document.getElementById('div3').style.display = 'none';

            document.getElementById('t1').addEventListener('click', function() {
                document.getElementById('div1').style.display = 'block';
                document.getElementById('div2').style.display = 'none';
                document.getElementById('div3').style.display = 'none';
            });

            document.getElementById('t2').addEventListener('click', function() {
                document.getElementById('div1').style.display = 'none';
                document.getElementById('div2').style.display = 'block';
                document.getElementById('div3').style.display = 'none';
            });

            document.getElementById('t3').addEventListener('click', function() {
                document.getElementById('div1').style.display = 'none';
                document.getElementById('div2').style.display = 'none';
                document.getElementById('div3').style.display = 'block';
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.input-box');
            const tabContents = document.querySelectorAll('.tab-content');

            function activateTab(tabId) {
                tabs.forEach(tab => tab.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));

                document.getElementById(tabId).classList.add('active');
                document.getElementById(`div${tabId.charAt(1)}`).classList.add('active');
            }

            activateTab('t1');

            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    activateTab(this.id);
                });
            });
        });
    </script>

</body>

</html>