<?php


if (isset($_POST["submit"])) {
  include_once '../../inc/dbconn.php';

  $email = escape($conn, $_POST["email"]);

  // Error handling
  // Check for empty fields
  if (empty($email)){
    header("Location: ../../views/userManagement/passwordRecovery.php?message=empty");
    exit();
  } else {

    // Check if user exists
    $sql = "SELECT * FROM users WHERE email='$email'"; 
    $result = mysqli_query($conn, $sql);
    $resultCheckUsers = mysqli_num_rows($result);

    $sql = "SELECT * FROM employees WHERE email='$email'"; 
    $result2 = mysqli_query($conn, $sql);
    $resultCheckEmployees = mysqli_num_rows($result2);

    if ($resultCheckUsers + $resultCheckEmployees < 0) {
      header("Location: ../../views/userManagement/passwordRecovery.php?message=userNotFound");
      exit();
    }

    if ($resultCheckUsers == 1 && $resultCheckEmployees == 0) {
      // Admin/user

      $token = md5(uniqid($_SERVER['REMOTE_ADDR'], true));
      //die($token);
      $sql = "UPDATE users SET emailVerified=0, passwordRecoveryToken='$token' WHERE email='$email'";
      mysqli_query($conn, $sql);

      // Send email
      $to = $email;
      $subject = "Slaptažodžio atkūrimas";

      $message = '
        <html>
          <head>
            <title>Slaptažodžio atkūrimas</title>
          </head>
          <body>
            <p>Norėdami tęsti slaptažodžio atkūrimą, spauskite <a href="http://localhost/informacineSistema/controllers/userManagement/proc_passwordRecovery2.php?token='.$token.'">čia</a></p>
          </body>
        </html>
      ';

      require '../../PHPMailerAutoload.php';
      require '../../mailCredentials.php';

      $mail = new PHPMailer;

      $mail->SMTPDebug = 0;                               // Enable verbose debug output

      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = EMAIL;                 // SMTP username
      $mail->Password = PASS;                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to

      $mail->setFrom(EMAIL, 'SupportWindowsPhone');
      $mail->addAddress($to);     // Add a recipient
      $mail->addReplyTo(EMAIL);
      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->CharSet = 'UTF-8';

      $mail->Subject = $subject;
      $mail->Body    = $message;
      $mail->AltBody = 'Norėdami tęsti slaptažodžio atkūrimą, nueikite šiuo adresu: http://localhost/informacineSistema/controllers/userManagement/proc_passwordRecovery2.php?token='.$token;

      if(!$mail->send()) {
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
          echo 'Message has been sent';
      }




      //die();
      header("Location: ../../views/userManagement/passwordRecovery.php?message=success");
      exit();

    } else if ($resultCheckUsers == 0 && $resultCheckEmployees == 1) {
      // Employee


    }

    header("Location: ../../views/userManagement/passwordRecovery.php?message=error");
    exit();
  }

} else {
  header("Location: ../../views/userManagement/passwordRecovery.php");
  exit();
}