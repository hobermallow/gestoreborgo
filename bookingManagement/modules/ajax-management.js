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
    document.getElementById("tabella").innerHTML = '<div style="text-align: center;"><img src="loading.gif" height="32" width="32"></div>';
    xmlhttp.open("GET", "modules/gettables.php?table=" + str,true);
    xmlhttp.send();
  }
}
