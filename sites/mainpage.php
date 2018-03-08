<?php
session_start();
if(isset($_SESSION["username"])) {     
    ?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
		<link rel="icon" href="../image/icon.jpg">
		<script type="text/javascript">
		</script>
		<title>StaRs | Startseite</title>
	</head>
	<body>
        <header>
            <nav>
                <a href="mainpage.php"><img id="header-logo" src="../image/verpacking-logo.png" /></a>
                <ul id="nav">
                    <li><a class="active" href="mainpage.php">Startseite</a></li>
                    <li><a class="inactive" href="products.php">Produkte</a></li>
                    <li><a class="inactive" href="mainpage.php">Stammartikel</a></li>
                    <li><a class="inactive" href="mainpage.php">Fehlermeldungen</a></li>
                    <li><a class="inactive" id="rechts" href="mainpage.php">Statistiken</a></li>
                    <a href="login.php"><img class="icons"src="../image/icon-information.png" /></a>
                    <a href="login.php"><img class="icons" src="../image/icon-help.png" /></a>
                    <a href="login.php"><img class="icons" src="../image/icon-settings.png" /></a>
                    <a href="login.php"><img class="icons" src="../image/icon-logout.png" /></a>
                </ul>
            </nav>
        </header>
        <div class="divider"></div>
            <div id="content-mainpage">
                <h1>Wilkommen, <?php echo $_SESSION["username"]; ?></h1>
                <h3>Es wurden <span class="attention">14</span> fehlerhafte Dateien gefunden!</h3>
        </div>
    </body>
</html>
<?php
} else {
    echo "erst ein loggen Bro";
}
?>