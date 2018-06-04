<?php
include 'random_string.php';

function addNewUserToDb($dbh, $name, $surname, $login, $email, $password, $salt)
{
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
	try {
		$stmt = $dbh->prepare(
			"INSERT INTO `users` (login, firstname, lastname, email, password, salt)
			VALUES (?, ?, ?, ?, ?, ?)");
		$stmt->execute(["$login", "$name", "$surname", "$email", "$password",  "$salt"]);
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
	if (preg_match("^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$", $_POST['name'])
		return ("L'email est mal prototypé");
	if (preg_match("^[A-Z0-9._%+-]{10,}$", $_POST['password'])
		return ("Le mot de passe doit contenir au minimum 10 caractères.");
	if (isset($_POST['name'], $_POST['surname'], $_POST['login'], $_POST['email'], $_POST['password'])
	&& !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password']))
	{
		$salt = randomString();
		$ret = addNewUserToDb($dbh, $dbh->quote($_POST['name']), $dbh->quote($_POST['surname']),
				$dbh->quote($_POST['login']), $dbh->quote($_POST['email']), $dbh->quote($_POST['password']), $salt);
	}
	return ($ret);
}


?>
