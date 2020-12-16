var xmlHttp;
var itemID1;
var c = 0;
function additem(itemID) {
  xmlHttp = GetXmlHttpObject2();
  if (xmlHttp == null) {
    alert("Your browser does not support AJAX!");
    return;
  }
  itemID1 = itemID;
  itemArray = document.getElementById(itemID + "itemArray").value;
  itemQty = document.getElementById(itemID + "qty").value;
  c = itemQty;
  var url = "additem.php";
  url = url + "?input2=" + itemArray + "&qty=" + itemQty;
  url = url + "&sid=" + Math.random();
  xmlHttp.onreadystatechange = stateChanged2;
  xmlHttp.open("GET", url, true);
  xmlHttp.send(null);
}
function stateChanged2() {
  if (xmlHttp.readyState == 1) {
    document.getElementById(itemID1 + "btn").style.background = "lightblue";
    document.getElementById(itemID1 + "btn").innerHTML = "Proccssing..";
  }
  if (xmlHttp.readyState == 2) {
    document.getElementById(itemID1 + "btn").style.background = "blue";
    document.getElementById(itemID1 + "btn").innerHTML = "Proccssing..";
  }
  if (xmlHttp.readyState == 3) {
    document.getElementById(itemID1 + "btn").style.background = "darkblue";
    document.getElementById(itemID1 + "btn").innerHTML = "Proccssing..";
  }

  if (xmlHttp.readyState == 4) {
    xm = xmlHttp.responseText;

    if (xm == "done") {
      document.getElementById(itemID1 + "btn").style.background = "green";
      document.getElementById(itemID1 + "btn").innerHTML =
        c + " Added to your Cart";
    }
  }
}

function GetXmlHttpObject2() {
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
