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
  <script>
  function showTable(str) {
    if (str == "") {
      document.getElementById("tabella").innerHTML = "";
      return;
    } else {
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          document.getElementById("tabella").innerHTML = xmlhttp.responseText;
        }
      };
      xmlhttp.open("GET","getbookings.php",true);
      xmlhttp.send();
    }
  }
  </script>
</head>
<body>
  <div class="container table-responsive">
    <table class="table table-bordered table-hover" id="tabella">
    </style>
  </head>
  <body>
    <!--TABLE-->
    <div class="container table-responsive">
      <table class="table table-bordered table-hover">
      </table>
    </div>
    <form class="" action="deleteBooking.php" method="post" id="form1">
      <input type="submit" >
      <select name="cars" onchange="showTable()">
        <option value="volvo">Volvo</option>
        <option value="saab">Saab</option>
        <option value="fiat">Fiat</option>
        <option value="audi">Audi</option>
      </select>
    </form>
  </body>
  </html>
