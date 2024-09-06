<?php include('student-header.php'); ?>
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

            <div class="tab-content" id="myTabContent">
                
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <section class="tab-pane fade show active admission-det1">
                        <div class="search1 mb-4">
                            <input type="month" class="searchTerm1">
                            <button type="submit" class="searchButton1">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </section>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Forenoon</th>
                                    <th scope="col">Afternoon</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>01/06/2024</th>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                    <th>03/02/2024</th>
                                    <td><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                                </tr>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
                

        </div>
    </div>
    <?php include('student-footer.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>