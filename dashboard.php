<?php
// Initialize session
session_start();

// Check if user has already logged in, if not redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: login.php");
  exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="css/main.css" />
  <style>
    body {
      font: 14px sans-serif;
      text-align: center;
    }
  </style>
  <title>Dashboard -tea-coding-</title>
</head>

<body>
  <!--nav bar goes here-->
  <nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="welcome.php"><img src="img/tea.png" alt="tea-coding logo" width="50" height="50" class="d-inline-block align-bottom" />&nbsp; tea-coding</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#main-navigation" aria-controls="main-navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!--right menu-->
    <div class="collapse navbar-collapse" id="main-navigation">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-dark" href="welcome.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <!--contents, three column section-->
  <div class="container features mt-5">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12">
        <h3 class="feature-title">test</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nisi,
          possimus esse. Necessitatibus, qui molestiae id cum ipsa dicta quia
          eveniet alias magni aspernatur perferendis! Aspernatur, distinctio.
          Deserunt, ratione! Tenetur, natus?
        </p>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12">
        <h3 class="feature-title">test</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nisi,
          possimus esse. Necessitatibus, qui molestiae id cum ipsa dicta quia
          eveniet alias magni aspernatur perferendis! Aspernatur, distinctio.
          Deserunt, ratione! Tenetur, natus?
        </p>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12">
        <h3 class="feature-title">test</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nisi,
          possimus esse. Necessitatibus, qui molestiae id cum ipsa dicta quia
          eveniet alias magni aspernatur perferendis! Aspernatur, distinctio.
          Deserunt, ratione! Tenetur, natus?
        </p>
      </div>
    </div>
  </div>

  <!--footer-->
  <div class="container-fluid">
    <div class="page-footer">
      <div class="footer-copyright text-center">Created by Eyman</div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>