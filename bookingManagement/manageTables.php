<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Bookings</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <head>
  <style media="screen">
  table {
    width: 100%;
  }

  table {
  	font-family:Arial, Helvetica, sans-serif;
  	color:#666;
  	font-size:12px;
  	text-shadow: 1px 1px 0px #fff;
  	background:#eaebec;
  	border:#ccc 1px solid;

  	-moz-border-radius:3px;
  	-webkit-border-radius:3px;
  	border-radius:3px;

  	-moz-box-shadow: 0 1px 2px #d1d1d1;
  	-webkit-box-shadow: 0 1px 2px #d1d1d1;
  	box-shadow: 0 1px 2px #d1d1d1;
  }

  tbody tr:nth-child(odd) {
     background-color: white;
  }

  table th {
  	padding:21px 25px 22px 25px;
  	border-top:1px solid #fafafa;
  	border-bottom:1px solid #e0e0e0;

  	background: #ededed;
  	background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#ebebeb));
  	background: -moz-linear-gradient(top,  #ededed,  #ebebeb);
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
  <script src="modules/ajax-management.js" charset="utf-8"></script>
</head>
<body>
  <div class="container table-responsive">
    <table class="table table-hover" id="tabella">
      <script>showTable("prenotazione");</script>
    </table>

    <form  method="POST" id="form1" action="modules/deletebooking.php"/>
    </form>

    <input type="submit" form="form1" value="Delete">

    <select id="selecttable" name="tables" onchange="showTable(this.value)">
      <option value="prenotazione" selected>Prenotazioni</option>
      <option value="prezzo">Prezzi</option>
      <option value="stanza">Stanze</option>
    </select>

    <button onclick='showTable(document.getElementById("selecttable").value)'>Refresh</button>

  </div>
</body>
</html>
