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

     <title>Add-Admin-Panel</title>
</head>

<body>

     <div class="container mt-5 mb-5">

          <?php include('create_message.php'); ?>
          
          <div class="row">
               <div class="col-md-12">
                    <div class="card">
                         <div class="card-header">
                              <h4>Admin Add<a href="admin-edit.php" class="btn btn-danger float-end">Back</a></h4>
                         </div>
                         <div class="card-body">
                              <form action="backend_code.php" method="POST">
                                   <div class="md-3 mt-4">
                                        <label>Admin Name:</label>
                                        <input type="text" name="add_admin_name" class="form-control">
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