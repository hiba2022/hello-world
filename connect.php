<?php
$servername = "localhost";
$username = "wdpb5";
$password = "wdpb5";
$dbname = 'wdpl1b5';
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
/* echo "Connected successfully"; */