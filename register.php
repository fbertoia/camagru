<?php
include 'db/db_settings.php';

function randomString($len = 10) {
	$char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charLen = strlen($char);
	$randStr = '';
	for ($i = 0; $i < $len; $i++){
		$randStr .= $char[rand(0, $charLen)];
	}
	return $randStr;
}

$dbh = new PDO("mysql:host=$servername", $username, $password);
if (isset($_POST['name'], $_POST['surname'], $_POST['login'], $_POST['email'], $_POST['password'])
&& !empty($_POST['name'])
&& !empty($_POST['surname'])
&& !empty($_POST['login'])
&& !empty($_POST['email'])
&& !empty($_POST['password']))
{
	$name = mysql_real_escape_string(htmlspecialchars(trim($_POST['name'])));
	$surname = mysql_real_escape_string(htmlspecialchars(trim($_POST['surname'])));
	$login = mysql_real_escape_string(htmlspecialchars(trim($_POST['login'])));
	$email = mysql_real_escape_string(htmlspecialchars(trim($_POST['email'])));
	$password = mysql_real_escape_string(htmlspecialchars(trim($_POST['password'])));
	$salt = randomString();
	addNewUser($name, $surname, $login, $email, $password, $salt);
} else {
	echo '<span class="modal--wrong-input">Veuillez completer tous les champs</span>';
}
?>
