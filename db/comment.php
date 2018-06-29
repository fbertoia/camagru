<?php
header('X-XSS-Protection:0');
if (!session_start())
	die();

include 'db_settings.php';

try {
	$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo 'Connexion échouée : ' . $e->getMessage();
}
echo $_POST['comment'];
$login = $_SESSION['login'];
$comment = $_POST['comment'];
try {
	$stmt = $dbh->prepare(
		"INSERT INTO `comments` (login, comment) VALUES (?, ?)");
	$stmt->execute([$login, $comment]);
}
catch(Exception $e) {
	echo 'Exception -> ';
	var_dump($e->getMessage());
	return ("ERROR SQL");
}
header("Location: ../main_page.php");
?>

<html>
	<head>
	</head>
	<body>
		<form action="/main_page.php" method="get">
	</body>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script>
	// window.location = "/main_page.php";
	// $(document).ready(function() {
	// 	var form = $('form');
	// 	form.submit();
	// });
</script>
</html>