<?php
include('staff-header.php');

$sql = "UPDATE notifications SET is_read = TRUE WHERE is_read = FALSE";
$conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KRP</title>
    <link rel="icon" type="image/x-icon" href="../Image/LOGO.png">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <style>
        .notification-invitation .card-title:before {
            color: #90CAF9;
            border-color: #90CAF9;
            content: "\f007";
        }
        .notification-warning .card-title:before {
            color: #FFE082;
            border-color: #FFE082;
            content: "\f071";
        }
        .notification-danger .card-title:before {
            color: #FFAB91;
            border-color: #FFAB91;
            content: "\f00d";
        }
        .notification-reminder .card-title:before {
            color: #CE93D8;
            border-color: #CE93D8;
            content: "\f017";
        }
        .card.display-none {
            display: none;
            transition: opacity 2s;
        }
        .msg-detail {
            text-align: justify;
            padding: 5px;
        }
        .create {
            float: right;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0;
        }
        td{
            border:0;
        }
        .file-button {
            display: block;
            width: 100%;
            text-align: center;
            background-color: #10bcbf;
            border: 2px solid #10bcbf;
            border-radius: 5px;
            padding: 10px;
            margin-top: 15px;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .card{
        width:100% !important;
        }
        .file-button a {
            color: #fff;
            text-decoration: none;
            font-size: 1rem;
        }
        .file-button:hover {
            background-color: #0e9fa4;
            border-color: #0e9fa4;
        }
        .file-button a:hover {
            color: #f0f0f0;
        }
        .viewclass {
            background-color: #20c997;
            margin-right: 15px;
            padding: 3px 10px 3px 10px;
            text-decoration: none;
            color: #fff !important;
            border-radius: 5px;
            text-align: right;
        }
        .editclass {
            background-color: #20c997;
            margin-right: 15px;
            padding: 3px 10px 3px 10px;
            text-decoration: none;
            color: #fff !important;
            border-radius: 5px;
            text-align: right;
        }
        .table td{
            vertical-align: middle !important;
            border-top: 0 !important;
        }
        .table > :not(caption) > * {
            border: none;
        }
    </style>
</head>
<body>

    <div class="container-mt-4">
        <div class="container">
            <div class="row notification-container">
                <div class="col-md-12">
                    <h2 class="h3-head mb-3 mt-4 text-center">My Notifications</h2>
                    <a href="./staff_create_notification.php" class="btn btn-submit create">Create Notification</a>
                </div>
                
                <!-- Notification cards will be inserted here dynamically -->
            </div>

           
    <?php 
  include('staff-footer.php'); 
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
    <script>
document.addEventListener('DOMContentLoaded', function () {
    fetch('staff_get_notification.php')
        .then(response => response.json())
        .then(data => {
            const notificationContainer = document.querySelector('.notification-container');
            data.forEach(notification => {
                const card = document.createElement('div');
                card.classList.add('card', 'notification-card');
                card.innerHTML = `
                    <div class="card-body px-0 py-2">
                        <table class="table mb-0">
                            <tr>
                                <td style="width:40%;">${notification.date}</td>
                                <td style="width:40%;">${notification.message}</td>
                                <td style="width:20%;" class="edit-td">
                                    <a href="#" class=" view-btn viewclass" data-bs-toggle="modal" data-bs-target="#exampleModalnew" 
                                    data-bs-date="${notification.date}"
                                    data-bs-brief="${notification.brief_detail}" 
                                    data-bs-file="${notification.file}">View</a>
                                    ${notification.uploaded_by !== 'Admin' ? 
                                        `<a href="#" class="edit-btn editclass" data-bs-toggle="modal" data-bs-target="#exampleModalnew1" 
                                        data-bs-msgid="${notification.msgid}" 
                                        data-bs-date="${notification.date}"
                                        data-bs-type="${notification.type}" 
                                        data-bs-message="${notification.message}" 
                                        data-bs-brief="${notification.brief_detail}" 
                                        data-bs-file="${notification.file}">Edit</a>` : ''}
                                    
                                </td>
                            </tr>
                        </table>
                    </div>
                `;
                notificationContainer.appendChild(card);
            });

            // Add event listeners for edit buttons
            document.querySelectorAll('.edit-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const msgid = this.getAttribute('data-msgid');
                    const date = this.getAttribute('data-date');
                    const type = this.getAttribute('data-type');
                    const message = this.getAttribute('data-message');
                    const briefDetail = this.getAttribute('data-brief');
                    const file = this.getAttribute('data-file');

                    document.getElementById('edit-msgid').value = msgid;
                    document.getElementById('edit-date').value = date;
                    document.getElementById('edit-type').value = type;
                    document.getElementById('edit-message').value = message;
                    document.getElementById('edit-brief_detail').value = briefDetail;

                    // Show the edit modal
                    $('#exampleModalnew1').modal('show');
                });
            });

            // Add event listeners for view buttons
            document.querySelectorAll('.view-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const briefDetail = this.getAttribute('data-brief');
                    const date = this.getAttribute('data-date');
                    const file = this.getAttribute('data-file');
                    const fileLink = `../uploads/${file}`;

                    document.getElementById('view-brief-detail').textContent = briefDetail;
                    document.getElementById('view-date').textContent = date;
                    const fileLinkElement = document.getElementById('view-file-link');
                    fileLinkElement.textContent = `Attachment`;
                    fileLinkElement.setAttribute('href', fileLink);
                    fileLinkElement.setAttribute('target', '_blank');  // Open link in new tab

                    // Show the view modal
                    $('#exampleModalnew').modal('show');
                });
            });
        })
        .catch(error => {
            console.error('Error fetching notifications:', error);
        });
});
</script>
 <!-- Edit Modal -->
 <div class="modal fade" id="exampleModalnew1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Notification</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="staff_update_notification.php" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="edit-msgid" name="msgid" placeholder="ID" required readonly>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="date" class="form-control" id="edit-date" name="date" placeholder="Date" required>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="edit-type" name="type" placeholder="Type" required>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="edit-message" name="message" placeholder="Message" required>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="edit-brief_detail" name="brief_detail" placeholder="Brief Details" required>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="file" class="form-control" id="edit-file" name="file" placeholder="File">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-submit mt-3" name="update">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- View Modal -->
            <div class="modal fade" id="exampleModalnew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">View Notification</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class="msg-date" id="view-date"></h6>
                                    <h6 class="msg-detail" id="view-brief-detail"></h6>
                                    
                                    <div>
                                        <button class="file-button" id="view-file-button">
                                            <a href="#" target="_blank" id="view-file-link"></a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
