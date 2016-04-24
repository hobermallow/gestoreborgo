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
  <script src="script.js" charset="utf-8"></script>
</head>
<body>
  <div class="container table-responsive">
    <table class="table table-bordered table-hover" id="tabella">
      <script>showTable("prenotazione");</script>
    </table>
    <form  method="POST" id="form1" action="deleteBooking.php">
      <input type="submit" value="Delete">
      <select name="tables" onchange="showTable(this.value)">
        <option value="prenotazione">Prenotazioni</option>
        <option value="prezzo">Prezzi</option>
        <option value="stanza">Stanze</option>
      </select>
    </form>
  </body>
  </html>
