<?php
include('student-header.php');

$sql = "UPDATE notifications SET is_read = TRUE WHERE is_read = FALSE";
$conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KRP</title>
    <link rel="icon" type="image/x-icon" href="../Image/LOGO.png">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    
</head>
<body>
    <!-- Header inclusion -->
    
    <div class="container-mt-4">
        <div class="container">
            <div class="row notification-container">
                <div class="col-md-12">
                    <h2 class="h3-head mb-3 mt-4 text-center">My Notifications</h2>
                    
                </div>
                
                <!-- Notification cards will be inserted here dynamically -->
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
    <?php include 'student-footer.php'; ?>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        fetch('student_get_notification.php')
            .then(response => response.json())
            .then(data => {
                const notificationContainer = document.querySelector('.notification-container');
                data.forEach(notification => {
                    const card = document.createElement('div');
                    card.classList.add('card', 'notification-card');
                    card.innerHTML = `
                        <div class="card-body px-0 py-2">
                            <table class="table mb-0">
                                <tr class="cardtr">
                                    <td style="width:40%;">${notification.date}</td>
                                    <td style="width:40%;">${notification.message}</td>
                                    <td style="width:20%;">
                                        <a href="#" class=" view-btn viewclass" data-bs-toggle="modal" data-bs-target="#exampleModalnew" 
                                        data-date="${notification.date}"
                                        data-brief="${notification.brief_detail}" 
                                        data-file="${notification.file}">View</a>
                                        
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
                    });
                });
            })
            .catch(error => {
                console.error('Error fetching notifications:', error);
            });
    });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
