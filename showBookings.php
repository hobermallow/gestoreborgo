<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bookings</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<style media="screen">
table {
      width: 100%;
}

thead, tbody, tr, td, th { display: block; }

tr:after {
  content: ' ';
  display: block;
  visibility: hidden;
  clear: both;
}

thead th {
  height: 40px;

  text-align: left;
}
td {
  height: 38px;
}

tbody {
  height: 300px;
  overflow-y: auto;
}

thead {
  /* fallback */
}


tbody td, thead th {
  width: 10%;
  float: left;
}

</style>
  </head>
  <body>
    <!--TABLE-->
    <div class="container table-responsive">
    <table class="table table-bordered table-hover">
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
        <th>
        </th>
      </thead>
      <tbody>
    <?php
      $servername = "bunkerstate.ddns.net";
      $username = "guest";
      $password = "nukethewhales";
      $conn;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=sitooriginale", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $conn->query("SELECT * FROM prenotazione");
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          echo "<tr>";
          foreach ($row as $key => $value) {
            echo "<td>$value</td>";
          }

          echo "<td><div class='checkbox-span'><input type='checkbox' form='form1' name='prenotazioni[]' value=".$row['id_pren']."></div></td>";
          echo "</tr>";
        }
      }
      catch(PDOException $e)  {
        echo "Connection failed: " . $e->getMessage();
      }
      finally {
        $conn = null;
        $result = null;
      }
      ?>
    </tbody>
    </table>
  </div>
  <form class="" action="deleteBooking.php" method="post" id="form1">
    <input type="submit" >
  </form>
  </body>
</html>
