<?php
session_start();

$adminprofile = $_SESSION['admin_name'];

if ($adminprofile == true) {
     # code...
} else {
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

     <title>Fee-Remainder-Panel</title>
</head>

<body>

     <div class="container mt-5 mb-5">

          <?php include('create_message.php'); ?>

          <div class="row">
               <div class="col-md-12">
                    <div class="card">
                         <div class="card-header">
                              <h4>Fee Remainder<a href="admin.php" class="btn btn-danger float-end">Back</a></h4>
                         </div>
                         <div class="card-body">
                              <!-- <form action="backend_code.php" method="POST"> -->
                              <form action="backend_code.php" method="POST">
                                   <div class="md-3 mt-4">
                                        <label>set date on which student should pay the fee:</label>
                                        <input type="date" required name="setdate_of_fee_paid" class="form-control">
                                   </div>


                                   <div class="md-3 mt-4">
                                        <button type="reset" class="btn btn-primary mx-2">Reset</button>
                                        <button type="submit" name="send_remainder_mail" class="btn btn-primary mx-2">Send Mail</button>
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