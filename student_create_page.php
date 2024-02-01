<?php 
     session_start();

     $adminprofile = $_SESSION['admin_name'];

     if ($adminprofile == true) {
          # code...
     }
     else {
          header('Location: home.php');
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

     <title>Add-Student-Panel</title>
</head>

<body>

     <div class="container mt-5 mb-5">

          <?php include('create_message.php'); ?>
          
          <div class="row">
               <div class="col-md-12">
                    <div class="card">
                         <div class="card-header">
                              <h4>Student Add<a href="admin.php" class="btn btn-danger float-end">Back</a></h4>
                         </div>
                         <div class="card-body">
                              <form action="backend_code.php" method="POST">

                                   <div class="md-3 mt-4">
                                        <label>Student Name:</label>
                                        <input type="text" required name="add_student_name" placeholder="Enter your full name" class="form-control">
                                   </div>

                                   <div class="md-3 mt-4">
                                        <label>Student Registration Number:</label>
                                        <input type="text" required name="add_student_email" placeholder="Start with Capital EN e.g. EN20168758" class="form-control">
                                   </div>

                                   <div class="md-3 mt-4">
                                        <label>Student Phone:</label>
                                        <input type="text" maxlength="10" required name="add_student_phone" placeholder="Enter your 10 digit phone number" class="form-control">
                                        <!-- <span><?php echo $_SESSION['message']; ?></span> -->

                                   </div>

                                   <div class="md-3 mt-4">
                                        <label>Student Location:</label>
                                        <input type="text" name="add_student_location" placeholder="Enter your city location" class="form-control">
                                   </div>

                                   <div class="md-3 mt-4">
                                        <label>Student Stop:</label>
                                        <input type="text" name="add_student_stop" placeholder="Enter your bus stop" class="form-control">
                                   </div>

                                   <div class="md-3 mt-4">
                                        <label>Bus Allocated:</label>
                                        <div class="form-check mx-2">
                                             <input type="radio" value="1" class="form-check-input" name="add_student_busallocated">
                                             <label for="1">1</label><br>
                                             <input type="radio" value="2" class="form-check-input" name="add_student_busallocated">
                                             <label for="2">2</label><br>
                                             <input type="radio" value="3" class="form-check-input" name="add_student_busallocated">
                                             <label for="3">3</label><br>
                                             <input type="radio" value="4" class="form-check-input" name="add_student_busallocated">
                                             <label for="4">4</label><br>
                                        </div>
                                   </div>

                                   <div class="md-3 mt-4">
                                        <label>Student Year of Engineering:</label>
                                        <div class="form-check mx-2">
                                             <input type="radio" value="1" class="form-check-input pb-1" name="add_student_yearofengg">
                                             <label for="FE">FE</label><br>
                                             <input type="radio" value="2" class="form-check-input" name="add_student_yearofengg">
                                             <label for="SE">SE</label><br>
                                             <input type="radio" value="3" class="form-check-input" name="add_student_yearofengg">
                                             <label for="TE">TE</label><br>
                                             <input type="radio" value="4" class="form-check-input" name="add_student_yearofengg">
                                             <label for="BE">BE</label><br>
                                        </div>
                                   </div>

                                   <div class="md-3 mt-4">
                                        <label>Student Department:</label>
                                        <div class="form-check mx-2">
                                             <input type="radio" value="computer" class="form-check-input pb-1" name="add_student_department">
                                             <label for="computer">Computer</label><br>
                                             <input type="radio" value="mechanical" class="form-check-input" name="add_student_department">
                                             <label for="mechanical">Mechanical</label><br>
                                             <input type="radio" value="chemical" class="form-check-input" name="add_student_department">
                                             <label for="chemical">Chemical</label><br>
                                             <input type="radio" value="civil" class="form-check-input" name="add_student_department">
                                             <label for="civil">Civil</label><br>
                                             <input type="radio" value="entc" class="form-check-input" name="add_student_department">
                                             <label for="entc">Entc</label><br>
                                        </div>
                                   </div>

                                   <div class="md-3 mt-4">
                                        <label>Fees:</label>
                                        <div class="form-check mx-2">
                                             <input type="radio" value="1200" class="form-check-input" name="add_student_fee">
                                             <label for="1200">1200/-</label><br>
                                             <input type="radio" value="1400" class="form-check-input" name="add_student_fee">
                                             <label for="1400">1400/-</label><br>
                                        </div>
                                   </div>

                                   <div class="md-3 mt-4">
                                        <label>Paid Fees:</label>
                                        <div class="form-check mx-2">
                                             <input type="radio" value="yes" class="form-check-input" name="add_student_paid_fee">
                                             <label for="yes">Yes</label><br>
                                             <input type="radio" value="no" class="form-check-input" name="add_student_paid_fee">
                                             <label for="no">No</label><br>
                                        </div>
                                   </div>

                                   <div class="md-3 mt-4">
                                        <label>Date Of Fees Paid:</label>
                                        <input type="date" name="date_of_fees_paid" class="form-control">
                                   </div>

                                   <div class="md-3 mt-4">
                                        <label>Next Date To Pay Fees:</label>
                                        <input type="date" name="next_date_to_pay_fees" class="form-control">
                                   </div>

                                   <div class="md-3 mt-4">
                                        <button type="reset" class="btn btn-primary mx-2">Reset</button>
                                        <button type="submit" name="save_student" class="btn btn-primary mx-2">Save
                                             Student</button>
                                   </div>

                              </form>
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