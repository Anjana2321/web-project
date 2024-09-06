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
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>

    <style>
        .card {
            display: flex;
            margin-top: 60px;
            box-shadow: 0 0 15px rgba(84, 227, 158, 0.3);
            flex-direction: row;
            height: 40px;
            text-align: center;
            width: 100%;
            background-color: #fff;
        }
        .input-box {
            width: 50%;
            text-align: center;
        }
        .input-box:hover {
            border-bottom: 5px solid black;
            color: black;
            padding: 10px 10px;
            text-align: center;
            width: 50%;
        }


        .hidden {
            display: none;
        }
    </style>

  
</head>

<body>




    <div class="fees">



        <div class="card">
            <div class="input-box" id="term-fees-btn">
                <label class="details">Term Fees</label>
            </div>
            <div class="input-box" id="yearly-btn">
                <label class="details">Yearly</label>
            </div>
        </div>

        <div class="box text-center" style="margin-top: 15px;">
            <h2>FINANCE REPORT</h2>
        </div>
        <div class="date text-center" style="margin-top: 10px;">
            <input style="width: 500px; height: 35px; border-radius: 10px;" type="date" class="form-control" id="date" placeholder="Date" required>
        </div>
    </div>

    <div class="min-h-screen py-5 term">
        <div style="margin-top: 50px;" class='overflow-x-auto w-full'>
            <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                <thead class="bg-gray-900">
                    <tr class="text-white text-left">
                        <th class="font-semibold text-sm uppercase px-6 py-4"> Name </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4"> Designation </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Status </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Date </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4"> </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                <div>
                                    <p> Student Name </p>
                                    <p class="text-gray-500 text-sm font-semibold tracking-wide"> student@mail.com</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class=""> Class </p>
                            <p class="text-gray-500 text-sm font-semibold tracking-wide"> Fee Type </p>
                        </td>
                        <td class="px-6 py-4 text-center"> <span class="text-white text-sm w-1/3 pb-1 bg-red-600 font-semibold px-2 rounded-full"> Not paid </span> </td>
                        <td class="px-6 py-4 text-center"> dd/mm/yyyy </td>
                        <td class="px-6 py-4 text-center"> <a href="#" class="text-purple-800 hover:underline">Edit</a> </td>
                    </tr>
                    <!-- Repeat the rows as needed -->
                </tbody>
            </table>
        </div>
    </div>

    <div class="min-h-screen py-5 yearly hidden">
        <div style="margin-top: 50px;" class='overflow-x-auto w-full'>
            <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                <thead class="bg-gray-900">
                    <tr class="text-white text-left">
                        <th class="font-semibold text-sm uppercase px-6 py-4"> Name </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4"> Designation </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> status </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Date </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4"> </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                <div>
                                    <p> Student Name </p>
                                    <p class="text-gray-500 text-sm font-semibold tracking-wide"> student@mail.com</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class=""> Class </p>
                            <p class="text-gray-500 text-sm font-semibold tracking-wide"> Fee Type </p>
                        </td>
                        <td class="px-6 py-4 text-center"> <span class="text-white text-sm w-1/3 pb-1 bg-red-600 font-semibold px-2 rounded-full"> paid </span> </td>
                        <td class="px-6 py-4 text-center"> dd/mm/yyyy </td>
                        <td class="px-6 py-4 text-center"> <a href="#" class="text-purple-800 hover:underline">Edit</a> </td>
                    </tr>
                    <!-- Repeat the rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
    <footer class="footer mt-auto py-2 bg-blue fs-14">
        <div class="container">
            <span>&copy; Copyright - 2024.</span>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const termFeesBtn = document.getElementById('term-fees-btn');
            const yearlyBtn = document.getElementById('yearly-btn');
            const termSection = document.querySelector('.term');
            const yearlySection = document.querySelector('.yearly');

            termFeesBtn.addEventListener('click', function () {
                termSection.classList.remove('hidden');
                yearlySection.classList.add('hidden');
            });

            yearlyBtn.addEventListener('click', function () {
                yearlySection.classList.remove('hidden');
                termSection.classList.add('hidden');
            });
        });
    </script>
</body>

</html>
