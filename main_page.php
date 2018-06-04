<?php
function redirect($url){
	if (headers_sent()){
	  die('<script type="text/javascript">window.location=\''.$url.'\';</script‌​>');
	} else {
	  header('Location: ' . $url);
	  die();
	}
}

if (!session_start() || !isset($_SESSION)
	|| !isset($_SESSION['logged']) || $_SESSION['logged'] !== true)
{
	redirect("http://localhost:8080/");
}
echo '<html>';
include 'html/head.php';

echo '<body>';

include 'html/header.php';
include 'html/content.php';
include 'html/profil-settings.php';
include 'html/footer.php';

echo '</body>
</html>';
?>
