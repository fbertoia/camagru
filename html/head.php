<?php
header('X-XSS-Protection:0');
echo '
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="myCamagru">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="John Doe">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Pen+Script|Sacramento|Lato" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/ionicons.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/javascript" href="js/index.js">
	<link rel="stylesheet" type="text/javascript" href="js/waves.js">
</head>';
?>
