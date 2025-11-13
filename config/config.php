<?php
$servername = "db.fr-pari1.bengt.wasmernet.com"; 
$username = "5beec03174518000c33f2c0be1f0";
$password = "06915bee-c031-75d4-8000-5230ac4e65aa";     
$dbname = "project_db"; 
$port = "10272";

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>