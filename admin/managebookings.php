<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- bootstrap CSS,JS and JQuery-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <!--selectpicker-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
  <!--ajax file for management-->
  <script src="modules/ajax-management.js" charset="utf-8"></script>
  <!--custom CSS-->
  <style media="screen">
  body{background-color: #eee;}

  table {
    font-family:Arial, Helvetica, sans-serif;
    color:#666;
    font-size:12px;
    text-shadow: 1px 1px 0px #fff;
    background:#eaebec;
    border:#ccc 1px solid;
    border-collapse: separate;

    -moz-border-radius:5px;
    -webkit-border-radius:5px;
    border-radius:5px;

    -moz-box-shadow: 0 1px 2px #d1d1d1;
    -webkit-box-shadow: 0 1px 2px #d1d1d1;
    box-shadow: 0 1px 2px #d1d1d1;
  }

  tbody tr:nth-child(odd) { background-color: white;}

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

  tbody {
    height: 300px;
    overflow-y: auto;
  }

  tbody td, thead th {
    width: 10%;
    float: left;
  }
  </style>
</head>

<body>
  <div class="container">
    <table class="table table-hover" id="tabella">
      <script>showTable("prenotazione");</script>
    </table>

    <form method="POST" id="form1" action="modules/bookings/deletebooking.php"/></form>

    <button class="btn  btn-danger" type="submit" form="form1" >
      <span class="glyphicon glyphicon-trash">Cancella</span>
    </button>

    <select class="selectpicker" data-container="body" id="selecttable" name="tables" onchange="showTable(this.value)">
      <option value="prenotazione" selected>Prenotazioni</option>
      <option value="prezzo">Prezzi</option>
      <option value="stanza">Stanze</option>
    </select>

    <button class="btn btn-default" onclick='showTable(document.getElementById("selecttable").value)'>
      <span class="glyphicon glyphicon-refresh">Refresh</span>
    </button>
  </div>

</body>
</html>
