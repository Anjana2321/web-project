<?php include "staff-header.php" ?>
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
        <h2 class="h3-head mb-3 mt-4 text-center">Homework</h2>

        <div class="homework-container">
            <div class="row">
                <div class="col-md-12">
                    <a href="./create_homework.php" class="btn btn-primary create fw-600 float-end">Create Homework</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="homework-card p-0">
                        <!-- Card content -->
                        <div class="container-fluid">
                            <!-- Homework cards will be injected here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="exampleModalnew1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit homework</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="update_homework.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="edit-hwid" name="hwid" placeholder="ID" required readonly>
                            </div>
                            <div class="col-md-12">
                                <select name="class" class="form-control" id="edit-class" name="class">
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
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="edit-section" name="section" placeholder="Section" required>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="edit-subject" name="subject" placeholder="Subject" required>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="edit-description" name="description" placeholder="Description" required>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" id="edit-date" name="date" placeholder="Date" required>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" id="edit-last_date" name="last_date" placeholder="Last Date" required>
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
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">View Homework</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="d-flex justify-space-between">
                            <p class="me-5">Created Date : <span class="msg-date" id="view-date"></span></p>
                            <p>Submission Date : <span class="msg-detail" id="view-last_date"></span></p>
                            </div>
                            <div id="view-file-content" style="text-align:center;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Form -->
    <form id="delete-homework-form" method="POST" action="delete_homework.php" style="display: none;">
        <input type="hidden" name="hwid" id="delete-hwid">
    </form>

    <script src="../js/bootstrap.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        fetch('get_homework.php')
            .then(response => response.json())
            .then(data => {
                const homeworkContainer = document.querySelector('.homework-container .row');
                data.forEach(homework => {
                    const card = document.createElement('div');
                    card.classList.add('col-md-12', 'mb-4');
                    card.innerHTML = `
                        <div class="homework-card">
                            <div class="card-body px-0 py-2">
                                <div class="container-fluid">
                                    <div class="blog-slider1">
                                        <div class="blog-slider1__item">
                                            <div class="blog-slider1__img">
                                                ${getFilePreviewElement(homework.file, homework.hwid)}
                                                <div class="downloadbutton">
                                                    <a href="#" class="btn-slide2 download-btn" data-file="${homework.file}">
                                                        <span class="circle2"><i class="fa fa-download"></i></span>
                                                        <span class="title2">Download</span>
                                                        <span class="title-hover2">Click here</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="blog-slider1__content">
                                                <div class="blog-slider1__date">
                                                    <h6 class="blog-slider1__code">Created Date : ${homework.date}</h6>
                                                    <h6 class="blog-slider1__code">Submission Date : ${homework.last_date}</h6>
                                                </div>
                                                <div class="blog-slider1__title">
                                                    <table class="table table-bordered border mb-0 d-block">
                                                        <tbody>
                                                            <tr>
                                                                <td style="width: 30%;" class="title-class">Class : ${homework.class}</td>
                                                                <td class="border-start font-weight-normal" rowspan="3">${homework.description}</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 30%;" class="title-class">Subject : ${homework.section}</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 30%;" class="title-class">Section : ${homework.subject}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table class="table table-bordered border mb-0 d-none">
                                                        <tbody>
                                                            <tr>
                                                                <td style="width: 30%;" class="title-class">Class : ${homework.class}</td>
                                                                <td class="border-start font-weight-normal" rowspan="3">${homework.description}</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 30%;" class="title-class">Subject : ${homework.section}</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 30%;" class="title-class">Section : ${homework.subject}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="">
                                                    <a href="#" class="view-btn viewhwclass" data-bs-toggle="modal" data-bs-target="#exampleModalnew"
                                                        data-date="${homework.date}" data-last_date="${homework.last_date}" data-file="${homework.file}">View</a>
                                                    <a href="#" class="edit-btn editclass" data-bs-toggle="modal" data-bs-target="#exampleModalnew1"
                                                        data-hwid="${homework.hwid}" data-date="${homework.date}" data-last_date="${homework.last_date}" data-section="${homework.section}"
                                                        data-class="${homework.class}" data-subject="${homework.subject}" data-description="${homework.description}" data-file="${homework.file}">Edit</a>
                                                    <a href="#" class="delete-btn deleteclass" data-hwid="${homework.hwid}">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                    homeworkContainer.appendChild(card);

                    // Add event listeners for edit and view buttons
                    card.querySelector('.edit-btn').addEventListener('click', function () {
                        const hwid = this.getAttribute('data-hwid');
                        const hwClass = this.getAttribute('data-class'); 
                        const section = this.getAttribute('data-section');
                        const subject = this.getAttribute('data-subject');
                        const description = this.getAttribute('data-description');
                        const date = this.getAttribute('data-date');
                        const last_date = this.getAttribute('data-last_date');
                        const file = this.getAttribute('data-file');

                        // Populate edit modal fields
                        document.getElementById('edit-hwid').value = hwid;
                        document.getElementById('edit-class').value = hwClass;
                        document.getElementById('edit-section').value = section;
                        document.getElementById('edit-subject').value = subject;
                        document.getElementById('edit-description').value = description;
                        document.getElementById('edit-date').value = date;
                        document.getElementById('edit-last_date').value = last_date;
                        // No need to set file input value directly
                    });

                    // Add event listener for view button
                    card.querySelector('.view-btn').addEventListener('click', function () {
                        const last_date = this.getAttribute('data-last_date');
                        const date = this.getAttribute('data-date');
                        const file = this.getAttribute('data-file');
                        const fileLink = `../uploads/${file}`;

                        // Populate view modal fields
                        document.getElementById('view-last_date').textContent = last_date;
                        document.getElementById('view-date').textContent = date;

                        const viewFileContent = document.getElementById('view-file-content');
                        viewFileContent.innerHTML = getFilePreviewElement(file, "view-file");

                        // Render PDF if the file is a PDF
                        if (file.endsWith('.pdf')) {
                            renderPDFPage(fileLink, "view-file-canvas");
                        }
                    });

                    // Add event listener for delete button
                    card.querySelector('.delete-btn').addEventListener('click', function () {
                        const hwid = this.getAttribute('data-hwid');
                        if (confirm('Are you sure you want to delete this homework?')) {
                            document.getElementById('delete-hwid').value = hwid;
                            document.getElementById('delete-homework-form').submit();
                        }
                    });

                    // Render PDF first page in the canvas if it's a PDF file
                    if (homework.file.endsWith('.pdf')) {
                        renderPDFPage(`../uploads/${homework.file}`, `${homework.hwid}-canvas`);
                    }
                });

                // Add event listener for download buttons
                document.querySelectorAll('.download-btn').forEach(button => {
                    button.addEventListener('click', function (event) {
                        event.preventDefault();
                        const file = this.getAttribute('data-file');
                        const downloadUrl = `../uploads/${file}`;

                        // Use an invisible anchor element to trigger download
                        const a = document.createElement('a');
                        a.style.display = 'none';
                        document.body.appendChild(a);

                        a.href = downloadUrl;
                        a.setAttribute('download', file);
                        a.click();

                        document.body.removeChild(a);
                    });
                });
            })
            .catch(error => {
                console.error('Error fetching homeworks:', error);
            });
    });
    function getFilePreviewElement(file, hwid) {
    const fileExtension = file.split('.').pop().toLowerCase();
    const filePath = `../uploads/${file}`;

    switch (fileExtension) {
        case 'jpg':
        case 'jpeg':
        case 'png':
        case 'gif':
            return `<img src="${filePath}" alt="Preview Image" style="width: 100%; height:100%;">`;
        case 'pdf':
            return `<canvas id="${hwid}-canvas" style="width: 100%; height: 100%;"></canvas>`;
        case 'doc':
        case 'docx':
        case 'xls':
        case 'xlsx':
            return `<a href="${filePath}" target="_blank">Preview ${fileExtension.toUpperCase()}</a>`;
        case 'ppt':
        case 'pptx':
            // Embed PowerPoint using Office Online embed link
            return `<iframe src="https://view.officeapps.live.com/op/embed.aspx?src=${encodeURIComponent(filePath)}" width="100%" height="500px" frameborder="0">This browser does not support embedded PDFs. Please download the PDF to view it: <a href="${filePath}" target="_blank">Download PowerPoint</a></iframe>`;
        default:
            return `<p>No preview available</p>`;
    }
}


    function renderPDFPage(pdfUrl, canvasId) {
        const loadingTask = pdfjsLib.getDocument(pdfUrl);
        loadingTask.promise.then(pdf => {
            // Fetch the first page
            pdf.getPage(1).then(page => {
                const scale = 1.5;
                const viewport = page.getViewport({ scale: scale });

                // Prepare canvas using PDF page dimensions
                const canvas = document.getElementById(canvasId);
                const context = canvas.getContext('2d');
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                // Render PDF page into canvas context
                const renderContext = {
                    canvasContext: context,
                    viewport: viewport
                };
                const renderTask = page.render(renderContext);
                renderTask.promise.then(() => {
                    console.log('Page rendered');
                });
            });
        }).catch(error => {
            console.error('Error rendering PDF page:', error);
        });
    }
</script>
    <?php include "staff-footer.php" ?>
</body>
</html>
