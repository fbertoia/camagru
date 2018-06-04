<?php
include 'db/check_confirmation_email.php';
function redirect($url){
	if (headers_sent()){
	  die('<script type="text/javascript">window.location=\''.$url.'\';</script‌​>');
	} else {
	  header('Location: ' . $url);
	  die();
	}
	print_r($_SESSION);
}

if (session_start() === FALSE)
	redirect("http://localhost:8080/");
if (isset($_GET) && isset($_GET['confirmation']) && isset($_GET['login']))
	checkConfirmationEmail($_GET['confirmation'], $_GET['login']);
if (!isset($_SESSION) || !isset($_SESSION['logged'])
	|| $_SESSION['logged'] !== TRUE)
{
	redirect("http://localhost:8080/");
}
print_r($_SESSION);

?>
