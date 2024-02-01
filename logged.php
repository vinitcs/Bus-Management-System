<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="login.css">


<link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto+Mono&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital@1&display=swap" rel="stylesheet">
<link rel="stylesheet"
     href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Student-Logged</title>
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
                              <li><a href="#student-info">Bus Card Info</a>
                              <li><a href="password-reset-logged.php">Change Password</a>
                                   <!-- <ul>
                                        <li><a href="#student-info">View Details</a></li>
                                        <li><a onclick="document.getElementById('id03').style.display='block'">Apply for
                                                  new Pass</a></li> 
                                        <li><a href="#">FAQ</a></li>
                                   </ul> -->
                              </li>
                              <!-- <li><a href="#businfo">Bus Info</a></li> -->
                              <!-- <li><a href="#">About Us</a></li> -->
                         </ul>
                    </div>
               </div>
               <!-- right-side-menu -->


               <div class="right-side-menu">

                    <div class="log-in-show-menu" name="logout" id="log-out-menu">

                         <label for="log-in-user"><span class="material-symbols-outlined">
                                   person</span><input type="text" value="<?php echo($_SESSION['student_name']); ?>"
                                   selected disabled></label>

                         <a href="logout.php"><button name="logout_btn">Logout</button></a>
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
     </div>
     <!---------------------------------- section-2 ---------------------------------------->
     <!-- <div id="businfo" class="bus-panel">
          <h1>Bus Info:</h1>
          <div class="bus-info-panel">
               <table>
                    <tr>
                         <th>Bus No.</th>
                         <th>Driver Name</th>
                         <th>Location</th>
                         <th>Route</th>
                         <th>Students</th>
                         <th>Start Timing</th>
                         <th>Total Seats</th>
                         <th>Available Seats</th>
                    </tr>
                    <tr>
                         <td>Bus-1</td>
                         <td>Driver-name</td>
                         <td>Khed</td>
                         <td>Teen batti naka-> ST stand-> Golibaar maidan-> Bharne Naka-><br> Railway station-> Khopi
                              fata-> Shiv fata-> Lavel</td>
                         <td>FE, SE, TE, BE</td>
                         <td>Morning: 9:15am<br>Evening: 5:10pm</td>
                         <td>42</td>
                         <td>6</td>
                    </tr>
                    <tr>
                         <td>Bus-2</td>
                         <td>Driver-name</td>
                         <td>Chiplun</td>
                         <td>Powerhouse-> Bhogale->Bandal-> Bahadurshek naka-><br> Farshi-> Parshuram ghat-> Pir
                              Lote->Lavel</td>
                         <td>FE, SE, TE, BE</td>
                         <td>Morning: 8:45am<br>Evening: 5:10pm</td>
                         <td>50</td>
                         <td>2</td>
                    </tr>
                    <tr>
                         <td>Bus-3</td>
                         <td>Driver-name</td>
                         <td>Chiplun</td>
                         <td>Bahadurshek naka-> Farshi->Parshuram ghat-> Pir Lote-> Lavel</td>
                         <td>SE, TE, BE</td>
                         <td>Morning: 8:45am<br>Evening: 5:10pm</td>
                         <td>50</td>
                         <td>-</td>
                    </tr>

                    <tr>
                         <td>Bus-4</td>
                         <td>Driver-name</td>
                         <td>Chiplun</td>
                         <td>Powerhouse-> Bhogale-> Bandal-> Bahadurshek naka-><br> Farshi-> Parshuram ghat-> Pir
                              Lote->Lavel</td>
                         <td>FE, SE, TE</td>
                         <td>Morning: 8:45am<br>Evening: 5:10pm</td>
                         <td>50</td>
                         <td>4</td>
                    </tr>
               </table>
          </div>
     </div> -->

     <div id="student-info" class="student-info-panel">
          <h1>Bus Card info:</h1>
          <div class="student-details">
               <table>
                    <tr>
                         <th>Student Name</th>
                         <th>Bus Allocated</th>
                         <th>Phone</th>
                         <th>Year of Engineering.</th>
                         <th>Department</th>
                         <th>Location</th>
                    </tr>

                    <tr>
                         <td><?php echo($_SESSION['student_name']); ?></td>
                         <td><?php echo($_SESSION['bus_allocated']); ?></td>
                         <td><?php echo($_SESSION['phone']); ?></td>
                         <td><?php echo($_SESSION['year_of_engineering']); ?></td>
                         <td><?php echo($_SESSION['department']); ?></td>
                         <td><?php echo($_SESSION['location']); ?></td>
                    </tr>
               
                    <tr>
                         <th>stop</th>
                         <th>Fees</th>
                         <th>Paid Fees</th>
                         <th>Date of fees Paid</th>
                         <th>Next due date</th>
                    </tr>

                    <tr>
                         <td><?php echo($_SESSION['stop']); ?></td>
                         <td><?php echo($_SESSION['fees']); ?></td>
                         <td><?php echo($_SESSION['paid_fees']); ?></td>
                         <td><?php echo($_SESSION['date_of_fees_paid']); ?></td>
                         <td><?php echo($_SESSION['next_date_to_pay_fees']); ?></td>
                    </tr>
               </table>
          </div>
     </div>


     <footer>
          <div id="copyright"> &copy;2022 All Right Reserved by<strong>&nbsp;GIT Bus Management System</strong>&nbsp;,
               GIT
          </div>
          <div id="design"><strong>designed by:</strong>&nbsp;Team Blender</div>
     </footer>


     <script src="login.js"></script>
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