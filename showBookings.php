<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ciao</title>
  </head>
  <body>
    <table border="2">
      <thead>
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
      </thead>
      <tbody>
    <?php
      $servername = "192.168.0.103";
      $username = "guest";
      $password = "nukethewhales";
      $conn;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=sitooriginale", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // $select_all = $conn->prepare("SELECT * FROM prenotazione;");
        // $select_all->execute();
        // $result = $select_all->setFetchMode(PDO::FETCH_ASSOC);
        $result = $conn->query("SELECT * FROM prenotazione");
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          echo "<tr>";
          foreach ($row as $key => $value) {
            echo "<td>$value</td>";
          }
          echo "</tr>";
        }
      }
      catch(PDOException $e)  {
        echo "Connection failed: " . $e->getMessage();
      }
      finally {
        $conn = null;
      }
      ?>
    </tbody>
    </table>
  </body>
</html>
