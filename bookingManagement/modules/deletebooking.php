<?php

$servername = "bunkerstate.ddns.net";
$username = "guest";
$password = "nukethewhales";
$conn;
try {
  $conn = new PDO("mysql:host=$servername;dbname=sitooriginale", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e)  {
  die("Connection failed: " . $e->getMessage());
}

$querystr = "DELETE FROM prenotazione WHERE ";

$length = count($_POST['prenotazioni']);
foreach ($_POST['prenotazioni'] as $i => $id) {
  $querystr = $querystr."id_pren=$id";
  if($i != $length-1) { $querystr = $querystr.' or '; }
}
$query = $conn->prepare($querystr);
try {
  $query->execute();
  header('Location: ' . $_SERVER['HTTP_REFERER']);//TODO modifica redirect
} catch (PDOException $e){
  die("Query failed: " . $e->getMessage());
} finally {
  $query = null;
  $conn = null;
}
?>
