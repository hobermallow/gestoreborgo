<?php
$servername = "bunkerstate.ddns.net";
$username = "guest";
$password = "nukethewhales";
try {
  $conn = new PDO("mysql:host=$servername;dbname=sitooriginale", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  die($e->getMessage());
}
?>
