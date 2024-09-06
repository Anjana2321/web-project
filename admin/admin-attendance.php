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

<style>
.search1 {
    width: 100%;
    position: relative;
    display: flex;
}
.searchTerm1 {
    width: 100%;
    border: 1px solid #2bb774;
    border-right: none;
    padding: 6px 12px;
    border-radius: 0;
    outline: none;
    color: #9DBFAF;
}
.searchTerm {
    width: 100%;
    border: 1px solid #2bb774;
    border-right: none;
    padding: 6px 12px;
    border-radius: 5px 0 0 5px;
    outline: none;
    color: #9DBFAF;
}
.searchTerm1:focus{
    color: #2bb774;
    border: 1px solid #2bb774;
}
.searchTerm:focus{
    color: #2bb774;
}

.searchButton {
    width: 40px;
    height: 36px;
    border: 1px solid #2bb774;
    background: #2bb774;
    text-align: center;
    color: #fff;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
    font-size: 16px;
}
.searchButton1 {
    border: 1px solid #2bb774;
    background: #2bb774;
    text-align: center;
    color: #fff;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
    font-size: 16px;
    margin-right: 15px;
    padding: 10px;
}
.admission-det1{
    width: 400px;
    margin: 0 auto;
}
</style>

</head>

<body>
    

    <div class="container mt-4">
    <h3 class="h3-head mb-3 text-center">Attendence</h2>       

        <div class="fees">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Staff</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Student</button>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <section class="tab-pane fade show active admission-det1">
                        <div class="search1 mb-4">
                            <input type="text" class="searchTerm1" placeholder="Enter Faculty ID">
                            <input type="date" class="searchTerm1" placeholder="Enter Date">
                            <button type="submit" class="searchButton1">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </section>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Staff Name</th>
                                    <th scope="col">1</th>
                                    <th scope="col">2</th>
                                    <th scope="col">3</th>
                                    <th scope="col">4</th>
                                    <th scope="col">5</th>
                                    <th scope="col">6</th>
                                    <th scope="col">7</th>
                                    <th scope="col">8</th>
                                    <th scope="col">9</th>
                                    <th scope="col">10</th>
                                    <th scope="col">11</th>
                                    <th scope="col">12</th>
                                    <th scope="col">13</th>
                                    <th scope="col">14</th>
                                    <th scope="col">15</th>
                                    <th scope="col">16</th>
                                    <th scope="col">17</th>
                                    <th scope="col">18</th>
                                    <th scope="col">19</th>
                                    <th scope="col">20</th>
                                    <th scope="col">21</th>
                                    <th scope="col">22</th>
                                    <th scope="col">23</th>
                                    <th scope="col">24</th>
                                    <th scope="col">25</th>
                                    <th scope="col">26</th>
                                    <th scope="col">27</th>
                                    <th scope="col">28</th>
                                    <th scope="col">29</th>
                                    <th scope="col">30</th>
                                    <th scope="col">31</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Snape</th>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                    <th>McGonagall</th>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                </tr>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <section class="tab-pane fade show active admission-det1">
                        <div class="search1 mb-4">
                            <input type="number" class="searchTerm1" placeholder="Enter Class">
                            <input type="text" class="searchTerm1" placeholder="Enter section">
                            <button type="submit" class="searchButton1">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </section>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">1</th>
                                    <th scope="col">2</th>
                                    <th scope="col">3</th>
                                    <th scope="col">4</th>
                                    <th scope="col">5</th>
                                    <th scope="col">6</th>
                                    <th scope="col">7</th>
                                    <th scope="col">8</th>
                                    <th scope="col">9</th>
                                    <th scope="col">10</th>
                                    <th scope="col">11</th>
                                    <th scope="col">12</th>
                                    <th scope="col">13</th>
                                    <th scope="col">14</th>
                                    <th scope="col">15</th>
                                    <th scope="col">16</th>
                                    <th scope="col">17</th>
                                    <th scope="col">18</th>
                                    <th scope="col">19</th>
                                    <th scope="col">20</th>
                                    <th scope="col">21</th>
                                    <th scope="col">22</th>
                                    <th scope="col">23</th>
                                    <th scope="col">24</th>
                                    <th scope="col">25</th>
                                    <th scope="col">26</th>
                                    <th scope="col">27</th>
                                    <th scope="col">28</th>
                                    <th scope="col">29</th>
                                    <th scope="col">30</th>
                                    <th scope="col">31</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Harry</th>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                    <th>Tom</th>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                </tr>
                                
                            </tbody>
                        </table>

                </div>
            </div>

        </div>
    </div>
    <?php include('admin-footer.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>