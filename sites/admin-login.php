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
		<link rel="stylesheet" type="text/css" href="../css/admin-login-stylesheet.css">
		<link rel="icon" href="../admin-image/stars-logo.png">
		<script type="text/javascript">
		</script>
		<title>StaRs | Adminbereich</title>
	</head>
	<body>
        <img class="stars-logo" src="../admin-image/stars-logo.png">
        <div class="login">
            <!-- <h1>Login</h1> -->
<<<<<<< HEAD
            <form action="../business-logic/mLoginAdmin.php" method="post">
                <input type="text" id="username" name="username" placeholder="Benutzername" required="required">
=======
            <form method="post" action="admin-mainpage.php">
                <input type="text" id="username" name="user" placeholder="Benutzername" required="required">
>>>>>>> origin/master
                <input type="password" id="password" name="password" placeholder="Passwort" required="required">
                <input type="submit" id="btn-login" value="Login">
            </form>
        </div>
    </body>
</html>
