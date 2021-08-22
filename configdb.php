<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="educational_platform" ;  








// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);

  exit();
}
$conn->set_charset("utf8")
?>