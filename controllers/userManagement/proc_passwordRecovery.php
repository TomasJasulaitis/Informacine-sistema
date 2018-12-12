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
      $subject = "Password Recovery";

      $message = '
        <html>
          <head>
            <title>Password recovery</title>
          </head>
          <body>
            <p>Norėdami tęsti slaptažodžio atkūrimą, spauskite <a href="http://localhost/informacineSistema/controllers/userManagement/proc_passwordRecovery2.php?token='.$token.'">čia</a></p>
          </body>
        </html>
      ';

      // Always set content-type when sending HTML email
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

      // More headers
      $headers .= 'From: <infowidowsphone@gmail.com>' . "\r\n";

      // ini_set("sendmail_from", "infowidowsphone@gmail.com");

      // ini_set("SMTP","ssl://smtp.gmail.com");
      // ini_set("smtp_port","465");

      //mail($to,$subject,$message,$headers);



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
      $mail->AltBody = 'To recover your password copy this link to your browser address bar: link...';

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