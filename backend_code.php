<?php
session_start();
error_reporting(0);

// database connection code
$con = new mysqli("localhost", "root", "", "bus_management_system");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


// $add_student_phone = $phs = ' ';


// Main Code Start from here....
if ($con->connect_error) {
     die("Failed to conect : " . $con->connect_error);
} else {


     // Student Login and display Student Record in Login Page
     if (isset($_POST['student_login'])) {

          $student_email = $_POST['student_registration'];
          $password = $_POST['studpsw'];

          $statement = $con->prepare("select * from student_data where registration_number = ?");
          $statement->bind_param("s", $student_email);
          $statement->execute();
          $statement_result = $statement->get_result();

          if ($statement_result->num_rows > 0) {
               $data = $statement_result->fetch_assoc();

               if ($data['password'] === $password && $data['registration_number'] === $student_email) {

                    $_SESSION['status'] = "Login Successfully...";
                    $_SESSION['status_code'] = "success";

                    $_SESSION['id'] = $data['id'];
                    $_SESSION['student_name'] = $data['student_name'];
                    $_SESSION['bus_allocated'] = $data['bus_allocated'];
                    $_SESSION['phone'] = $data['phone'];
                    $_SESSION['year_of_engineering'] = $data['year_of_engineering'];
                    $_SESSION['department'] = $data['department'];
                    $_SESSION['location'] = $data['location'];
                    $_SESSION['stop'] = $data['stop'];
                    $_SESSION['fees'] = $data['fees'];
                    $_SESSION['paid_fees'] = $data['paid_fees'];
                    $_SESSION['date_of_fees_paid'] = $data['date_of_fees_paid'];
                    $_SESSION['next_date_to_pay_fees'] = $data['next_date_to_pay_fees'];

                    header('Location: logged.php');
               } else {

                    $_SESSION['status'] = "Invalid Email or Password. Please Login Again...";
                    $_SESSION['status_code'] = "error";
                    header('Location: home.php');
               }
          } else {

               $_SESSION['status'] = "Email is not registered. Please contact to your bus manager...";
               $_SESSION['status_code'] = "info";
               header('Location: home.php');
          }
     }


     // Admin Login 
     else if (isset($_POST['admin_login'])) {
          # code...
          $admin_name = $_POST['adminname'];
          $admin_password = $_POST['adminpsw'];

          $statement = $con->prepare("select * from admin_data where admin_name = ?");
          $statement->bind_param("s", $admin_name);
          $statement->execute();
          $statement_result = $statement->get_result();

          if ($statement_result->num_rows > 0) {
               $data = $statement_result->fetch_assoc();

               if ($data['admin_password'] === $admin_password) {

                    $_SESSION['status'] = "Login Successfully...";
                    $_SESSION['status_code'] = "success";

                    $_SESSION['admin_name'] = $data['admin_name'];
                    header('Location: admin.php');
               } else {

                    $_SESSION['status'] = "Invalid Email or Password. Please Login Again...";
                    $_SESSION['status_code'] = "error";
                    header('Location: home.php');
               }
          } else {

               $_SESSION['status'] = "Email is not registered. Please contact to your bus manager...";
               $_SESSION['status_code'] = "info";
               header('Location: home.php');
          }
     }


     // New Student Record
     else if (isset($_POST['save_student'])) {

          $studentname = mysqli_real_escape_string($con, $_POST['add_student_name']);
          $studentregistration = mysqli_real_escape_string($con, $_POST['add_student_email']);
          $studentphone = mysqli_real_escape_string($con, $_POST['add_student_phone']);
          $studentlocation = mysqli_real_escape_string($con, $_POST['add_student_location']);
          $studentstop = mysqli_real_escape_string($con, $_POST['add_student_stop']);
          $studentbusallocated = mysqli_real_escape_string($con, $_POST['add_student_busallocated']);
          $studentyearofengineering = mysqli_real_escape_string($con, $_POST['add_student_yearofengg']);
          $studentdepartment = mysqli_real_escape_string($con, $_POST['add_student_department']);
          $fees = mysqli_real_escape_string($con, $_POST['add_student_fee']);
          $paidfees = mysqli_real_escape_string($con, $_POST['add_student_paid_fee']);
          $dateoffeespaid = mysqli_real_escape_string($con, $_POST['date_of_fees_paid']);
          $nextdatetopayfees = mysqli_real_escape_string($con, $_POST['next_date_to_pay_fees']);

          // Created random Token for verification
          $token = md5(rand());

          $studnetfullemail = strtolower($studentregistration) . "@git-india.edu.in";

          $registration_number_query = "SELECT * FROM `student_data` WHERE `student_email` = '$studnetfullemail'";
          $registration_number_qyery_run = mysqli_query($con, $registration_number_query);

          $registration_number_count = mysqli_num_rows($registration_number_qyery_run);

          if ($registration_number_count > 0) {
               $_SESSION['message'] = "registration number already exists";
               header('Location: student_create_page.php');
          } else {

               $registration_validate = substr($studentregistration, 0, 2);

               if ($registration_validate == 'EN' or $registration_validate == 'DS') {

                    $query = "INSERT INTO `student_data` (`registration_number`,`student_email`,`verify_token`,`student_name`,`bus_allocated`,`phone`,`year_of_engineering`,`department`,`location`,`stop`,`fees`,`paid_fees`,`date_of_fees_paid`,`next_date_to_pay_fees`) VALUES ('$studentregistration','$studnetfullemail','$token','$studentname','$studentbusallocated','$studentphone','$studentyearofengineering','$studentdepartment','$studentlocation','$studentstop','$fees','$paidfees','$dateoffeespaid',' $nextdatetopayfees')";
                    $query_run = mysqli_query($con, $query);

                    if ($query_run) {

                         require 'vendor/phpmailer/phpmailer/src/Exception.php';
                         require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
                         require 'vendor/phpmailer/phpmailer/src/SMTP.php';

                         $mail = new PHPMailer(true);

                         try {
                              //Server settings
                              $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                              $mail->isSMTP();                                            //Send using SMTP
                              $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
                              $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                              $mail->Username   = 'busmanagement2023@gmail.com';          //SMTP username
                              $mail->Password   = 'cqgfibqsbeqrhuyj';                     //SMTP password
                              $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                              $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


                              //Recipients
                              $mail->setFrom('from@example.com', 'Bus Manager');
                              $mail->addAddress($studnetfullemail);                                  //Add a recipient


                              //Attachments
                              $mail->isHTML(true);                                        //Add attachments
                              $mail->Subject = "New Login to Bus Management Portal";             //Optional name

                              $email_template = "
                         <h2>Welcome to Bus Management Portal</h2>
                         <h4>You are receiving this email regarding new Login to Bus Management Portal.</h4>
                         <i>Login with your EN number with default password <b>git123</b> and after set your own password by change password</i>
                         <br>
                         <i>Thank You!</i>
                         ";

                              $mail->Body = $email_template;
                              $mail->send();
                              echo 'Message has been sent';
                         } catch (Exception $e) {
                              echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                         }

                         $_SESSION['message'] = "Student Created Successfully";
                         header('Location: admin.php');
                         exit(0);
                    } else {
                         $_SESSION['message'] = "Student Not Created Successfully";
                         header('Location: admin.php');
                         exit(0);
                    }

                    // Reset the Student ID
                    $query = mysqli_query($con, "SELECT * FROM student_data");
                    $number = 1;

                    while ($row = mysqli_fetch_array($query)) {
                         $stud_id = $row['id'];
                         $sql = "UPDATE `student_data` SET `id` = $number WHERE `id`=$stud_id";
                         if ($con->query($sql) == TRUE) {
                              header('Location: admin.php');
                         }
                         $number++;
                    }

                    // Alter the Increment to the largest number(bigger number)
                    $sql = "ALTER TABLE `student_data` AUTO_INCREMENT = 1";
                    if ($con->query($sql) == TRUE) {
                         header('Location: admin.php');
                    } else {
                         header('Location: admin.php');
                    }
               } else {
                    $_SESSION['message'] = "kindly enter valid registration number";
                    header('Location: student_create_page.php');
               }
          }


          mysqli_close($con);
     }


     // Update Student Record
     else if (isset($_POST['update_student'])) {

          $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
          $studentname = mysqli_real_escape_string($con, $_POST['add_student_name']);
          $studentregistration = mysqli_real_escape_string($con, $_POST['add_student_email']);
          $studentphone = mysqli_real_escape_string($con, $_POST['add_student_phone']);
          $studentlocation = mysqli_real_escape_string($con, $_POST['add_student_location']);
          $studentstop = mysqli_real_escape_string($con, $_POST['add_student_stop']);
          $studentbusallocated = mysqli_real_escape_string($con, $_POST['add_student_busallocated']);
          $studentyearofengineering = mysqli_real_escape_string($con, $_POST['add_student_yearofengg']);
          $studentdepartment = mysqli_real_escape_string($con, $_POST['add_student_department']);
          $fees = mysqli_real_escape_string($con, $_POST['add_student_fee']);
          $paidfees = mysqli_real_escape_string($con, $_POST['add_student_paid_fee']);
          $dateoffeespaid = mysqli_real_escape_string($con, $_POST['date_of_fees_paid']);
          $nextdatetopayfees = mysqli_real_escape_string($con, $_POST['next_date_to_pay_fees']);

          // Created random Token for verification
          $token = md5(rand());

          $studnetfullemail = strtolower($studentregistration) . "@git-india.edu.in";

          $registration_validate = substr($studentregistration, 0, 2);

          if ($registration_validate == 'EN' or $registration_validate == 'DS') {

               $query = "UPDATE `student_data` SET `registration_number`='$studentregistration',`student_email`='$studnetfullemail', `verify_token`='$token', `student_name`='$studentname', `bus_allocated`='$studentbusallocated', `phone`='$studentphone', `year_of_engineering`='$studentyearofengineering', `department`='$studentdepartment', `location`='$studentlocation', `stop`='$studentstop', `fees`='$fees', `paid_fees`='$paidfees', `date_of_fees_paid` = '$dateoffeespaid', `next_date_to_pay_fees` = '$nextdatetopayfees'  WHERE `id`='$student_id'";

               $query_run = mysqli_query($con, $query);
               mysqli_close($con);
               if ($query_run) {

                    require 'vendor/phpmailer/phpmailer/src/Exception.php';
                    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
                    require 'vendor/phpmailer/phpmailer/src/SMTP.php';

                    $mail = new PHPMailer(true);

                    try {
                         //Server settings
                         $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                         $mail->isSMTP();                                            //Send using SMTP
                         $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
                         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                         $mail->Username   = 'busmanagement2023@gmail.com';          //SMTP username
                         $mail->Password   = 'cqgfibqsbeqrhuyj';                     //SMTP password
                         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                         $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


                         //Recipients
                         $mail->setFrom('from@example.com', 'Bus Manager');
                         $mail->addAddress($studnetfullemail);                                  //Add a recipient


                         //Attachments
                         $mail->isHTML(true);                                        //Add attachments
                         $mail->Subject = "Updated your Information in Bus Management Portal";             //Optional name

                         $email_template = "
                    <h2>Welcome to Bus Management Portal</h2>
                    <h4>You are receiving this email because we have updated your information. Kindly login and check your information.</h4>
                    <br>
                    <i>Thank You!</i>
                    ";

                         $mail->Body = $email_template;
                         $mail->send();
                         echo 'Message has been sent';
                    } catch (Exception $e) {
                         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }


                    $_SESSION['message'] = "Student Updated Successfully";
                    header('Location: admin.php');
                    // exit(0);
               } else {
                    $_SESSION['message'] = "Student Not Updated Successfully";
                    header('Location: admin.php');
                    // exit(0);
               }
          } else {
               $_SESSION['message'] = "kindly enter valid registration number";
               header('Location: student_create_page.php');
          }
     }


     // Delete Student Record
     else if (isset($_POST['delete_student'])) {

          $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);
          $query = "DELETE FROM student_data WHERE id = '$student_id'";
          $query_run = mysqli_query($con, $query);

          if ($query_run) {
               $_SESSION['message'] = "Student Data Deleted Successfully";
               header('Location: admin.php');
          } else {
               $_SESSION['message'] = "Student Data Not Deleted Successfully";
               header('Location: admin.php');
          }

          // Reset the Student ID
          $query = mysqli_query($con, "SELECT * FROM student_data");
          $number = 1;

          while ($row = mysqli_fetch_array($query)) {
               $stud_id = $row['id'];
               $sql = "UPDATE `student_data` SET `id` = $number WHERE `id`=$stud_id";
               if ($con->query($sql) == TRUE) {
                    header('Location: admin.php');
               }
               $number++;
          }

          // Alter the Increment to the largest number(bigger number)
          $sql = "ALTER TABLE `student_data` AUTO_INCREMENT = 1";
          if ($con->query($sql) == TRUE) {
               header('Location: admin.php');
          } else {
               header('Location: admin.php');
          }
          mysqli_close($con);
     }


     // Password Reset Code from Home Page
     else if (isset($_POST['password_reset_link_home'])) {
          $email = mysqli_real_escape_string($con, $_POST['email']);
          $token = md5(rand());

          $check_email = "SELECT `student_email` FROM `student_data` WHERE `student_email`='$email' LIMIT 1";
          $check_email_run = mysqli_query($con, $check_email);

          if (mysqli_num_rows($check_email_run) > 0) {
               $row = mysqli_fetch_array($check_email_run);
               // $get_name = $row['student_name'];
               $get_email = $row['student_email'];

               $update_token = "UPDATE `student_data` SET `verify_token`='$token' WHERE `student_email`='$get_email' LIMIT 1";
               $update_token_run = mysqli_query($con, $update_token);

               if ($update_token_run) {

                    require 'vendor/phpmailer/phpmailer/src/Exception.php';
                    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
                    require 'vendor/phpmailer/phpmailer/src/SMTP.php';

                    $mail = new PHPMailer(true);

                    try {
                         //Server settings
                         $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                         $mail->isSMTP();                                            //Send using SMTP
                         $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
                         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                         $mail->Username   = 'busmanagement2023@gmail.com';          //SMTP username
                         $mail->Password   = 'cqgfibqsbeqrhuyj';                     //SMTP password
                         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                         $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


                         //Recipients
                         $mail->setFrom('from@example.com', 'Bus Manager');
                         $mail->addAddress($email);                                  //Add a recipient


                         //Attachments
                         $mail->isHTML(true);                                        //Add attachments
                         $mail->Subject = "Reset Password Notification";             //Optional name

                         $email_template = "
                         <h2>Hello</h2>
                         <h3>You are receiving this email because we received a password reset request for your account.</h3>
                         <br><br/>
                         <a href='http://localhost/BusManagementSystem/password-change.php?token=$token&email=$get_email'> Click Me </a>
                         ";

                         $mail->Body = $email_template;
                         $mail->send();
                         echo 'Message has been sent';
                    } catch (Exception $e) {
                         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }

                    $_SESSION['status'] = "We e-mailed you a password reset link";
                    header("Location: password-reset-home.php");
                    exit(0);
               } else {
                    $_SESSION['status'] = "Something Went Wrong. #1";
                    header("Location: password-reset-home.php");
                    exit(0);
               }
          } else {
               $_SESSION['status'] = "No Email Found";
               header("Location: password-reset-home.php");
               exit(0);
          }
     }


     // Password Reset Code from Logged Page
     else if (isset($_POST['password_reset_link_logged'])) {
          $email = mysqli_real_escape_string($con, $_POST['email']);
          $token = md5(rand());

          $check_email = "SELECT `student_email` FROM `student_data` WHERE `student_email`='$email' LIMIT 1";
          $check_email_run = mysqli_query($con, $check_email);

          if (mysqli_num_rows($check_email_run) > 0) {
               $row = mysqli_fetch_array($check_email_run);
               // $get_name = $row['student_name'];
               $get_email = $row['student_email'];

               $update_token = "UPDATE `student_data` SET `verify_token`='$token' WHERE `student_email`='$get_email' LIMIT 1";
               $update_token_run = mysqli_query($con, $update_token);

               if ($update_token_run) {

                    require 'vendor/phpmailer/phpmailer/src/Exception.php';
                    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
                    require 'vendor/phpmailer/phpmailer/src/SMTP.php';

                    $mail = new PHPMailer(true);

                    try {
                         //Server settings
                         $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                         $mail->isSMTP();                                            //Send using SMTP
                         $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
                         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                         $mail->Username   = 'busmanagement2023@gmail.com';          //SMTP username
                         $mail->Password   = 'cqgfibqsbeqrhuyj';                     //SMTP password
                         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                         $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


                         //Recipients
                         $mail->setFrom('from@example.com', 'Bus Manager');
                         $mail->addAddress($email);                                  //Add a recipient


                         //Attachments
                         $mail->isHTML(true);                                        //Add attachments
                         $mail->Subject = "Reset Password Notification";             //Optional name

                         $email_template = "
                         <h2>Hello</h2>
                         <h3>You are receiving this email because we received a password reset request for your account.</h3>
                         <br><br/>
                         <a href='http://localhost/BusManagementSystem/password-change.php?token=$token&email=$get_email'> Click Me </a>
                         ";

                         $mail->Body = $email_template;
                         $mail->send();
                         echo 'Message has been sent';
                    } catch (Exception $e) {
                         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }

                    $_SESSION['status'] = "We e-mailed you a password reset link";
                    header("Location: password-reset-logged.php");
                    exit(0);
               } else {
                    $_SESSION['status'] = "Something Went Wrong. #1";
                    header("Location: password-reset-logged.php");
                    exit(0);
               }
          } else {
               $_SESSION['status'] = "No Email Found";
               header("Location: password-reset-logged.php");
               exit(0);
          }
     }


     // Password Update Code
     else if (isset($_POST['password_update'])) {

          $email = mysqli_real_escape_string($con, $_POST['email']);
          $new_password = mysqli_real_escape_string($con, $_POST['new_password']);
          $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

          $token = mysqli_real_escape_string($con, $_POST['password_token']);

          if (!empty($token)) {

               if (!empty($email) && !empty($new_password) && !empty($confirm_password)) {

                    // checking Token is Valid or Not
                    $check_token = "SELECT `verify_token` FROM `student_data` WHERE `verify_token`='$token' LIMIT 1";
                    $check_token_run = mysqli_query($con, $check_token);

                    if (mysqli_num_rows($check_token_run) > 0) {

                         if ($new_password == $confirm_password) {

                              $update_password = "UPDATE `student_data` SET `password`='$new_password' WHERE `verify_token`='$token' LIMIT 1";
                              $update_password_run = mysqli_query($con, $update_password);

                              if ($update_password_run) {

                                   $new_token = md5(rand()) . "gitbus";
                                   $update_to_new_token = "UPDATE `student_data` SET `verify_token`='$new_token' WHERE `verify_token`='$token' LIMIT 1";
                                   $update_to_new_token_run = mysqli_query($con, $update_to_new_token);

                                   $_SESSION['status'] = "New Password Successfully Updated...";
                                   $_SESSION['status_code'] = "success";
                                   header("Location: home.php");
                                   exit(0);
                              } else {
                                   $_SESSION['status'] = "Did not update password. Something went wrong.!";
                                   header("Location: password-change.php?token=$token&email=$email");
                                   exit(0);
                              }
                         } else {
                              $_SESSION['status'] = "Password and Confirm Password does not match";
                              header("Location: password-change.php?token=$token&email=$email");
                              exit(0);
                         }
                    } else {
                         $_SESSION['status'] = "Invalid Token.!";
                         header("Location: password-change.php?token=$token&email=$email");
                         exit(0);
                    }
               } else {
                    $_SESSION['status'] = "All filed are Mandetory";
                    header("Location: password-change.php?token=$token&email=$email");
                    exit(0);
               }
          } else {
               $_SESSION['status'] = "No Token Available";
               header("Location: password-change.php");
               exit(0);
          }
     }


     // Fee Remainder code
     else if (isset($_POST['send_remainder_mail'])) {
          $setdate_to_pay_fee = mysqli_real_escape_string($con, $_POST['setdate_of_fee_paid']);

          $query = mysqli_query($con, "SELECT * from `student_data`");

          require 'vendor/phpmailer/phpmailer/src/Exception.php';
          require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
          require 'vendor/phpmailer/phpmailer/src/SMTP.php';

          $mail = new PHPMailer(true);
          $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
          $mail->isSMTP();                                            //Send using SMTP
          $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
          $mail->Username   = 'busmanagement2023@gmail.com';          //SMTP username
          $mail->Password   = 'cqgfibqsbeqrhuyj';                     //SMTP password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
          $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
          $mail->setFrom('from@example.com', 'Bus Manager');

          if (mysqli_num_rows($query) > 0) {


               while ($row = mysqli_fetch_assoc($query)) {

                    //Recipients
                    $mail->addAddress($row['student_email']);
               }

               //Attachments
               $mail->isHTML(true);                                        //Add attachments
               $mail->Subject = "Fee Remainder Notification";             //Optional name

               $email_template = "
                         <h2>Welcome to Bus Management Portal</h2>
                         <h4>You are receiving this email regarding fees to be paid at $setdate_to_pay_fee <i>(YYYY-MM-DD)</i>.</h4>
                         <br>
                         <i>Thank You!</i>
                         ";

               $mail->Body = $email_template;
               $mail->send();

               $_SESSION['message'] = "Remainder email send to all successfully...";
               header('Location: admin.php');
               exit(0);
          } else {

               $_SESSION['message'] = "Something went wrong. Try it again...";
               header('Location: admin.php');
          }
     }
}

mysqli_close($conn);
