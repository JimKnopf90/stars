<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="../css/password.css">
		<link rel="icon" href="../image/icon.jpg">
		<script type="text/javascript">
		
		</script>
		<title>Passwort vergessen</title>
	</head>
	<body>
	<div id="header-bg">
			<a href="mainpage.php"><img id="header-logo" src="../image/verpacking-logo.png" /></a>
				<div id="menu">
					<ul>
						<li><a href="mainpage.php">Startseite</a></li>
						<li><a href="products.php">Produkte</a></li>
						<li><a href="statistik.php">Statistik</a></li>
					</ul>
				</div>
            <div id="buttons">
                <a href="login.php"><img title="Ausloggen" class="mini-button" name="Logout" alt="logout" src="../image/logoutbutton.png" /></a>
                <a href="help.php"><img title="Hilfe" class="mini-button" name="settings" alt="settings" src="../image/hilfebutton.png" /></a>
                <a href="settings.php"><img title="Einstellungen" class="mini-button" name="settings" alt="settings" src="../image/einstellungsbutton.png" /></a>
			</div>
		</div>
         <div class="content-bg">
             <form action="login.php">
                 <div id="passwort-vergessen">
                    <span>Um das Passwort zurücksetzen zu können, musst du alle Felder vollständig ausfüllen.</span>

                    <div id="prename">
                        <input type="text" name="prename" placeholder="Vorname">
                    </div>
                    <div id="surname">
                        <input type="text" name="surname" placeholder="Nachname">
                    </div>
                    <div id="email">
                        <input type="text" name="e-mail" placeholder="E-Mail Adresse">
                    </div>
                    <div id="btnSubmit">
                        <input type="submit" name="submit" value="Absenden"> 
                    </div>
                    <span>Solltest du innerhalb von 10 Minuten keine E-Mail bekommen haben wende dich bitte an einen Admin.</span>
                 </div>
            </form>
        </div>
	</body>
</html>