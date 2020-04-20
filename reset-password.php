<?php
// Initialize session
session_start();

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: login.php");
  exit;
}

// Include config file
require_once("config.php");

// Define varianble and initialize with empty values
$new_password = $new_password_err = "";
$confirm_password = $confirm_password_err = "";

// Processing form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Validate new password
  if (empty(trim($_POST["new_password"]))) {
    $new_password_err = "Please enter new password";
  } elseif (strlen(trim($_POST["new_password"])) < 6) {
    $new_password_err = "Pasword must have at least 6 charecters.";
  } else {
    $new_password = trim($_POST["new_password"]);
  }

  // Validate confirm password
  if (empty(trim($_POST["confirm_password"]))) {
    $confirm_password_err = "Please confirm the password.";
  } else {
    $confirm_password = trim($_POST["confirm_password"]);
    if (empty($new_password_err) && ($new_password != $confirm_password)) {
      $confirm_password_err = "Password did not match.";
    }
  }

  // Check input errors before updating database
  if (empty($new_password_err) && empty($confirm_password_err)) {
    // Prepare an update statement
    $sql = "UPDATE user SET password = ? WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, 'si', $param_password, $param_id);

      // Set parameters
      $param_password = password_hash($new_password, PASSWORD_DEFAULT);
      $param_id = $_SESSION["id"];

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        // Password updated sucessfully. Destroy the session and redirect to login page
        session_destroy();
        header("location: login.php");
        exit();
      } else {
        echo "Oops! Something went wrong. Plese try again later";
      }

      // Close statement
      mysqli_close($stmt);
    }
  }

  // Close connection
  mysqli_close($link);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="css/main.css" />

  <title>Reset Password</title>
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
  </nav>

  <div class="wrapper" style="margin: 0 auto">
    <h2>Reset Password</h2>
    <p>Please fill out this form to reset pasword.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
        <label>New Password</label>
        <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
        <span class="help-block"><?php echo $new_password_err; ?></span>
      </div>
      <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
        <label>Confirm Password</label>
        <input type="password" name="confirm_password" class="form-control">
        <span class="help-block"><?php echo $confirm_password_err; ?></span>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Submit">
        <a class="btn btn-link" href="welcome.php">Cancel</a>
      </div>
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