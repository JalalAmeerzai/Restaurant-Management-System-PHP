var xmlHttp;

function search1(userInput) {
  if (userInput.length <= 0) {
    document.getElementById("L1").style.display = "none";
    document.getElementById("L2").style.display = "none";
    document.getElementById("L3").style.display = "none";
    document.getElementById("L4").style.display = "none";
    document.getElementById("L5").style.display = "none";
  } else {
    document.getElementById("L1").style.display = "inline";
    document.getElementById("L2").style.display = "inline";
    document.getElementById("L3").style.display = "inline";
    document.getElementById("L4").style.display = "inline";
    document.getElementById("L5").style.display = "inline";
  }
  xmlHttp = GetXmlHttpObject1();
  if (xmlHttp == null) {
    alert("Your browser does not support AJAX!");
    return;
  }
  if (userInput.length > 0) {
    var url = "searchMenu.php";
    url = url + "?input=" + userInput;
    url = url + "&sid=" + Math.random();
    xmlHttp.onreadystatechange = stateChanged1;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
  }
}
function stateChanged1() {
  if (xmlHttp.readyState == 4) {
    xm = xmlHttp.responseText;
    Respond = xm.split("|");
    count = 1;
    for (i = 0; i < Respond.length; i++) {
      items = Respond[i].split("#");
      e = "L" + count;
      if (count <= 5) count++;
      document.getElementById(e).value = items[1];
      document.getElementById(e).innerHTML = items[0];
    }
  }
}

function GetXmlHttpObject1() {
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

function searchScroll() {
  loding();
  window.$_GET = location.search
    .substr(1)
    .split("&")
    .reduce(
      (o, i) => (
        (u = decodeURIComponent),
        ([k, v] = i.split("=")),
        (o[u(k)] = v && u(v)),
        o
      ),
      {}
    );

  var c = $_GET.searchResult;
  document.getElementById(c).scrollIntoView(false);
  document.getElementById(c).style.backgroundColor = "green";
  document.getElementById(c).style.color = "green";
}
function loding() {
  document.getElementById("L1").style.display = "none";
  document.getElementById("L2").style.display = "none";
  document.getElementById("L3").style.display = "none";
  document.getElementById("L4").style.display = "none";
  document.getElementById("L5").style.display = "none";
}
