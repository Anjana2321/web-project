<?php include "admin-header.php" ?>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.8.335/pdf.min.js"></script>
</head>
<body>


    <div class="container mt-4">
        <h2 class="h3-head mb-3 mt-4 text-center">My Notifications</h2>

        <div class="notification-container">
            <div class="row">
                <div class="col-md-12">
                    <a href="./create_notification.php" class="btn btn-submit create fw-600 float-end">Create Notification</a>
                </div>
            </div>

            <div class="row">
                <!-- Notification cards will be inserted here dynamically -->
                <!-- Example card structure -->
                <div class="col-md-12">
                    <div class="notification-card p-0">
                        <!-- Card content -->
                <div class="container-fluid">
                    

                </div>
            </div>
        </div>
        <!-- Repeat for other notification cards -->
    </div>
</div>
</div>
        <!-- Edit Modal -->
        <div class="modal fade" id="exampleModalnew1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Notification</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="update_notification.php" enctype="multipart/form-data">
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
                                    <a class="file-button" href="#" target="_blank" id="view-file-link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModalnew2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form class="event-btn " method="POST" action="delete_notification.php">
                                                                <input type="hidden" name="msgid" id="edit-msgid">
                                                                <button type="submit" class="event-btn " onclick="return confirm(\'Are you sure you want to delete this event?\')">
                                                                    <i class="fa fa-trash " style="font-size:14px; line-height:22px" aria-hidden="true"></i>
                                                                </button>
                                                            </form>
            </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Fetch notifications and populate dynamically
            fetch('get_notifications.php')
                .then(response => response.json())
                .then(data => {
                    const notificationContainer = document.querySelector('.notification-container');
                    data.forEach(notification => {
                        const card = document.createElement('div');
                        card.classList.add('col-md-12', 'mb-4');
                        card.innerHTML = `
                            <div class="notification-card">
                                <div class="card-body px-0 py-2">
                                    <div class="container-fluid">
                                        <div class="blog-slider">
                                            <div class="blog-slider-item">
                                                <div class="blog-slider-img">
                                                    ${getFilePreviewElement(notification.file, notification.msgid)}
                                                </div>
                                                <div class="blog-slider__content">
                                                    <span class="blog-slider__code">${notification.date}</span>
                                                    <div class="blog-slider__title">${notification.message}</div>
                                                    <div class="blog-slider__button">
                                                        <a href="#" class="view-btn viewclass me-2" data-bs-toggle="modal" data-bs-target="#exampleModalnew"
                                                            data-date="${notification.date}" data-brief="${notification.brief_detail}" data-file="${notification.file}"  style="border-radius: 12px !important;">View</a>
                                                        <a href="#" class="edit-btn editclass me-2" data-bs-toggle="modal" data-bs-target="#exampleModalnew1"
                                                            data-msgid="${notification.msgid}" data-date="${notification.date}" data-type="${notification.type}"
                                                            data-message="${notification.message}" data-brief="${notification.brief_detail}" data-file="${notification.file}">Edit</a>
                                                        <a href="#" class="edit-btn editclass" data-bs-toggle="modal" data-bs-target="#exampleModalnew2"
                                                            data-msgid="${notification.msgid}" data-date="${notification.date}" data-type="${notification.type}"
                                                            data-message="${notification.message}" data-brief="${notification.brief_detail}" data-file="${notification.file}">Delete</a>
                                                        
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                        notificationContainer.appendChild(card);

                        // Add event listeners for edit and view buttons
                        card.querySelector('.edit-btn').addEventListener('click', function () {
                            const msgid = this.getAttribute('data-msgid');
                            const date = this.getAttribute('data-date');
                            const type = this.getAttribute('data-type');
                            const message = this.getAttribute('data-message');
                            const briefDetail = this.getAttribute('data-brief');
                            const file = this.getAttribute('data-file');

                            // Populate edit modal fields
                            document.getElementById('edit-msgid').value = msgid;
                            document.getElementById('edit-date').value = date;
                            document.getElementById('edit-type').value = type;
                            document.getElementById('edit-message').value = message;
                            document.getElementById('edit-brief_detail').value = briefDetail;
                        });

                        // Add event listener for file download or preview
                        card.querySelector('.blog-slider-img').addEventListener('click', function () {
                            const file = this.getAttribute('data-file');
                            const fileLink = `uploads/${file}`;

                            // Download or preview logic
                            // Example: open file link
                            window.open(fileLink, '_blank');
                        });

                        // Add event listener for view button
                        card.querySelector('.view-btn').addEventListener('click', function () {
                            const briefDetail = this.getAttribute('data-brief');
                            const date = this.getAttribute('data-date');
                            const file = this.getAttribute('data-file');
                            const fileLink = `../uploads/${file}`;

                            // Populate view modal fields
                            document.getElementById('view-brief-detail').textContent = briefDetail;
                            document.getElementById('view-date').textContent = date;
                            const fileLinkElement = document.getElementById('view-file-link');
                            fileLinkElement.textContent = `Attachment`;
                            fileLinkElement.setAttribute('href', fileLink);
                            fileLinkElement.setAttribute('target', '_blank'); // Open link in new tab
                        });

                        // Render PDF first page in the canvas if it's a PDF file
                        if (notification.file.endsWith('.pdf')) {
                            renderPDFPage(`../uploads/${notification.file}`, `pdf-canvas-${notification.msgid}`);
                        }
                    });
                })
                .catch(error => {
                    console.error('Error fetching notifications:', error);
                });
        });

        function getFilePreviewElement(file, msgid) {
            const fileExtension = file.split('.').pop().toLowerCase();
            const filePath = `../uploads/${file}`;
            switch (fileExtension) {
                case 'jpg':
                case 'jpeg':
                case 'png':
                case 'gif':
                    return `<img src="${filePath}" alt="Image Preview" style="width: 100%; height: 100%; object-fit: cover;">`;
                case 'pdf':
                    return `<canvas id="pdf-canvas-${msgid}" style="width: 100%; height: 100%;"></canvas>`;
                case 'doc':
                case 'docx':
                case 'xls':
                case 'xlsx':
                case 'ppt':
                case 'pptx':
                    return `<iframe src="https://docs.google.com/gview?url=${encodeURIComponent(filePath)}&embedded=true" style="width: 100%; height: 100%; border: none;"></iframe>`;
                default:
                    return `<p>Preview not available for this file type.</p>`;
            }
        }

        function renderPDFPage(url, canvasId) {
            const loadingTask = pdfjsLib.getDocument(url);
            loadingTask.promise.then(function(pdf) {
                pdf.getPage(1).then(function(page) {
                    const canvas = document.getElementById(canvasId);
                    const context = canvas.getContext('2d');

                    const parentDiv = canvas.parentElement;
                    const divWidth = parentDiv.clientWidth;
                    const divHeight = parentDiv.clientHeight;

                    const viewport = page.getViewport({ scale: 1 });
                    const scale = Math.min(divWidth / viewport.width, divHeight / viewport.height);
                    const scaledViewport = page.getViewport({ scale: scale });

                    canvas.width = scaledViewport.width;
                    canvas.height = scaledViewport.height;

                    const renderContext = {
                        canvasContext: context,
                        viewport: scaledViewport
                    };
                    page.render(renderContext);
                });
            }, function(reason) {
                console.error(reason);
            });
        }
    </script>

    <?php include('admin-footer.php'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
