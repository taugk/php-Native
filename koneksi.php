<?php
$servername = "localhost";
$db = "db_beasiswa";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>