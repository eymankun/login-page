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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="css/main.css" />
  <style>
    body {
      font: 14px sans-serif;
      text-align: center;
    }
  </style>
  <title>Welcome</title>
</head>

<body>
  <nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="welcome.php"><img src="img/tea.png" alt="tea-coding logo" width="50" height="50" class="d-inline-block align-bottom" />&nbsp; tea-coding</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#main-navigation" aria-controls="main-navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!--right menu-->
    <div class="collapse navbar-collapse" id="main-navigation">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="welcome.php" style="color:black">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php" style="color: black">Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <!--page header-->
  <div class="page-header mt-3">
    <h1>Hi, <?php echo htmlspecialchars($_SESSION["username"]); ?>.<br>Welcome to <br> tea-coding.</h1>
  </div>
  <p><a href="dashboard.php" class="btn btn-primary">Dashboard</a></p>
  <p><a href="reset-password.php" class="btn btn-warning"> Reset your password</a></p>
  <p><a href="logout.php" class="btn btn-danger">Sign out</a></p>


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