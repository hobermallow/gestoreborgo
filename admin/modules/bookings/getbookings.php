<!DOCTYPE html>
<?php include '../../../tools/utils.php'; ?>
<html>

<head>
  <meta charset="utf-8">
</head>

<body>
  <!-- <thead>
    <th>id_pren</th>
    <th>nome</th>
    <th>cognome</th>
    <th>da</th>
    <th>a</th>
    <th>n_adulti</th>
    <th>n_bambini</th>
    <th>prezzo_tot</th>
    <th>id_stanza</th>
    <th></th>
  </thead> -->
  <?php //prints the table's content in the DB
  $conn;
  try {
    $conn = connectToDB();
    $table = $_REQUEST['table'];
    $query = "select * from $table";

    if(isset($_REQUEST['cognome'])) {
      $cognome = $_REQUEST['cognome'];
      $query.=" where cognome='$cognome'";
    }
    $query.=";";
    $result = $conn->query("$query");
    $header = printTableHeader($conn, $table);
    echo "$header";

    echo "<tbody>";

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      echo "<tr>";
      foreach ($row as $key => $value) {
        echo "<td>$value</td>";
      }
      echo "<td><div class='checkbox-span'><input type='checkbox' form='deletebookings' name='prenotazioni[]' value=".$row['id_pren']."></div></td>";
      echo "</tr>";
    }
    echo "</tbody>";
  }
  catch(PDOException $e)  {
    echo "Connection failed: " . $e->getMessage();
  }
  finally {
    $conn = null;
  }
  ?>

</body>

</html>
