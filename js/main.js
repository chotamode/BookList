function validateLogin(event) {
    let uname = document.forms["log"]["uname"].value;
    let psw = document.forms["log"]["psw"].value;
    if (uname == "") {
      alert("Username must be filled out");
      return false;
    }
    if (psw == "") {
        alert("Password must be filled out");
        return false;
    }
  } 

function validateRegistration(event) {
    let uname = document.forms["reg"]["username"].value;
    let psw = document.forms["reg"]["email"].value;
    let birthday = document.forms["reg"]["birthday"].value;
    let password = document.forms["reg"]["password"].value;
    let passwordcheck = document.forms["reg"]["passwordcheck"].value;
    if (uname == "") {
      alert("Username must be filled out");
      return false;
    }
    if (psw == "") {
        alert("Password must be filled out");
        return false;
    }
    if (birthday == "") {
      alert("Birthday must be filled out");
      return false;
    }
    if (password == "") {
        alert("Password must be filled out");
        return false;
    }
    if (passwordcheck == "") {
        alert("Passwordcheck must be filled out");
        return false;
    }
} 

function message(message) {
    alert(message);
}

var login = document.getElementById('loginform');
if (login != null) { login.addEventListener('submit', validateLogin)}; 

var register = document.getElementById('registerform');
if (register != null) { register.addEventListener('submit', validateRegistration)}; 