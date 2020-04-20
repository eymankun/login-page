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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <!--nav bar goes here-->
  <nav class="navbar navbar-expand-md" style="position: sticky;">
    <a class="navbar-brand" href="welcome.php"><img src="img/tea.png" alt="tea" width="50" height="50" class="d-inline-block align-bottom" />&nbsp; tea-coding</a>
    <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!--right menu-->
    <div class="collapse navbar-collapse" id="main-navigation">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="welcome.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="page-header">
    <h1>Hi, <?php echo htmlspecialchars($_SESSION["username"]); ?>.<br>Welcome to tea-coding.</h1>
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
</body>

</html>