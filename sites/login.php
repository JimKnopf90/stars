<?php
session_start();

session_destroy();
$_SESSION = array();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="../css/style-login.css">
		<link rel="icon" href="../image/icon.jpg">
		<title>StaRs | Login</title>
	</head>
	<body>
        <div class="container">
            <img src="../image/icon-big-user.png">
            
            <form action="../business-logic/mLogin.php" method="post">
                <div id="form-input-user">
                    <input type="text" name="username" placeholder="Benutzername" required="required">
                </div>
                
                <div class="form-input">
                    <input type="password" name="password" placeholder="Passwort" required="required">
                </div>
    
                <button type="submit" value="Einloggen" class="btnLogin">Einloggen</button>
                
            </form>
            
            <form action="admin-login.php">
            <button type="submit" value="Adminbereich" class="btnLogin">Adminbereich</button>
            </form>
        </div>    
    </body>
</html>