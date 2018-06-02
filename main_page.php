<?php
if (!session_start())
	exit();
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
