<?php

if (!session_start())
	die();

/*To add user : add_user */
/*To connect  : connect  */

	include 'db_settings.php';
	include 'add_new_user.php';
	include 'db_login.php';
	$ret = "ERROR";

	try {
		$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
	    echo 'Connexion échouée : ' . $e->getMessage();
	}
	if ($_POST['request'] === "add_user")
		$ret = addNewUser($dbh);
	else if ($_POST['request'] === "login")
		$ret = login($dbh);
	echo $ret;


?>
