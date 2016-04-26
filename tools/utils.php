<?php
/**
* Function that connects to the DB 'sitooriginale'
* @return PDO object
* @throws PDOException upon connection failure
*/
function connectToDB() {
  $servername = "bunkerstate.ddns.net";
  $username = "guest";
  $password = "nukethewhales";
  $conn = new PDO("mysql:host=$servername;dbname=sitooriginale", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $conn;
}

function printTableHeader($conn, $table)
{
  $header = "<thead>";
  $fields = $conn->query("DESCRIBE $table");
  while ($field = $fields->fetchColumn()) {
    $header.="<th>".$field."</th>";
  }
  $header .= "</thead>";
  return $header;
}
?>
