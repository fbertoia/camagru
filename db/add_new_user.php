<?php

include 'confirmation_email.php';

function randomString($len = 10) {
	$randStr = "";
	$char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charLen = strlen($char);
	$randStr = '';
	for ($i = 0 ; $i < $len; $i++){
		$randStr .= $char[rand(0, $charLen - 1)];
	}
	return $randStr;
}

function addNewUserToDb($dbh, $name, $surname, $login, $email, $password, $salt)
{
	// printf("name = ". $name . "  ". 'login = '. $login);
	$stmt = $dbh->prepare("SELECT * FROM `users` WHERE `email` = ? OR `login` = ?");
	$stmt->execute(["$email", "$login"]);
	while ($row = $stmt->fetch(PDO::FETCH_OBJ))
	{
		if ($row->email === $email)
			return ("Email deja pris");
		if ($row->login === $login)
			return ("Identifiant deja pris");
	}
	$password = hash("sha256", $password . $salt);
	$confirmation = randomString();
	try {
		$stmt = $dbh->prepare(
			"INSERT INTO `users` (login, firstname, lastname, email, password, salt, confirmation)
			VALUES (?, ?, ?, ?, ?, ?, ?)");
		$stmt->execute([$login, $name, $surname, $email, $password,  $salt, $confirmation]);
		confirmation_email($dbh, $email, $login);
		$ret = "Un mail vous a été envoyé pour confirmation de votre compte.";
		return ("SUCCESS");
	}
	catch(Exception $e) {
		echo 'Exception -> ';
		var_dump($e->getMessage());
		return ("ERROR SQL");
	}
}

function addNewUser($dbh)
{
	if (preg_match("/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/", $_POST['email']) === FALSE)
		$ret = "L'email est mal prototypé...";
	else if (preg_match("/^[A-Z0-9._%+-]{10,}$/", $_POST['password']) === FALSE)
		$ret = "Le mot de passe doit contenir au minimum 10 caractères.";
	else if (isset($_POST['name'], $_POST['surname'], $_POST['login'], $_POST['email'], $_POST['password'])
	&& !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password']))
	{
		$salt = randomString();
		$ret = addNewUserToDb($dbh, $_POST['name'], $_POST['surname'],
				$_POST['login'], $_POST['email'], $_POST['password'], $salt);
	}
	return ($ret);
}


?>
