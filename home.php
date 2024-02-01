<?php
session_start();

// database connection code
$con = mysqli_connect("localhost", "root", "", "bus_management_system");
if (!$con) {
     die('Connection Failed' . mysqli_connect_error());
}


?>

<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="login.css">


<link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto+Mono&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital@1&display=swap" rel="stylesheet">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>GIT-Bus-Management-System-Home</title>
</head>


<body>
     <!----------------------------------- Header ------------------------------------------->
     <!-- <video src="/video/busreel.mp4" autoplay muted loop width="100%"></video> -->
     <header>
          <nav>
               <!-- left-side-menu -->
               <div class="left-side-menu">
                    <div class="logo">
                         <h3>GIT Bus Management System</h3>
                    </div>
                    <div id="navbar" class="navbar">
                         <ul>
                              <!-- <li><a href="#">Home</a></li> -->
                              <!-- <li><a>Bus Card</a>
                                   <ul>
                                        <li><a href="#student-info">View Details</a></li>
                                        <li><a onclick="document.getElementById('id03').style.display='block'">Apply for
                                                  new Pass</a></li>
                                        <li><a href="#">FAQ</a></li>
                                   </ul>
                              </li> -->
                              <li><a href="#businfo">Bus Info</a></li>
                              <li><a href="#">About Us</a></li>
                         </ul>
                    </div>
               </div>
               <!-- right-side-menu -->
               <div class="right-side-menu">
                    <div class="sub-menu" name="logged" id="log-menu">
                         <button onclick="document.getElementById('id01').style.display='block'">admin</button>
                         <button name="login_btn" onclick="document.getElementById('id02').style.display='block'">Log
                              In</button>
                         <!-- <button onclick="document.getElementById('id03').style.display='block'">Enroll Now</button> -->
                    </div>

               </div>
               <!-- <button class="toggle_btn" onclick="slideNav()">x</button> -->
          </nav>
     </header>

     <!---------------------------------- section-1 ---------------------------------------->
     <div class="main-highlight-display">
          <section class="main-body-panel">
               <div class="displayvideo">
                    <video src="displayvideo.mp4" autoplay muted loop preload="auto">
                    </video>
               </div>
               <div class="display">
                    <h1>Welcome to,</h1>
                    <h2>Gharda Institute of Technology</h2>
                    <h3>Bus Management Portal</h3>
                    <p>A bus ride can determine how good a day it is.</p>
               </div>
          </section>

          <!-- Admin Page POPUP -->
          <section>
               <div id="id01" class="modal">

                    <form class="modal-content animate" action="backend_code.php" method="post">
                         <div class="imgcontainer">
                              <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                              <!-- <img src="/image/dummyprofile.jpg" alt="Avatar" class="avatar"> -->
                         </div>

                         <div class="container">
                              <h1>Admin</h1>
                              <label for="adminname"><b>Enter Username</b></label>
                              <input type="text" placeholder="Enter Name" name="adminname" required>

                              <label for="adminpsw"><b>Enter Password</b></label>
                              <input type="password" placeholder="Enter Password" id="adminPassword" name="adminpsw" required>
                              <div class="showPsw">
                                   <input type="checkbox" onclick="adminShowPSW()"><label for="showPsw">Show
                                        Password</label>
                              </div>
                              <button type="submit" name="admin_login">Login</button>
                              <button type="reset">clear</button>
                         </div>

                         <div class="container">
                              <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                              <!-- <span class="psw">change/forgot <a href="#">password</a></span> -->
                         </div>
                    </form>
               </div>
          </section>

          <!-- Login Page POPUP -->
          <section>
               <div id="id02" class="modal">

                    <form class="modal-content animate" action="backend_code.php" method="post">
                         <div class="imgcontainer">
                              <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                              <!-- <img src="/image/dummyprofile.jpg" alt="Avatar" class="avatar"> -->
                         </div>

                         <div class="container">
                              <h1>Log in</h1>
                              <label for="College Email"><b> Enter Student Registration Number</b></label>
                              <input type="text" placeholder=" Start with Capital EN e.g. EN20168758" name="student_registration" required>

                              <label for="psw"><b>Enter Password</b></label>
                              <input type="password" placeholder="Enter Password" id="studPassword" name="studpsw" required>
                              <div class="showPsw">
                                   <input type="checkbox" onclick="studShowPSW()"><label for="showPsw">Show
                                        Password</label>
                              </div>

                              <button type="submit" id="StudLoginBtn" name="student_login">Login</button>
                              <button type="reset">clear</button>
                              <!-- <label>
                                   <input type="checkbox" checked="checked" name="remember"> Remember me
                              </label> -->

                         </div>

                         <div class="container">
                              <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                              <span class="psw">forgot <a href="password-reset-home.php">password</a></span>
                         </div>
                    </form>
               </div>
          </section>
     </div>
     <!---------------------------------- section-2 ---------------------------------------->
     <div id="businfo" class="bus-panel">
          <h1>Bus Info:</h1>
          <div class="bus-info-panel">
               <table>
                    <tr>
                         <th>Bus No.</th>
                         <th>Driver Name</th>
                         <th>Location</th>
                         <th>Route</th>
                         <th>Start Timing</th>
                         <th>Total Seats</th>
                         <th>Available Seats</th>
                    </tr>
                    <tr>
                         <td>Bus-1</td>
                         <td>Niranjan Salvi</td>
                         <td>Khed</td>
                         <td>Teen batti naka -> ST stand -> Golibaar maidan -> Bharne Naka<br>-> Railway station -> Khopi fata -> Shiv fata -> Lavel</td>
                         <td>Morning: 9:15am<br>Evening: 5:10pm</td>
                         <td>42</td>
                         <?php
                         $bus_1_avail_count_query = "SELECT * FROM student_data WHERE bus_allocated = '1'";
                         $bus_1_avail_count_query_run = mysqli_query($con, $bus_1_avail_count_query);

                         if ($bus_1_avail_count_total = mysqli_num_rows($bus_1_avail_count_query_run)) {
                              $avail_bus_1_seat = 42 - $bus_1_avail_count_total;
                              echo '<td>' . $avail_bus_1_seat . '</td>';
                         } else {
                              echo '<td> 0 </td>';
                         }

                         ?>
                    </tr>
                    <tr>
                         <td>Bus-2</td>
                         <td>Pankesh Tambe</td>
                         <td>Chiplun</td>
                         <td>Bahadurshek naka -> Farshi ->Parshuram ghat -><br> Pir Lote -> Lavel</td>
                         <td>Morning: 8:45am<br>Evening: 5:10pm</td>
                         <td>50</td>
                         <?php
                         $bus_2_avail_count_query = "SELECT * FROM student_data WHERE bus_allocated = '2'";
                         $bus_2_avail_count_query_run = mysqli_query($con, $bus_2_avail_count_query);

                         if ($bus_2_avail_count_total = mysqli_num_rows($bus_2_avail_count_query_run)) {
                              $avail_bus_2_seat = 50 - $bus_2_avail_count_total;
                              echo '<td>' . $avail_bus_2_seat . '</td>';
                         } else {
                              echo '<td> 0 </td>';
                         }

                         ?>
                    </tr>
                    <tr>
                         <td>Bus-3</td>
                         <td>Arun Bamne</td>
                         <td>Chiplun</td>
                         <td>Powerhouse -> Bhogale -> Bandal -> Bahadurshek naka<br>-> Farshi -> Parshuram ghat -> Pir
                              Lote -> Lavel</td>
                         <td>Morning: 8:45am<br>Evening: 5:10pm</td>
                         <td>50</td>
                         <?php
                         $bus_3_avail_count_query = "SELECT * FROM student_data WHERE bus_allocated = '3'";
                         $bus_3_avail_count_query_run = mysqli_query($con, $bus_3_avail_count_query);

                         if ($bus_3_avail_count_total = mysqli_num_rows($bus_3_avail_count_query_run)) {
                              $avail_bus_3_seat = 50 - $bus_3_avail_count_total;
                              echo '<td>' . $avail_bus_3_seat . '</td>';
                         } else {
                              echo '<td> 0 </td>';
                         }

                         ?>
                    </tr>

                    <tr>
                         <td>Bus-4</td>
                         <td>Vishavajit Nalawade </td>
                         <td>Chiplun</td>
                         <td>Powerhouse -> Bhogale -> Bandal -> Bahadurshek naka<br>-> Farshi -> Parshuram ghat -> Pir
                              Lote -> Lavel</td>
                         <td>Morning: 8:45am<br>Evening: 5:10pm</td>
                         <td>50</td>
                         <?php
                         $bus_4_avail_count_query = "SELECT * FROM student_data WHERE bus_allocated = '4'";
                         $bus_4_avail_count_query_run = mysqli_query($con, $bus_4_avail_count_query);

                         if ($bus_4_avail_count_total = mysqli_num_rows($bus_4_avail_count_query_run)) {
                              $avail_bus_4_seat = 50 - $bus_4_avail_count_total;
                              echo '<td>' . $avail_bus_4_seat . '</td>';
                         } else {
                              echo '<td> 0 </td>';
                         }

                         ?>
                    </tr>
               </table>
          </div>
     </div>



     <?php mysqli_close($con); ?>



     <footer>
          <div id="copyright"> &copy;2022 All Right Reserved by<strong>&nbsp;GIT Bus Management System</strong>&nbsp;, GIT
          </div>
          <div id="design"><strong>designed by:</strong>&nbsp;Team Blender</div>
     </footer>

     <!-- <script src="login.js"></script> -->
     <script>
          function adminShowPSW() {
               var y = document.getElementById("adminPassword");

               if (y.type === "password") {
                    y.type = "text";
               } else {
                    y.type = "password";
               }
          }

          function studShowPSW() {
               var x = document.getElementById("studPassword");

               if (x.type === "password") {
                    x.type = "text";
               } else {
                    x.type = "password";
               }
          }
     </script>

     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

     <?php
     if (isset($_SESSION['status']) && $_SESSION['status'] != '') {

     ?>
          <script>
               swal({
                    title: "<?php echo $_SESSION['status']; ?>",
                    icon: "<?php echo $_SESSION['status_code']; ?>",
                    button: "OK.",
               });
          </script>

     <?php
          unset($_SESSION['status']);
     }
     ?>


</body>

</html>