<?php
include '../../../tools/utils.php';

//redirect if no $_POST is set
if(!isset($_POST['prenotazioni'])) {return;}
$conn;
try {
  $conn = connectToDB();
} catch(PDOException $e)  {
  die("Connection failed: " . $e->getMessage());
}

//Builds the delete query with the bookings' ids passed on $_POST
$querystr = "DELETE FROM prenotazione WHERE ";

$length = count($_POST['prenotazioni']);
foreach ($_POST['prenotazioni'] as $i => $id) {
  $querystr = $querystr."id_pren=$id";
  if($i != $length-1) { $querystr = $querystr.' or '; }
}
$query = $conn->prepare($querystr);//prepared query

//try to execute the query
try {
  $query->execute();
} catch (PDOException $e){
  die("Query failed: " . $e->getMessage());
} finally {
  $query = null;
  $conn = null;
}
?>
