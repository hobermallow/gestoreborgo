<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
</head>
<body>
  <?php
  public function printHeader($table)
  {
    echo "<thead>
    <th>
    id_pren
    </th>
    <th>
    nome
    </th>
    <th>
    cognome
    </th>
    <th>
    da
    </th>
    <th>
    a
    </th>
    <th>
    n_adulti
    </th>
    <th>
    n_bambini
    </th>
    <th>
    prezzo_tot
    </th>
    <th>
    id_stanza
    </th>
    <th></th>
    </thead>
    ";
  }
  $servername = "bunkerstate.ddns.net";
  $username = "guest";
  $password = "nukethewhales";
  $conn;
  try {
    $conn = new PDO("mysql:host=$servername;dbname=sitooriginale", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $table = $_REQUEST['table'];
    $result = $conn->query("SELECT * FROM $table;");

    echo "<tbody>";
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      echo "<tr>";
      foreach ($row as $key => $value) {
        echo "<td>$value</td>";
      }

      echo "<td><div class='checkbox-span'><input type='checkbox' form='form1' name='prenotazioni[]' value=".$row['id_pren']."></div></td>";
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
