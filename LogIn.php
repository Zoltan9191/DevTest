<?php
$name = htmlspecialchars($_POST["username"]);
$pass = htmlspecialchars($_POST["password"]);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WebDeveloperTest";

$conn = new mysqli($servername, $username, $password, $dbname);

//проверка логина и пароля в базе данных
$sqlUserExist = "SELECT username, password FROM userData WHERE username = '".$name."' and password = '".$pass."' ";
$userExist = mysqli_query($conn, $sqlUserExist);
$row=mysqli_fetch_array($userExist);
if($row[0]==$name && $row[1] == $pass) {
	echo "<center><H1>Hi ".$name.", You logged in <H1></center>";
}
else {
	echo "<center><H1> Wrong password or name <H1></center>";
}

?>