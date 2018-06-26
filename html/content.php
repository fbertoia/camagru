<div class="content" style="background-color:white">
<?php

	include 'db/db_settings.php';
	$ret = "ERROR";

	try {
		$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
	    echo 'Connexion échouée : ' . $e->getMessage();
	}

	$stmt = $dbh->prepare("SELECT * FROM `comments`");
	$stmt->execute([]);
	while ($row = $stmt->fetch(PDO::FETCH_OBJ))
	{
		echo "<div class=\"comment\">"."<div class=\"comment_itself\">".$row->comment."</div>"."<div class=\"login\">".$row->login."</div>"."</div>";
	}

?>


<form class="" action="db/comment.php" method="post">
	<input class="header--input" type="text" name="comment" placeholder="Ajouter un commentaire.">
	<button name="button">Envoyer le commentaire</button>
</form>
</div>
