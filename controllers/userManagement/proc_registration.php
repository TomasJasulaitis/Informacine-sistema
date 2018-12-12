<?php


if (isset($_POST["submit"])) {
  include_once '../../inc/dbconn.php';

  $firstName = escape($conn, $_POST["firstName"]);
  $lastName = escape($conn, $_POST["lastName"]);
  $phoneNr = escape($conn, $_POST["phoneNr"]);
  $email = escape($conn, $_POST["email"]);
  $pass1 = escape($conn, $_POST["pass1"]);
  $pass2 = escape($conn, $_POST["pass2"]);

  // Error handling
  // Check for empty fields
  if (empty($firstName) || empty($lastName) || empty($phoneNr) || empty($email) || empty($pass1) || empty($pass2)){
    header("Location: ../../views/userManagement/registration.php?message=empty");
    exit();
  } else {

    // Check if passwords matches
    if ($pass1 !== $pass2) {
      header("Location: ../../views/userManagement/registration.php?message=passdontmatch");
      exit();
    }

    // Check if user exists
    $sql = "SELECT * FROM users WHERE email='$email'"; 
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    $sql = "SELECT * FROM employees WHERE email='$email'"; 
    $result2 = mysqli_query($conn, $sql);
    $resultCheck = $resultCheck + mysqli_num_rows($result2);

    if ($resultCheck > 0) {
      header("Location: ../../views/userManagement/registration.php?message=usertaken");
      exit();
    }

    // All checks passed
    // Hashing the password
    $hashedPass = password_hash($pass1, PASSWORD_DEFAULT);
    $token = md5(uniqid($_SERVER['REMOTE_ADDR'], true));
    $sql = "INSERT INTO users 
    (email, password, emailVerified, emailVerificationToken, firstName, lastName, phoneNumber) VALUES
    ('$email','$hashedPass','0','$token','$firstName','$lastName','$phoneNr')";
    //die($sql);
    mysqli_query($conn, $sql);

    // Send email
    $to = $email;
      $subject = "Paskyros patvirtinimas";

      $message = '
        <html>
          <head>
            <title>Paskyros patvirtinimas</title>
          </head>
          <body>
            <p>Norėdami patvirtinti paskyrą, spauskite <a href="http://localhost/informacineSistema/controllers/userManagement/proc_registration2.php?token='.$token.'">čia</a></p>
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
      $mail->AltBody = 'Norėdami patvirtinti paskyrą, nueikite šiuo adresu: http://localhost/informacineSistema/controllers/userManagement/proc_registration2.php?token='.$token;

      if(!$mail->send()) {
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
          echo 'Message has been sent';
      }


    header("Location: ../../views/userManagement/login.php?message=success");
    exit();
  }

} else {
  header("Location: ../../views/userManagement/registration.php");
  exit();
}