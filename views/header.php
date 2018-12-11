<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mobiliųjų Telefonų Centras</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <?php echo '
      <a class="navbar-brand" href="'.$_SESSION['prefix'].'index.php">Mobiliųjų Telefonų centras</a>
      '; ?>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="nav navbar-nav">
          <?php echo '
          <li class="nav-item '.($_SESSION['currentPage']==="sales"? " active" : "").'">
            <a class="nav-link" href="Sales.html">Pardavimai</a>
          </li>
          <li class="nav-item '.($_SESSION['currentPage']==="repair"? " active" : "").'">
          <a class="nav-link" href="'.$_SESSION['prefix'].'views/repairment/repairmentMain.php">Remontas</a>
          </li>
          <li class="nav-item '.($_SESSION['currentPage']==="production"? " active" : "").'">
            <a class="nav-link" href="Production.html">Gamyba</a>
          </li>
 	<li class="nav-item '.($_SESSION['currentPage']==="supportMain"? " active" : "").'">
              <a class="nav-link" href="'.$_SESSION['prefix'].'views/support/supportMain.php">Aptarnavimas</a>
           
          </li>
          '; ?>
        </ul>
        <ul class="nav navbar-nav ml-auto">
          <?php 
          if (isset($_SESSION['email'])) {
            echo '
            <li class="nav-item '.($_SESSION['currentPage']==="userActions"? " active" : "").'">
            <a class="nav-link" href="'.$_SESSION['prefix'].'views/userManagement/userActions.php">Vartotojo veiksmai</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="'.$_SESSION['prefix'].'controllers/userManagement/proc_logout.php">Atsijungti</a>
            </li>
            ';
          } else {
            echo '
            <li class="nav-item '.($_SESSION['currentPage']==="registration"? " active" : "").'">
              <a class="nav-link" href="'.$_SESSION['prefix'].'views/userManagement/registration.php">Registracija</a>
            </li>
            <li class="nav-item '.($_SESSION['currentPage']==="login"? " active" : "").'">
              <a class="nav-link" href="'.$_SESSION['prefix'].'views/userManagement/login.php">Prisijungimas</a>
            </li>
            ';
            } ?>
        </ul>
      </div>
    </nav>
  </div>