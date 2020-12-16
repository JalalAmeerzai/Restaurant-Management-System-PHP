var passFlage = true;
var cpassFlage = true;
var nameFlage = true;
var emailFlage = true;
var phoneFlage = true;

//testing the password
function testPass() {
  document.getElementById("password");
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
  pass_btn();
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
  pass_btn();
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
  //to send to the server if javaScript is enabled or disabled
  document.getElementById("JSEnable").value = "true";

  var btn = document.getElementById("submit-btn");

  if (nameFlage && emailFlage && phoneFlage) {
    btn.disabled = false;
    btn.style.backgroundColor = "green";
  } else {
    btn.style.backgroundColor = "#a30000";
    btn.disabled = true;
  }
}

function pass_btn() {
  //to send to the server if javaScript is enabled or disabled
  document.getElementById("JSEnable").value = "true";
  var btn = document.getElementById("pass-btn");

  if (passFlage && cpassFlage) {
    btn.disabled = false;
    btn.style.backgroundColor = "green";
  } else {
    btn.style.backgroundColor = "#a30000";
    btn.disabled = true;
  }
}

function loding() {
  var btn = document.getElementById("submit-btn");
  btn.disabled = true;
}

function userPic(v) {
  if (v == 2) document.getElementById("profilePicDiv").style.display = "block";
  else document.getElementById("profilePicDiv").style.display = "none";
}
