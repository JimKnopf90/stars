<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="../css/style-login.css">
		<link rel="icon" href="../image/icon.jpg">
		<title>Login</title>
	</head>
	<body>
		<div class="container">
			<form action="mainpage.php" >	
                <div id="form-input-user">
					<img title="Benutzernamen eingeben" class="login-icon" src="../image/icon-benutzername.png">
					<input type="text" name="username" placeholder="Benutzername">
				</div>
				<div id="form-input-pass">
					<img title="Passwort eingeben" class="login-icon" src="../image/icon-schloss.png">
					<input type="password" name="password" placeholder="Passwort">
				</div>
				<div class="button">
                    <button id="btnSubmit" type="submit" name="submit" value="Einloggen">Einloggen</button>
				</div>
                    <a href="forget-password.php"> Passwort vergessen? </a>
                    <a href="contact.php"> Kontaktieren </a>
                <div id="logo">
                        <img class="logo-logo" src="../image/verpacking-logo.png">
                </div>
                    
			</form>
		</div>
	
	</body>
</html>