var urnFlage = false;
var passFlage = false;
var cpassFlage = false;
var nameFlage = false;
var emailFlage = false;
var phoneFlage = false;

// testing the username
function testUserName() {
  //to send to the server if javaScript is enabled or disabled
  document.getElementById("JSEnable").value = "true";

  userNameValue = document.getElementById("username").value;
  userNameObject = document.getElementById("username");

  var ck_name = /^[A-Za-z0-9_.-]{4,20}$/;
  if (!ck_name.test(userNameValue)) {
    userNameObject.style.backgroundColor = "#ffc2b3";
    userNameObject.style.borderColor = "red";
    userNameObject.style.color = "red";
    this.urnFlage = false;
  } else {
    userNameObject.style.backgroundColor = "white";
    userNameObject.style.borderColor = "green";
    userNameObject.style.color = "green";
    this.urnFlage = true;
    check_user(userNameValue);
  }
  submit_btn();
}
//testing the password
function testPass() {
  document.getElementById("password").onkeyup;
  if (document.getElementById("confpassword").value != null) testConfPass();
  passObject = document.getElementById("password");
  passValue = passObject.value;

  var ck_password = /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;
  if (!ck_password.test(passValue)) {
    passObject.style.backgroundColor = "#ffc2b3";
    passObject.style.borderColor = "red";
    passObject.style.color = "red";
    passFlage = false;
  } else {
    passObject.style.backgroundColor = "white";
    passObject.style.borderColor = "green";
    passObject.style.color = "green";
    this.passFlage = true;
  }
  submit_btn();
}
// testing the cinfrm password
function testConfPass() {
  password = document.getElementById("password").value;
  confpass = document.getElementById("confpassword").value;

  if (password != confpass) {
    document.getElementById("confpassword").style.backgroundColor = "#ffc2b3";
    document.getElementById("confpassword").style.borderColor = "red";
    document.getElementById("confpassword").style.color = "red";
    this.cpassFlage = false;
  } else {
    document.getElementById("confpassword").style.backgroundColor = "white";
    document.getElementById("confpassword").style.borderColor = "green";
    document.getElementById("confpassword").style.color = "green";
    this.cpassFlage = true;
  }
  submit_btn();
}

//testing the Email
function testEmail() {
  emailOBject = document.getElementById("email");
  emailValue = emailOBject.value;

  var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

  if (!ck_email.test(emailValue)) {
    emailOBject.style.backgroundColor = "#ffc2b3";
    emailOBject.style.borderColor = "red";
    emailOBject.style.color = "red";
    this.emailFlage = false;
  } else {
    emailOBject.style.backgroundColor = "white";
    emailOBject.style.borderColor = "green";
    emailOBject.style.color = "green";
    this.emailFlage = true;
  }
  submit_btn();
}
//testong the name
function testName() {
  nameObject = document.getElementById("name");
  nameValue = nameObject.value;
  var ck_name = /^[A-Za-z0-9 ]{3,20}$/;
  if (!ck_name.test(nameValue)) {
    nameObject.style.backgroundColor = "#ffc2b3";
    nameObject.style.borderColor = "red";
    nameObject.style.color = "red";
    this.nameFlage = false;
  } else {
    nameObject.style.backgroundColor = "white";
    nameObject.style.borderColor = "green";
    nameObject.style.color = "green";
    this.nameFlage = true;
  }
  submit_btn();
}
//testing the phone number
function testPhone() {
  phoneObject = document.getElementById("phone");
  phoneValue = phoneObject.value;
  var ck_phone = /^[0-9]{6,10}$/;
  if (!ck_phone.test(phoneValue)) {
    phoneObject.style.backgroundColor = "#ffc2b3";
    phoneObject.style.borderColor = "red";
    phoneObject.style.color = "red";
    this.phoneFlage = false;
  } else {
    phoneObject.style.backgroundColor = "white";
    phoneObject.style.borderColor = "green";
    phoneObject.style.color = "green";
    this.phoneFlage = true;
  }
  submit_btn();
}

//disable  submit button if not satisfy conditions above
function submit_btn() {
  var btn = document.getElementById("submit-btn");

  if (
    urnFlage &&
    passFlage &&
    cpassFlage &&
    nameFlage &&
    emailFlage &&
    phoneFlage
  ) {
    btn.disabled = false;
    btn.style.backgroundColor = "green";
  } else {
    btn.style.backgroundColor = "#a30000";
    btn.disabled = true;
  }
}

var xmlHttp;

function check_user(username) {
  xmlHttp = GetXmlHttpObject3();
  if (xmlHttp == null) {
    alert("Your browser does not support AJAX!");
    return;
  }

  var url = "check_user_inDB.php";
  url = url + "?q=" + username;
  url = url + "&sid=" + Math.random(); //another way to prevent caching
  xmlHttp.onreadystatechange = stateChanged3; //function call
  xmlHttp.open("GET", url, true);
  xmlHttp.send(null);
}
function stateChanged3() {
  if (xmlHttp.readyState == 4) {
    if (xmlHttp.responseText == "taken") {
      document.getElementById("FormMassage").innerHTML =
        "This userName already taken";
      urnFlage = false;
      submit_btn();
      document.getElementById("username").style.backgroundColor = "#ffc2b3";
    } else {
      document.getElementById("FormMassage").innerHTML = "";
      this.urnFlage = true;
      submit_btn();
    }
  }
}

function GetXmlHttpObject3() {
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
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
function show() {
  document.getElementById("myModal").style.display = "block";
}

// When the user clicks on <span> (x), close the modal
function hide() {
  document.getElementById("myModal").style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};
