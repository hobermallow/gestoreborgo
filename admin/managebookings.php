<!DOCTYPE html>
<?php //Check del login
include "../tools/connectToDB.php";
include "../login/login_func.php";
sec_session_start();
if(!login_check($conn)) {
  header("Location: ../login/login_page.php");
}
$conn=null;
?>
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
  <!-- Prevent Enter key clicking -->
  <script type="text/javascript">
  function stopRKey(evt) {
    var evt = (evt) ? evt : ((event) ? event : null);
    var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
    if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
  }

  document.onkeypress = stopRKey;
  </script>
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

    <form method="GET" id="deletebookings" action="modules/bookings/deletebooking.php"/></form>
    <button type="button" class="btn btn-danger" form="deletebookings" onclick="deleteBookings(this.form)">
      <span class="glyphicon glyphicon-trash">Cancella</span>
    </button>



    <form id="getbookingsWithFilter" action="modules/bookings/getbookings.php" method="GET"></form>

    <select class="selectpicker" data-container="body" id="selecttable" form="getbookingsWithFilter" name="table" onchange="getBookings(this.form)">
      <option value="prenotazione" selected>Prenotazioni</option>
      <option value="stanza">Stanze</option>
    </select>

    <button class="btn btn-default" onclick='showTable(document.getElementById("selecttable").value)'>
      <span class="glyphicon glyphicon-refresh">Refresh</span>
    </button>

<<<<<<< HEAD
    <a class="btn btn-default" href="../login/logout.php">Logout</a>
=======
    <input type="text" name="cognome" value="" form="getbookingsWithFilter"  placeholder="Cognome">
    <button type="button" class="btn btn-default" form="getbookingsWithFilter" onclick="getBookings(this.form)">
      <span class="glyphicon glyphicon-filter">Filtra</span>
    </button>
>>>>>>> 6359efc497ce28be6a01430ff7beb2e91547f171
  </div>

</body>

</html>
