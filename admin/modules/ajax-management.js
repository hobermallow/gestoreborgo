function submitAjaxForm(method, form, callback) {
  var text = "";
  var i;
  for (i = 0; i < form.length ;i++) {
    if(form.elements[i].type == "checkbox" && form.elements[i].checked == true) {
      text += form.elements[i].name+ "=" +form.elements[i].value + "&";
    } else if(form.elements[i].name != "" && form.elements[i].type != "checkbox") {
      text += form.elements[i].name+ "=" +form.elements[i].value + "&";
    }
  }
  if(text == "") {return;}
  text = text.slice(0, text.length - 1);

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      callback.call();
    }
  };

  if(method == "POST") {
    xmlhttp.open("POST", form.action, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(text);
  } else {
    xmlhttp.open("GET", form.action + "?" + text, true);
    xmlhttp.send();
  }
}

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

    //define the callback function called upon xmlhttp request completion
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("tabella").innerHTML = xmlhttp.responseText;
      }
    };
    //set loading gif before sending request
    document.getElementById("tabella").innerHTML = '<div style="text-align: center;"><img src="loading.gif" height="32" width="32"></div>';
    //sets xmlhttp request to GET and sends it
    xmlhttp.open("GET", "modules/bookings/getbookings.php?table=" + str,true);
    xmlhttp.send();
  }
}

function getBookings(form) {
  submitAjaxForm("GET", form, function() {
      document.getElementById("tabella").innerHTML = xmlhttp.responseText;
  });

}

function deleteBookings(form) {
  submitAjaxForm("POST", form, function() {
    showTable(document.getElementById("selecttable").value);
  });
}
