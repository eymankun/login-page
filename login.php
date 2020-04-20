<?php
// Initialize session
session_start();

// Check user if already logged in, if yes then redirect user to Welcome page.
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: welcome.php");
  exit;
}

// Include config file
require_once("config.php");

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if username is empty
  if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter username.";
  } else {
    $username = trim($_POST["username"]);
  }

  // Check if password is empty
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter password.";
  } else {
    $password = trim($_POST["password"]);
  }

  // Validate credentials
  if (empty($username_err) && empty($password_err)) {
    // Prepare a SELECT statement
    $sql = "SELECT id, username,password FROM user WHERE username = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_username);

      // Set parameters
      $param_username = $username;

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        // Store result
        mysqli_stmt_store_result($stmt);

        // Check if username exist, if yes and then verify
        if (mysqli_stmt_num_rows($stmt) == 1) {
          // Bind result variables
          mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
          if (mysqli_stmt_fetch($stmt)) {
            if (password_verify($password, $hashed_password)) {
              // If password correct, start new session
              session_start();

              // Store data in session variables
              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["username"] = $username;

              // Redirect to welcome page
              header("location: welcome.php");
            } else {
              // Display error message if password not valid
              $password_err = "The password you entered is not valid.";
            }
          }
        } else {
          // Display an error message if username doesn't exist
          $username_err = "No account found with that username.";
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }
  // Close session
  mysqli_close($link);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="css/main.css" />
  <style type="text/css">
    body {
      font: 14px sans-serif;
    }

    .wrapper {
      width: 350px;
      padding: 20px;
    }
  </style>
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
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="wrapper" style="margin: 0 auto">
    <h2>Login</h2>
    <p>Please fill in you credential.</p>
    <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
        <label>Username</label>
        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
        <span class="help-block" style="color: red;"><?php echo $username_err; ?></span>

        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
          <label>Password</label>
          <input type="password" name="password" class="form-control">
          <span class="help-block" style="color: red;"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Login">
        </div>
        <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
    </form>
  </div>
  <!--footer-->
  <div class="container-fluid">
    <div class="page-footer">
      <div class="footer-copyright text-center">Created by Eyman</div>
    </div>
  </div>
</body>

</html>