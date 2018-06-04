<?php
if (!session_start())
	die();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="myCamagru">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="John Doe">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Pen+Script|Sacramento" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/ionicons.min.css">
	<link rel="stylesheet" type="text/javascript" href="js/index.js">
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|PT+Sans|Raleway" rel="stylesheet">
</head>
<body>
	<div class="backdrop"></div>
	<div class="modal-display">
		<form class="modal-display-box modal-connect" action="#" method="post">
			<div class="modal-group ">
			    <input type="text" class="login-connect" class="name-connect" required="required"/>
			    <label for="login">Identifiant</label>
            </div>
            <div class="modal-group">
			    <input type="password" class="password-connect" required="required"/>
			    <label for="password">Mot de Passe</label>
            </div>
			<div class="modal--wrong-input"></div>
            <button name="button">Se connecter</button>
		</form>
		<form class="modal-display-box modal-register" action="#" target="_blank" method="post">
				<div class="modal-group">
				    <input type="text" class="name-register" required="required" value="yes"/>
				    <label for="login">Nom</label>
	            </div>
	            <div class="modal-group">
				    <input type="text" class="surname-register" required="required" value="yes"/>
				    <label for="password">Prenom</label>
	            </div>
				<div class="modal-group">
					<input type="text" class="login-register" required="required" value="yes"/>
					<label for="password">Identifiant</label>
				</div>
	            <div class="modal-group">
	                <input type="text" class="email-register" required="required" value="frederic.bertoia@gmail.com"/>
	                <label for="password">Email</label>
	            </div>
	            <div class="modal-group">
				    <input type="password" class="password-register" required="required" value="0000000000"/>
				    <label for="password">Mot de passe</label>
	            </div>
	            <div class="modal-group">
				    <input type="password" class="password2-register" required="required" value="0000000000"/>
				    <label for="password">Mot de passe (verification)</label>
	            </div>
	            <div class="modal--wrong-input"></div>
	            <button type="submit" value="OK" name="button" class="modal--log-in">S'inscrire</button>
		</form>
	</div>
	<div class="body-grid">
		<div id="particles-js" class="header-particles"></div>
	    <div class="header" >
	        <div class="header--logo-gather">
	            <img src="img/icon_avocat.svg" class="header--logo-img" >
	            <div class="header--logo">Alpha|Avocat</div>
			</div>
	        <h1>Rejoignez la nouvelle communauté <br>des avocats entrepreneurs</h1>
	        <p>Connectez-vous à AvocatCampus pour trouver l'avocat <br> qui répondrera à vos besoins.</p>
	        <div class="header-buttons">
	            <section class="portfolio-experiment log-in">
	                <a>
	                    <span class="text"> S'inscrire </span>
	                    <span class="line -right"></span>
	                    <span class="line -top"></span>
	                    <span class="line -left"></span>
	                    <span class="line -bottom"></span>
	                </a>
	            </section>
	            <section class="portfolio-experiment sign-in">
	                <a>
	                    <span class="text">Se connecter</span>
	                    <span class="line -right"></span>
	                    <span class="line -top"></span>
	                    <span class="line -left"></span>
	                    <span class="line -bottom"></span>
	                </a>
	            </section>
	        </div>
		</div>
	    <script src="js/particles.js"></script>
	    <div class="img-front">
	    </div>
	    <div class="footer">
	    </div>
		<script src="js/app.js"></script>
	</div>
	<script src="js/index.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/typer.js"></script>
	<script src="js/script.js"></script>
</body>
</html>
