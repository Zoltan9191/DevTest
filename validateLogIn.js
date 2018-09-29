function Validate() {
  var name = document.getElementById("name");
  var pass = document.getElementById("pass");
  var passAgain = document.getElementById("passAgain");
  var email = document.getElementById("email");
  var reInjectValidate = "[a-zA-Z\-'\s\d]+";
  var NoInject = new RegExp(reInjectValidate);

  //�������� �� ������ ���
  if (name.value=="") {
	alert("Username empty");
	name.focus();
	return false;
  }
  //�������� �� ������� ������ � ��� ������
  if (pass.value=="" || pass.value.length<='3') {
	alert ("Password must be longer");
    pass.focus();
	return false;
  }
  //�������� �� ���� �������
  if ( !(NoInject.test(name.value)) || !(NoInject.test(pass.value))) {
	alert("Special characters not allowed");
	return false;
  }
  return true;
}
document.getElementById("validate").onclick = Validate;