<?php

function confirmation_email($dbh, $email, $login) {
	$stmt = $dbh->prepare("SELECT * FROM `users` WHERE email = ? AND login = ?");
	$stmt->execute([$email, $login]);
	$row = $stmt->fetch(PDO::FETCH_OBJ);
	$content = "Bienvenu,\nVous avez fait le bon choix de vous connecter à Alpha Avocats. Pour compléter votre inscription, merci de cliquer sur le lien ci-dessous.

Au plaisir de vous voir parmi nous.
L'équipe Alpha Avocats.
		http://localhost:8080/main_page.php?login=$login&confirmation=$row->confirmation";
	$headers = 'From: frederic.bertoia@gmail.com' . "\r\n" .
	'Reply-To: frederic.bertoia@gmail.com' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();
	mail($email, "Confirmation de votre inscription sur Alpha Avocats", $content);
}

?>
