<?php

function login($dbh) {
	//check les valeurs d'input
	if (isset($_POST['login'], $_POST['password'])
		&& !empty($_POST['login']) && !empty($_POST['password']))
	{
		$stmt = $dbh->prepare("SELECT login, password, salt FROM `users`
			WHERE login = ?");
		$stmt->execute([$_POST['login']]);
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		if (empty($row))
			return ("Le login/mot de passe ne convient pas.");
		$check_password = hash("sha256", $_POST['password'] . $row->salt);
		if ($row->password === $check_password)
		{
			$_SESSION['logged'] = TRUE;
			$_SESSION['login'] = $login;
			return ("SUCCESS");
		}
	}
	return ("Le login/mot de passe ne convient pas.");
	//check si login possible
	//set le cookie de log
	//
}

?>
