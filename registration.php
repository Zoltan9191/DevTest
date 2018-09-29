<?php
$name = htmlspecialchars($_POST["username"]);
$pass = htmlspecialchars($_POST["password"]);

echo "<center>" . $name . "<br>" . $pass . "<br> </center>" ;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WebDeveloperTest";

echo " <center> <p> <a href=\"main.html\">Back to main page</a> </p> </center> ";

$conn = new mysqli($servername, $username, $password, $dbname);
// Проверяем соеденение
if ($conn->connect_error) {
    die("<center> Connection failed: " . $conn->connect_error . "</center");
}
if (isset($name)) {
	$sqlUserExist = "SELECT username FROM userData WHERE username = '" .$name. "'";
	$userExist = mysqli_query($conn, $sqlUserExist);
	//проверка на занятость имени
	if(mysqli_num_rows($userExist)>1) {
		$error[] = 'Username already in use';
	}
}
//проверка длинны пароля
if(strlen($_POST['password']) < 3) {
	$error[] = 'Password must be more than 3 symbol';
}
//вывод ошибок
if(isset($error)){
	echo "<center>";
	foreach($error as $error) {
		echo '<p>'.$error.'</p>';
	}
	echo "</center>";
}
//Успех регистрации
if(!isset($error)){
	try {
		$sql = "INSERT INTO userData (username, password)
		VALUES ('" . $name . "', '" . $pass . "')";

		if ($conn->query($sql) === TRUE) {
			echo "<center> <H3> Registration complete  <a href=\"LogIn.html\">LogIn</a> </H3> </center>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}
}		 
?>


