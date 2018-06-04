<?php
	$headers = 'From: frederic.bertoia@gmail.com' . "\r\n" .
    'Reply-To: frederic.bertoia@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
	mail("frederic.bertoia@gmail.com", "test", "test", $headers);

?>
