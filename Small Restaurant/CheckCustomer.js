var xmlHttp;

function check_Customer(username) {
  xmlHttp = GetXmlHttpObject4();
  if (xmlHttp == null) {
    alert("Your browser does not support AJAX!");
    return;
  }
  if (username.length == 0)
    document.getElementById("FormMassage1").innerHTML = "";
  else {
    var url = "check_customer_inDB.php";
    url = url + "?q=" + username;
    url = url + "&sid=" + Math.random(); //another way to prevent caching
    xmlHttp.onreadystatechange = stateChanged4; //function call
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
  }
}
function stateChanged4() {
  if (xmlHttp.readyState == 4) {
    if (xmlHttp.responseText.length < 1)
      document.getElementById("FormMassage1").innerHTML = "Not exist";
    else
      document.getElementById("FormMassage1").innerHTML = xmlHttp.responseText;
  }
}

function GetXmlHttpObject4() {
  var xmlHttp = null;
  try {
    // Firefox, Opera 8.0+, Safari
    xmlHttp = new XMLHttpRequest();
  } catch (e) {
    // Internet Explorer
    try {
      xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
      xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
  return xmlHttp;
}
