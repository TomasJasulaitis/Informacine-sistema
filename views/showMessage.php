<?php

if (isset($_GET['message'])) {
  $message = $_GET['message'];

  if ($message == "success") {
    echo '
    <div class="alert alert-success text-center">
      <strong>Atlikta sėkmingai!</strong>
    </div>
    ';
  } else {
    $errorMessage = "Įvyko nenumatyta klaida!";

    if ($message == "badPassword") { $errorMessage = "Neteisingas slaptažodis!"; }
    if ($message == "passwordMismatch") { $errorMessage = "Nesutampa slaptažodžiai!"; }
    if ($message == "empty") { $errorMessage = "Reikia užpildyti visus laukelius"; }
    if ($message == "usertaken") { $errorMessage = "Šis vartotojas jau užimtas!"; }
    if ($message == "notVerified") { $errorMessage = "Paskyra nepatvirtinta!"; }
    if ($message == "userNotFound") { $errorMessage = "Vartotojas nerastas!"; }
    if ($message == "badToken") { $errorMessage = "Blogas kodas!"; }
    if ($message == "noToken") { $errorMessage = "Nenurodytas kodas!"; }

    echo '
    <div class="alert alert-danger  text-center">
      <strong>Klaida!</strong> '.$errorMessage.'
    </div>
    ';
  }
}