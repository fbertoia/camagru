<?php


function checkConfirmationEmail($confirmation, $login) {
	try {
		include 'db_settings.php';
		$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $dbh->prepare("SELECT login, confirmation, id FROM `users`
			WHERE login = ?
			AND confirmation = ?");
		$stmt->execute([$login, $confirmation]);
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		if (is_object($row))
		{
			$stmt = $dbh->prepare("UPDATE `users` SET confirmation='TRUE'
				WHERE id = ?");
			$stmt->execute([$row->id]);
			$_SESSION['logged'] = TRUE;
			$_SESSION['login'] = $login;
		}
	} catch (PDOException $e) {
		echo 'Connexion échouée : ' . $e->getMessage();
	}
}


?>
