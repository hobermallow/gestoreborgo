function showTable() {
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
      if (xmlhttp.readyState == 3 && xmlhttp.status == 200) {
        document.getElementById("tabella").innerHTML = '<div class="container"><h3>Animated button</h3><button class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Loading...</button></div>';
      }
    };
    xmlhttp.open("GET","getbookings.php",true);
    xmlhttp.send();
  }
}
