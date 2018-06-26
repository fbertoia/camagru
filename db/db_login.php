<?php

function login($dbh) {
	//check les valeurs d'input

	if (isset($_POST['login'], $_POST['password'])
		&& !empty($_POST['login']) && !empty($_POST['password']))
	{
		$login = "\"".$_POST['login']."\"";
		// print($login);
		$con = mysqli_connect(SERVER_NAME,USER,PASSWORD,DB_NAME);
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$res = $con->query("SELECT login, salt FROM `users` WHERE login = $login");
		if (!empty($res))
		{
			foreach ($res as $row)
			{
				if (!empty($row))
				{
					$check_password = hash("sha256", $_POST['password'] . $row['salt']);
					$check_password = "\"".$check_password."\"";
					$res2 = $con->query("SELECT login FROM `users`
						WHERE password = $check_password AND login = $login");
					if (empty($res2))
						return ("\"".$_POST['login']."\""." n'existe pas ou n'a pas le bon mot de passe");
					foreach ($res2 as $row)
					{
						foreach ($row as $row2)
						{
							if (!empty($row2))
							{
								$_SESSION['logged'] = TRUE;
								$_SESSION['login'] = $_POST['login'];
								print($_POST['login']);
								return ("");
							}
							else
							return ("\"".$_POST['login']."\""." n'existe pas ou n'a pas le bon mot de passe");
						}
					}
				}
				else
					return ($_POST['login']." n'existe pas ou n'a pas le bon mot de passe");
			}
		}
		else
			return ($_POST['login']." n'existe pas ou n'a pas le bon mot de passe");
	}
	// return ("Le login/mot de passe ne convient pas.");
	//check si login possible
	//set le cookie de log
	//
	// SQL injection yes" OR '1'='1'"
}

?>
