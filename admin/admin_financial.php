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
    <!-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
</head>

<body>
    

    <div class="container mt-4">
    <h3 class="h3-head mb-3 text-center">Financial Report</h2>
        <section class="admission-det">
            <div class="search">
                <input type="text" class="searchTerm" placeholder="Enter Student Details">
                <button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </section>
        

        <div class="fees">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Term Fees</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Yearly</button>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Standard</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mark</td>
                                    <td>12</td>
                                    <td><span class="text-white bg-danger rounded-pill px-2 py-1"> Not paid </span></td>
                                    <td>22/05/2024</td>
                                    <td><a href="#" class="text-decoration-none">Edit</a></td>
                                </tr>
                                <tr>
                                    <td>Jacob</td>
                                    <td>10</td>
                                    <td><span class="text-white bg-danger rounded-pill px-2 py-1"> Not paid </span></td>
                                    <td>22/05/2024</td>
                                    <td><a href="#" class="text-decoration-none">Edit</a></td>
                                </tr>
                                <tr>
                                    <td>Larry the Bird</td>
                                    <td>11</td>
                                    <td><span class="text-white bg-danger rounded-pill px-2 py-1"> Not paid </span></td>
                                    <td>22/05/2024</td>
                                    <td><a href="#" class="text-decoration-none">Edit</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Standard</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mark</td>
                                    <td>12</td>
                                    <td><span class="text-white bg-success rounded-pill px-2 py-1"> Paid </span></td>
                                    <td>22/05/2024</td>
                                    <td><a href="#" class="text-decoration-none">Edit</a></td>
                                </tr>
                                <tr>
                                    <td>Jacob</td>
                                    <td>10</td>
                                    <td><span class="text-white bg-success rounded-pill px-2 py-1"> Paid </span></td>
                                    <td>22/05/2024</td>
                                    <td><a href="#" class="text-decoration-none">Edit</a></td>
                                </tr>
                                <tr>
                                    <td>Larry the Bird</td>
                                    <td>11</td>
                                    <td><span class="text-white bg-success rounded-pill px-2 py-1"> Paid </span></td>
                                    <td>22/05/2024</td>
                                    <td><a href="#" class="text-decoration-none">Edit</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php include('admin-footer.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>