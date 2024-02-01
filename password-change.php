<?php session_start(); ?>

<!doctype html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- <link rel="stylesheet" href="style.css"> -->

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

     <title>Password-Change-Panel</title>

</head>

<body>
     <div class="py-5">
          <div class="container">
               <div class="row justify-content-center">
                    <div class="col-md-6">

                         <?php
                         if (isset($_SESSION['status'])) {
                         ?>
                              <div class="alert alert-success">
                                   <h5><?= $_SESSION['status']; ?></h5>
                              </div>
                         <?php
                              unset($_SESSION['status']);
                         }
                         ?>

                         <div class="card">
                              <div class="card-header">
                                   <h5>Change Password</h5>
                              </div>
                              <div class="card-body p-4">

                                   <form action="backend_code.php" method="post">
                                        <input type="hidden" name="password_token" value="<?php if (isset($_GET['token'])) {
                                                                                               echo $_GET['token'];
                                                                                          } ?>">


                                        <div class="form-group mb-3">
                                             <label>Email Address</label>
                                             <input type="text" name="email" value="<?php if (isset($_GET['email'])) {
                                                                                          echo $_GET['email'];
                                                                                     } ?>" class="form-control" placeholder="Enter Email Address">
                                        </div>
                                        <div class="form-group mb-3">
                                             <label>New Password</label>
                                             <input type="password" name="new_password" class="form-control" placeholder="Enter New Password">
                                        </div>
                                        <div class="form-group mb-3">
                                             <label>Confirm password</label>
                                             <input type="password" name="confirm_password" class="form-control" placeholder="Enter Confirm Password">
                                        </div>
                                        <div class="form-group mb-3">
                                             <button type="submit" name="password_update" class="btn btn-success w-100">Update Password</button>
                                        </div>

                                   </form>
                              </div>
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