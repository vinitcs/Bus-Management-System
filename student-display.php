<?php 
session_start(); 

     $studentprofile = $_SESSION['admin_name'];

     if ($studentprofile == true) {
          # code...
     }
     else {
          header('Location: home.php');
     }

     // database connection code
     $con = mysqli_connect("localhost", "root", "", "bus_management_system");
     if (!$con) {
          die('Connection Failed' . mysqli_connect_error());
     }
?>


<!doctype html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

     <title>Edit-Student-Panel</title>
</head>

<body>
     <div class="container mt-5 mb-5">          
          <div class="row">
               <div class="col-md-12">
                    <div class="card">
                         <div class="card-header">
                              <h4>Student Display<a href="admin.php" class="btn btn-danger float-end">BACK</a></h4>
                         </div>
                         <div class="card-body">


                              <?php 
                                if (isset($_GET['id'])) {
                                   $student_id = mysqli_real_escape_string($con, $_GET['id']);
                                   $query = "SELECT * FROM student_data WHERE id='$student_id'";
                                   $qurey_run = mysqli_query($con, $query);

                                   if (mysqli_num_rows($qurey_run)> 0) {
                                        $student = mysqli_fetch_array($qurey_run);
                                        
                                        ?>                
                                        <form action="backend_code.php" method="POST">
                                             <input type="hidden" name="student_id" value="<?= $student['id']; ?>">
                                             <div class="md-3 mt-4">
                                                  <label>Student Name:</label>
                                                  <input type="text" value="<?= $student['student_name']; ?>" name="add_student_name" class="form-control" disabled selected>
                                             </div>

                                             <div class="md-3 mt-4">
                                                  <label>Student Registration Number:</label>
                                                  <input type="text" value="<?= $student['registration_number']; ?>" name="add_student_email" placeholder="Start with Capital EN e.g. EN20168758" class="form-control" disabled selected>
                                             </div>

                                             <div class="md-3 mt-4">
                                                  <label>Student Phone:</label>
                                                  <input type="text" value="<?= $student['phone']; ?>" name="add_student_phone" class="form-control" disabled selected>
                                             </div>

                                             <div class="md-3 mt-4">
                                                  <label>Student Location:</label>
                                                  <input type="text" value="<?= $student['location']; ?>" name="add_student_location" class="form-control" disabled selected>
                                             </div>

                                             <div class="md-3 mt-4">
                                                  <label>Student Stop:</label>
                                                  <input type="text" value="<?= $student['stop']; ?>" name="add_student_stop" class="form-control" disabled selected>
                                             </div>

                                             <div class="md-3 mt-4">
                                                  <label>Bus Allocated:</label>
                                                  <div class="form-check mx-2">
                                                       <input type="radio" value="1" class="form-check-input" name="add_student_busallocated" disabled selected
                                                       <?php 
                                                         if ($student['bus_allocated'] == "1") {
                                                            echo "checked";
                                                         }
                                                       ?>
                                                       >
                                                       <label for="1">1</label><br>
                                                       <input type="radio" value="2" class="form-check-input" name="add_student_busallocated" disabled selected
                                                       <?php 
                                                         if ($student['bus_allocated'] == "2") {
                                                            echo "checked";
                                                         }
                                                       ?>
                                                       >
                                                       <label for="2">2</label><br>
                                                       <input type="radio" value="3" class="form-check-input" name="add_student_busallocated" disabled selected
                                                       <?php 
                                                         if ($student['bus_allocated'] == "3") {
                                                            echo "checked";
                                                         }
                                                       ?>
                                                       >
                                                       <label for="3">3</label><br>
                                                       <input type="radio" value="4" class="form-check-input" name="add_student_busallocated" disabled selected
                                                       <?php 
                                                         if ($student['bus_allocated'] == "4") {
                                                            echo "checked";
                                                         }
                                                       ?>
                                                       >
                                                       <label for="4">4</label><br>
                                                  </div>
                                             </div>

                                             <div class="md-3 mt-4">
                                                  <label>Student Year of Engineering:</label>
                                                  <div class="form-check mx-2">
                                                       <input type="radio" value="1" class="form-check-input pb-1" name="add_student_yearofengg" disabled selected
                                                       <?php 
                                                         if ($student['year_of_engineering'] == "1") {
                                                            echo "checked";
                                                         }
                                                       ?>
                                                       >
                                                       <label for="FE">FE</label><br>
                                                       <input type="radio" value="2" class="form-check-input" name="add_student_yearofengg" disabled selected
                                                       <?php 
                                                         if ($student['year_of_engineering'] == "2") {
                                                            echo "checked";
                                                         }
                                                       ?>
                                                       >
                                                       <label for="SE">SE</label><br>
                                                       <input type="radio" value="3" class="form-check-input" name="add_student_yearofengg" disabled selected
                                                       <?php 
                                                         if ($student['year_of_engineering'] == "3") {
                                                            echo "checked";
                                                         }
                                                       ?>
                                                       >
                                                       <label for="TE">TE</label><br>
                                                       <input type="radio" value="4" class="form-check-input" name="add_student_yearofengg" disabled selected
                                                       <?php 
                                                         if ($student['year_of_engineering'] == "4") {
                                                            echo "checked";
                                                         }
                                                       ?>
                                                       >
                                                       <label for="BE">BE</label><br>
                                                  </div>
                                             </div>

                                             <div class="md-3 mt-4">
                                                  <label>Student Department:</label>
                                                  <div class="form-check mx-2">
                                                       <input type="radio" value="computer" class="form-check-input pb-1" name="add_student_department" disabled selected
                                                       <?php 
                                                         if ($student['department'] == "computer") {
                                                            echo "checked";
                                                         }
                                                       ?>
                                                       >
                                                       <label for="computer">Computer</label><br>
                                                       <input type="radio" value="mechanical" class="form-check-input" name="add_student_department" disabled selected
                                                       <?php 
                                                         if ($student['department'] == "mechanical") {
                                                            echo "checked";
                                                         }
                                                       ?>
                                                       >
                                                       <label for="mechanical">Mechanical</label><br>
                                                       <input type="radio" value="chemical" class="form-check-input" name="add_student_department" disabled selected
                                                       <?php 
                                                         if ($student['department'] == "chemical") {
                                                            echo "checked";
                                                         }
                                                       ?>
                                                       >
                                                       <label for="chemical">Chemical</label><br>
                                                       <input type="radio" value="civil" class="form-check-input" name="add_student_department" disabled selected
                                                       <?php 
                                                         if ($student['department'] == "civil") {
                                                            echo "checked";
                                                         }
                                                       ?>
                                                       >
                                                       <label for="civil">Civil</label><br>
                                                       <input type="radio" value="entc" class="form-check-input" name="add_student_department" disabled selected
                                                       <?php 
                                                         if ($student['department'] == "entc") {
                                                            echo "checked";
                                                         }
                                                       ?>
                                                       >
                                                       <label for="entc">Entc</label><br>
                                                  </div>
                                             </div>

                                             <div class="md-3 mt-4">
                                                  <label>Fees:</label>
                                                  <div class="form-check mx-2">
                                                       <input type="radio" value="1200" class="form-check-input" name="add_student_fee" disabled selected
                                                       <?php 
                                                         if ($student['fees'] == "1200") {
                                                            echo "checked";
                                                         }
                                                       ?>
                                                       >
                                                       <label for="1200">1200/-</label><br>
                                                       <input type="radio" value="1400" class="form-check-input" name="add_student_fee" disabled selected
                                                       <?php 
                                                         if ($student['fees'] == "1400") {
                                                            echo "checked";
                                                         }
                                                       ?>
                                                       >
                                                       <label for="1400">1400/-</label><br>
                                                  </div>
                                             </div>

                                             <div class="md-3 mt-4">
                                                  <label>Paid Fees:</label>
                                                  <div class="form-check mx-2">
                                                       <input type="radio" value="yes" class="form-check-input" name="add_student_paid_fee" disabled selected
                                                       <?php 
                                                         if ($student['paid_fees'] == "yes") {
                                                            echo "checked";
                                                         }
                                                       ?>
                                                       >
                                                       <label for="yes">Yes</label><br>
                                                       <input type="radio" value="no" class="form-check-input" name="add_student_paid_fee" disabled selected
                                                       <?php 
                                                         if ($student['paid_fees'] == "no") {
                                                            echo "checked";
                                                         }
                                                       ?>
                                                       >
                                                       <label for="no">No</label><br>
                                                  </div>
                                             </div>

                                             <div class="md-3 mt-4">
                                                  <label>Date Of Fees Paid:</label>
                                                  <input type="date" name="date_of_fees_paid" disabled selected value="<?= $student['date_of_fees_paid']; ?>" class="form-control">
                                             </div>

                                             <div class="md-3 mt-4">
                                                  <label>Next Date To Pay Fees:</label>
                                                  <input type="date" name="next_date_to_pay_fees" disabled selected value="<?= $student['next_date_to_pay_fees']; ?>" class="form-control">
                                             </div>

                                        </form>
                                        <?php 
                                   }
                                   else {
                                        echo "<h4>No Such Id Found</h4>";
                                   }
                                }
                              ?>     
                         </div>
                    </div>
               </div>
          </div>
     </div>



     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
     </script>

</body>

</html>