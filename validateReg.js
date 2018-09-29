function Validate() {
  var name = document.getElementById("name");
  var pass = document.getElementById("pass");
  var passAgain = document.getElementById("passAgain");
  var email = document.getElementById("email");
  var reInjectValidate = "[a-zA-Z\-'\s\d]+";
  var NoInject = new RegExp(reInjectValidate);

  //проверка на пустое имя
  if (name.value=="") {
	alert("Username empty");
	name.focus();
	return false;
  }
  //проверка на пустой пароль и его длинну
  if (pass.value=="" || pass.value.length<='3') {
	alert ("Password must be longer");
    pass.focus();
	return false;
  }
  //проверка на совпадение паролей
  if (pass.value!=passAgain.value) {
	alert("Passwords do not match");
	passAgain.focus();
	return false;
  }
   //проверка на спец символы
  if ( !(NoInject.test(name.value)) || !(NoInject.test(pass.value)) || !(NoInject.test(passAgain.value)) || !(NoInject.test(email.value)) ) {
	alert("Special characters not allowed");
	return false;
  }
  return true;
}
document.getElementById("validate").onclick = Validate;