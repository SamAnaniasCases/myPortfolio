<?php
$servername = "db.fr-pari1.bengt.wasmernet.com"; 
$username = "5cb8c5ec7359800003114b957f49";
$password = "06915cb8-c5ec-7503-8000-d3a1d912986b";     
$dbname = "project2_db"; 
$port = "10272";

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>