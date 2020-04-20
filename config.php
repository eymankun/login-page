<?php
//databases credential
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '!Pol11sla!');
define('DB_NAME', 'users');

/*Attempt to connect DB */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//check connection
if ($link === false) {
  die("ERROR: Could not connect. " . mysqli_connect_error());
}
