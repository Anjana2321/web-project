<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>KRP</title>
    <link rel="icon" type="image/x-icon" href="../Image/LOGO.png">
    <script src="parent-paymant-page.js" defer></script> 
    
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script>
      $(function() {
         $("#includeHtml").load("Parent-Nav-Bar.html");
      });
    </script>   
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>

/* Responsive adjustments for smaller screens */
@media (max-width: 576px) {
    .form .column {
        flex-wrap: wrap;
    }
}
.studentimage{
    text-align: center;
    
}
.studentimage img{
    width: 100px;
    height: 100px;
    border-radius: 15px;
    text-align: center;
}
.studentdetail{
    margin-top: 15px;
}


    </style>

</head>
<body style="background-color: rgba(77, 197, 145, 1);">
    <div id="includeHtml"></div>
    <section class="container mt-5">
        <h6 class="mb-3">Admission Number</h6>
        <input type="number" class="form-control" id="Admissionnumber" placeholder="Enter Admission Number" required>
        <form class="studentdetail">
                <div  class="studentimage" ><img  src="../Image/Studentimage.jpg" alt="Your Image" ></div>
            <div class="mb-3">
                <label for="name" class="form-label">Student Name: </label>
                <label for="name" class="form-label">Name</label>
            </div>
            <div class="mb-3">
                <label for="Admissionnumber" class="form-label">Admission Number: 12345</label>
                <label for="Admissionnumber" class="form-label">12345</label>
            </div>
            <div class="mb-3">
                <label for="birthdate" class="form-label">Date of Birth: </label>
                <label for="birthdate" class="form-label">Date</label>
            </div>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="classnum" class="form-label">Class: </label>
                    <label for="phoneNumber" class="form-label">7</label>
                </div>
                <div class="col-md-6">
                    <label for="Std" class="form-label">Std.: </label>
                    <label for="Std" class="form-label">D</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="phonenum" class="form-label">Parent's Phone Number</label>
                <label for="phonenum" class="form-label">1234567890</label>
            </div>
            <div class="mb-3">
                <label for="bloodgroup" class="form-label">Blood Group</label>
                <label for="bloogroup" class="form-label">O+ve</label>
            </div>
            <div style="background-color: #E8F3EE; border-radius: 10px;">
                <h3 style="color: #012970;">Attendence Report</h3>
                <div  class="min-h-screen py-5">
                    <div style="margin-top: 15px;" class='overflow-x-auto w-full'>
                        <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-00 overflow-hidden'>
                            <thead class="bg-gray-400">
                                <tr class="text-white text-left">
                                    <th class="font-semibold text-sm uppercase px-4 py-4 text-center"> Suject </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Faculty Name </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Attendence Percentage </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="items-center space-x-3">
                                            <div>
                                                <p> Student Name </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="items-center space-x-3">
                                            
                                            <div>
                                                <p> FacultyName </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="items-center space-x-3">
                                            
                                            <div class="text-center">
                                                <p class="text-center"> 95% </p>
                                            </div>
                                        </div>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="items-center space-x-3">
                                            
                                            <div>
                                                <p> Student Name </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="items-center space-x-3">
                                            
                                            <div>
                                                <p> FacultyName </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="items-center space-x-3">
                                            
                                            <div class="text-center">
                                                <p class="text-center"> 95% </p>
                                            </div>
                                        </div>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="items-center space-x-3">
                                            
                                            <div>
                                                <p> Student Name </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="items-center space-x-3">
                                            
                                            <div>
                                                <p> FacultyName </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="items-center space-x-3">
                                            
                                            <div class="text-center">
                                                <p class="text-center"> 95% </p>
                                            </div>
                                        </div>
                                    </td>
                                    
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div style="background-color: #E8F3EE;  border-radius: 10px;">
                <h3 style="color: #012970;">Scores</h3>
                <div  class="min-h-screen py-5">
                    <div style="margin-top: 15px;" class='overflow-x-auto w-full'>
                        <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-200 overflow-hidden'>
                            <thead class="bg-gray-400">
                                <tr class="text-white text-left">
                                    <th class="font-semibold text-sm uppercase px-4 py-4 text-center"> Suject </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Quaterly Exam </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Half Yearly Exam </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Annual Exam </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="items-center space-x-3">
                                            <div>
                                                <p> Subject </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="items-center space-x-3">
                                            
                                            <div>
                                                <p> 98 </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="items-center space-x-3">
                                            
                                            <div class="text-center">
                                                <p class="text-center"> 95 </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="items-center space-x-3">
                                            
                                            <div class="text-center">
                                                <p class="text-center"> 97 </p>
                                            </div>
                                        </div>
                                    </td>                                    
                                </tr>
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="items-center space-x-3">
                                            <div>
                                                <p> subject </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="items-center space-x-3">
                                            
                                            <div>
                                                <p> 98 </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="items-center space-x-3">
                                            
                                            <div class="text-center">
                                                <p class="text-center"> 95 </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="items-center space-x-3">
                                            
                                            <div class="text-center">
                                                <p class="text-center"> 97 </p>
                                            </div>
                                        </div>
                                    </td>                                    
                                </tr>   
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="items-center space-x-3">
                                            <div>
                                                <p> subject </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="items-center space-x-3">
                                            
                                            <div>
                                                <p> 98 </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="items-center space-x-3">
                                            
                                            <div class="text-center">
                                                <p class="text-center"> 95 </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="items-center space-x-3">
                                            
                                            <div class="text-center">
                                                <p class="text-center"> 97 </p>
                                            </div>
                                        </div>
                                    </td>                                    
                                </tr>                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div style="background-color: #E8F3EE;"  border-radius: 10px;>
                <h3 style="color: #012970;">Financial Record</h3>
                    <h4 style="color: #012970; margin-top: 20px; margin-left: 20px;" >Due List</h4>
                    <div  class="min-h-screen py-5" style="margin-top: 0px; padding-bottom: 0;">
                        <div class='overflow-x-auto w-full'>
                            <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-200 overflow-hidden'>
                                <thead class="bg-gray-400">
                                    <tr class="text-white text-left">
                                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Fee Type </th>
                                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Fee Category </th>
                                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Amount </th>
                                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Status </th>
                                      
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 ">
                                            <div class="items-center space-x-3">
                                                
                                                <div>
                                                    <p> Second Term Fee </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <p class="text-center"> Tution Fee </p>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <p class="text-center"> Rs 25,000 </p>
                                        </td>
                                        <td class="px-6 py-4 text-center"> <span class="text-white text-sm w-1/3 pb-1 bg-red-600 font-semibold px-2 rounded-full"> Not paid </span> </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4">
                                            <div class=" items-center space-x-3">
                                                
                                                <div>
                                                    <p> Third Term Fee </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <p class=" text-center"> Tution Fee </p>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <p class="text-center"> Rs 25,000 </p>
                                        </td>
                                        <td class="px-6 py-4 text-center"> <span class="text-white text-sm w-1/3 pb-1 bg-red-600 font-semibold px-2 rounded-full"> Not paid </span> </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4">
                                            <div class="items-center space-x-3">
                                                
                                                <div>
                                                    <p> Annual Day Fee </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <p class="text-center"> Activity Fee </p>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <p class=" text-center"> Rs 1,000 </p>
                                        </td>
                                        <td class="px-6 py-4 text-center"> <span class="text-white text-sm w-1/3 pb-1 bg-red-600 font-semibold px-2 rounded-full"> Not paid </span> </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                    <h4 style="color: #012970; margin-top: 20px; margin-left: 20px;" >Paid List</h4>
                    <div  class="min-h-screen py-5" style="margin-top: 0px; padding:0%;">
                        <div class='overflow-x-auto w-full'>
                            <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-200 overflow-hidden'>
                                <thead class="bg-gray-400">
                                    <tr class="text-white text-left">
                                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Fee Type </th>
                                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Fee Category </th>
                                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Amount </th>
                                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Status </th>
                                      
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 ">
                                            <div class="items-center space-x-3">
                                                
                                                <div>
                                                    <p> Bus Fee </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <p class="text-center"> Transport Fee </p>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <p class="text-center"> Rs 25,000 </p>
                                        </td>
                                        <td class="px-6 py-4 text-center"> <span class="text-white text-sm w-1/3 pb-1 bg-green-600 font-semibold px-2 rounded-full"> Paid </span> </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4">
                                            <div class="items-center space-x-3">
                                                
                                                <div>
                                                    <p> Club Aciviy Fee </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <p class=""> Activity Fee </p>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <p class="text-center"> Rs 5,000 </p>
                                        </td>
                                        <td class="px-6 py-4 text-center"> <span class="text-white text-sm w-1/3 pb-1 bg-green-600 font-semibold px-2 rounded-full"> Paid </span> </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4">
                                            <div class="items-center space-x-3">
                                                
                                                <div>
                                                    <p> Field Trip Fee </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <p class="text-center"> Activity Fee </p>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <p class="text-center"> Rs 1,500 </p>
                                        </td>
                                        <td class="px-6 py-4 text-center"> <span class="text-white text-sm w-1/3 pb-1 bg-green-600 font-semibold px-2 rounded-full"> Paid </span> </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
                
        </form>
    </section>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
